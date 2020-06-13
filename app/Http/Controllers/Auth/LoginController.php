<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = 'userdashboard';
    //protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        //This middleware added for different table login
        $this->middleware('guest:staff')->except('logout');
    }

    //Functioning login function using middleware. Take data from single table
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'userID' =>  'required',
            'password' => 'required',
        ]);


        if(auth()->attempt(array('userID' => $input['userID'], 'password' => $input['password'])))
        {
            if (auth()->user()->usertype == "Admin") {
                return redirect()->route('admindashboard');
            }

            if (auth()->user()->usertype == "Engineer") {
                return redirect()->route('userdashboard');
            }

            if (auth()->user()->usertype == "Staff") {
                return redirect()->route('staffdashboard');
            }
        }else{
            return redirect()->route('login')
                ->with('error','User ID And Password Are Wrong.');
        }

    }
    //End of functioning code.

    //Non-functioning login code. Trying to use different show login form to use different table login
    public function showStaffLoginForm()
    {
        return view('auth.login', ['url' => 'staff']);
    }

    public function staffLogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'userID'   => 'required',
            'password' => 'required|min:8'
        ]);

        //if (Auth::guard('staff')->attempt(['userID' => $request->userID, 'password' => $request->password], $request->get('remember'))) {

            //return redirect()->intended('/staff');
           //return redirect()->route('staffdashboard');
       // }
       if(auth()->attempt(array('userID' => $input['userID'], 'password' => $input['password'])))
        {

                return redirect()->intended(route('staffdashboard'));

        }//else{
            //return redirect()->route('login')
                //->with('error','User ID And Password Are Wrong.');

        return back()->withInput($request->only('userID', 'remember'));
    }
    //End of non-functioning codes.
}
