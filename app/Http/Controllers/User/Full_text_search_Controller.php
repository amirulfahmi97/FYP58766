<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;
use DataTables;

class Full_text_search_Controller extends Controller
{
    function index()
    {
     return view('User.locationlists');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $data = Location::search($request->get('full_text_search_query'))->get();

      return response()->json($data);
     }
    }
}
