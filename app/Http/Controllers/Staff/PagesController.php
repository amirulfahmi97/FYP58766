<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{

        public function __construct()
    {
        $this->middleware('is_staff');
    }

    public function inventorylists()
    {
        return view('Staff.inventorylists');
    }

    public function eventlog()
    {
        return view('Staff.eventlog');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
