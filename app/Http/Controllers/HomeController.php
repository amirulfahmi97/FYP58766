<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Location;
use App\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inventoriesCount = Inventory::all()->count();
        $locationCount = Location::all()->count();
        return view('User.UserIndex',compact('inventoriesCount', 'locationCount'));
    }

    public function adminDashboard()
    {
        $inventoriesCount = Inventory::all()->count();
        $locationCount = Location::all()->count();
        //$staffCount = Staff::count();
        return view('Admin.AdminIndex',compact('inventoriesCount', 'locationCount'));
        //return view('Admin.AdminIndex');
    }

    public function staffDashboard()
    {
        $inventoriesCount = Inventory::all()->count();
        return view('Staff.staffindex',compact('inventoriesCount'));
    }

}
