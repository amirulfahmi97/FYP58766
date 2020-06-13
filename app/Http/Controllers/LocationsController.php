<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $locations = Location::all();
        return view('locationlists', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addlocation');
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

        //add location
        $location = new Location;
        $location->locationID = $request->input('locationID');
        $location->locationName = $request->input('locationName');
        $location->save();

        return redirect('user/locations')->with('message', 'Location Added');
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
        return view('editlocation')->with('locations', $locations);
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
        return view('editlocation')->with('location', $location);
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

        return redirect('locationlists')->with('message', 'Location Updated');
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

        return redirect('locationlists')->with('message', 'Location Deleted');
    }
}
