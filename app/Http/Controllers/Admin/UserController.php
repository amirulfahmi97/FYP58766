<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Staff;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * $users = User::orderBy('userID', 'asc')->paginate(10);
        */

        $staffs = Staff::orderBy('userID', 'asc')->paginate(10);
        return view('Admin.userlists',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.adduser');
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
            'userID' => 'required',
           'userName' => 'required',
            'icNo' => 'required',
            'address' => 'required',
            'phoneNo' => 'required',
            'usertype' => 'required',
            'password' => 'required',

        ]);

        /**return Validator::make($request, [
            'userID' => ['required', 'string', 'max:255', 'unique:users'],
            'userName' => ['required', 'string', 'max:255'],
            'icNo' => ['required'],
            'address' => ['required'],
            'phoneNo' => ['required',],
            'usertype' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]); */


        /**
         * $user = User::create([
        *  'userID' => $request['userID'],
        *    'userName' => $request['userName'],
        *    'icNo' => $request['icNo'],
        *    'address' => $request['address'],
        *    'phoneNo' => $request['phoneNo'],
        *    'usertype' => $request['usertype'],
        *    'password' => Hash::make($request['password']),
        *]);

        *$user->save();
         */


        $staff = Staff::create([
            'userID' => $request['userID'],
            'userName' => $request['userName'],
            'icNo' => $request['icNo'],
            'address' => $request['address'],
            'phoneNo' => $request['phoneNo'],
            'usertype' => $request['usertype'],
            'password' => Hash::make($request['password']),
        ]);

        $staff->save();
        return redirect()->route('user.index')
                        ->with('message','User Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userID)
    {
        /** $users = Auth::user($userID);
        *return view('Admin.edituser', compact('users')); */

        /**
         * $users = User::find($userID);
         */

        $staffs = Staff::find($userID);
        return view('Admin.edituser', compact('staffs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userID)
    {
        /**
         * $users = User::find($userID);
         */

        $staffs = Staff::find($userID);
        return view('Admin.edituser', compact('staffs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userID)
    {
        $this->validate($request, [
            'userID' => '',
           'userName' => 'required',
            'icNo' => 'required',
            'address' => 'required',
            'phoneNo' => 'required',
            'usertype' => 'required',


        ]);


        /**
         *  User::find($userID)->update(['userName'=> $request->userName,
        *'icNo'=> $request->icNo,
        *'address'=> $request->address,
        *'phoneNo'=> $request->phoneNo,
        *'usertype'=> $request->usertype,]);

         */


        Staff::find($userID)->update(['userName'=> $request->userName,
        'icNo'=> $request->icNo,
        'address'=> $request->address,
        'phoneNo'=> $request->phoneNo,
        'usertype'=> $request->usertype,]);
        return redirect()->route('user.index')
        ->with('message','User Details Updated');



        //return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userID)
    {
        /**$user =User::findOrFail($userID);
        $user->delete(); */


        $staff =Staff::findOrFail($userID);
        $staff->delete();

        return redirect()->route('user.index')
        ->with('message','User Deleted');
    }
}
