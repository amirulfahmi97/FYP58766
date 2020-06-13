<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InventoriesExport;
use App\Inventory;
use App\Location;
use App\Item;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::orderBy('serialNo', 'asc')->paginate(10);
        return view('Admin.inventorylists',compact('inventories'));
    }

    public function export()
    {
            return Excel::download(new InventoriesExport, 'inventories.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('Admin.addinventory',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'serialNo' => 'required',
            'assetTag' => 'required',
            'itemName' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'dateMoveIn' => 'required',
            'dateMoveOut',
            'locName' => 'required',
            'place' => 'required',
            'status' => 'required',
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        echo $file = $request->file('image');
        if($request->hasfile('image')) {
            // Get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //echo $filenameWithExt;
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->    storeAs('public/image', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //verify the data is not in the db then insert. if data is in db it will not insert.
        $inventory = Inventory::firstOrCreate(
            ['serialNo' => $request->input('serialNo')],
            ['assetTag' => $request->input('assetTag'),
            'itemName' => $request->input('itemName'),
            'brand' => $request->input('brand'),
            'type' => $request->input('type'),
            'dateMoveIn' => $request->input('dateMoveIn'),
            'dateMoveOut' => $request->input('dateMoveOut'),
            'locName' => $request->input('locName'),
            'place' => $request->input('place'),
            'status' => $request->input('status'),
            'image' => $fileNameToStore]
        );
        $inventory->save();


        $item = Item::firstOrCreate(
            ['serialNo' => $request->input('serialNo')],
            ['assetTag' => $request->input('assetTag'),
            'itemName' => $request->input('itemName'),
            'brand' => $request->input('brand'),
            'type' => $request->input('type'),
            'dateMoveIn' => $request->input('dateMoveIn')]
        );
        $item->save();
        return redirect()->route('inventoriess.index')
                        ->with('message','Item Added');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($serialNo)
    {
        $inventories = Inventory::find($serialNo);
        $locations = Location::all();
        return view('Admin.editinventory',compact('inventories','locations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($serialNo)
    {
        $inventories = Inventory::find($serialNo);
        $locations = Location::all();
        return view('Admin.editinventory',compact('inventories','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $serialNo)
    {
        $this->validate($request, [
            'serialNo' => 'required',
            'assetTag' => 'required',
            'itemName' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'dateMoveIn' => 'required',
            'dateMoveOut',
            'locName' => 'required',
            'place' => 'required',
            'status' => 'required',
            'image',
        ]);
        echo $file = $request->file('image');
        if($request->hasfile('image')) {
            // Get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //echo $filenameWithExt;
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->    storeAs('public/image', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        //edit location
        $inventory= Inventory::findOrFail($serialNo);
        $inventory->serialNo = $request->input('serialNo');
        $inventory->assetTag = $request->input('assetTag');
        $inventory->itemName = $request->input('itemName');
        $inventory->brand = $request->input('brand');
        $inventory->type = $request->input('type');
        $inventory->dateMoveIn = $request->input('dateMoveIn');
        $inventory->dateMoveOut = $request->input('dateMoveOut');
        $inventory->locName = $request->input('locName');
        $inventory->place = $request->input('place');
        $inventory->status = $request->input('status');
        $inventory->image = $fileNameToStore;
        $inventory->save();

        $item= Item::findOrFail($serialNo);
        $item->serialNo = $request->input('serialNo');
        $item->assetTag = $request->input('assetTag');
        $item->itemName = $request->input('itemName');
        $item->brand = $request->input('brand');
        $item->type = $request->input('type');
        $item->dateMoveIn = $request->input('dateMoveIn');
        $item->save();


        return redirect()->route('inventoriess.index')
        ->with('message','Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($serialNo)
    {
        $inventory= Inventory::findOrFail($serialNo);
        $inventory->delete();

        $item= Item::findOrFail($serialNo);
        $item->delete();

        return redirect()->route('inventoriess.index')
        ->with('message','Item Deleted');
    }
}
