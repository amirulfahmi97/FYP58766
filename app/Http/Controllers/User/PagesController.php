<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_engineer');
    }

    public function locationlists()
    {

        return view('User.locationlists');
    }

    public function inventorylists()
    {
        return view('User.inventorylists');
    }

    public function addinventory()
    {
        return view('User.addinventory');
    }

    public function addlocation()
    {
        return view('User.addlocation');
    }

    public function editinventory()
    {

        return view('User.editinventory');
    }

    public function editlocation()
    {

        return view('User.editlocation');
    }

    public function manageprofile()
    {

        return view('User.manageprofile');
    }

    public function welcome()
    {
        return view('welcome');
    }

}
