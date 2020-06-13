<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LocationsExport;
use App\Location;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::orderBy('locationID', 'asc')->paginate(10);
        return view('User.locationlists',compact('locations'));
    }



    public function export()
    {
            return Excel::download(new LocationsExport, 'locations.xlsx');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.addlocation');
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
            'locationID' => 'required' ,
            'locationName' => 'required',
        ]);

        //add location if it does not exit in db.
        $location = Location::firstOrCreate(
            ['locationID' => $request->input('locationID')],
            ['locationName' => $request->input('locationName')]
        );
        $location->save();

        return redirect()->route('locations.index')
                        ->with('message','New Location Added. If the location is already exists it will not be added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locationID)
    {
        $locations = Location::find($locationID);

        return view('User.editlocation',compact('locations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locationID)
    {
        $location = Location::find($locationID);
        return view('User.editlocation',compact('location'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locationID)
    {
        $this->validate($request, [
            'locationID' => 'required' ,
            'locationName' => 'required',
        ]);

        //edit location
        $location= Location::findOrFail($locationID);
        $location->locationID = $request->input('locationID');
        $location->locationName = $request->input('locationName');
        $location->save();

        return redirect()->route('locations.index')
        ->with('message','Location Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locationID)
    {
        $location= Location::findOrFail($locationID);
        $location->delete();

        return redirect()->route('locations.index')
        ->with('message','Location Deleted');

    }
}
