<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function AdminIndex()
    {
        return view('Admin.AdminIndex');
    }

    public function inventorylists()
    {
        return view('Admin.inventorylists');
    }

    public function locationlists()
    {
        return view('Admin.locationlists');
    }

    public function addinventory()
    {
        return view('Admin.addinventory');
    }

    public function addlocation()
    {
        return view('Admin.addlocation');
    }

    public function editinventory()
    {
        return view('Admin.editinventory');
    }

    public function editlocation()
    {
        return view('Admin.editlocation');
    }
}
