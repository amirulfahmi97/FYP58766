<?php
use App\Location;
use App\Inventory;
use App\Item;
use App\User;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

//------------------The path for different usertype login using different guards.-------------------------------//
Route::get('/login/staff', 'Auth\LoginController@showStaffLoginForm')->name('stafflogin');
Route::post('/login/staff', 'Auth\LoginController@staffLogin');


//------------------To access need to be logged in-------------------------------//
Route::group(['middleware' => ['auth']], function() {

    Route::get('/user/dashboard', 'HomeController@index')->name('userdashboard')->middleware(['is_engineer']);
    Route::get('/staff/dashboard', 'HomeController@staffDashboard')->name('staffdashboard')->middleware(['is_staff']);
    Route::get('/admin/dashboard', 'HomeController@adminDashboard')->name('admindashboard')->middleware(['is_admin']);

    //------------------Admin routes-------------------------------//
    Route::namespace('Admin')->middleware(['is_admin'])->prefix('/admin')->group(function () {

        //Route::get('/', 'UserPagesController@welcome');
        //Route::get('/dashboard', 'PagesController@AdminIndex')->name('admindashboard');
        //Route::get('/dashboard', 'HomeController@adminDashboard')->name('admindashboard')->middleware('is_admin');
        //Route::get('/locationlist', 'PagesController@adminlocationlists')->name('adminlocation');
        //Route::get('/inventorylist', 'PagesController@inventorylists')->name('admininventory');
        //Route::get('/additem', 'PagesController@addinventory')->name('adminadditem');
        //Route::get('/addlocation', 'PagesController@addlocation')->name('adminaddlocation');
        //Route::get('/editinventory', 'PagesController@editinventory')->name('admineditinventory');
        //Route::get('/editlocation', 'PagesController@editlocation')->name('admineditlocation');
        Route::resource('locationss', 'LocationsController');
        Route::get('exports', 'LocationsController@export')->name('locationss.export');
        Route::any ( '/locationss/search', function () {
            $q = Request::input( 'q' );
            $locations = Location::where ( 'locationID', 'LIKE', '%' . $q . '%' )->orWhere ( 'locationName', 'LIKE', '%' . $q . '%' )->get ();
            if (count ( $locations ) > 0)
                return view ( 'Admin.locationsearchresult' )->withDetails ( $locations )->withQuery ( $q );
            else
                return view ( 'Admin.locationsearchresult' )->withMessage ( 'No Details found. Try to search again !' );
        } );

        Route::resource('inventoriess', 'InventoriesController');
        Route::get('export', 'InventoriesController@export')->name('inventoriess.export');
        Route::any ( '/inventoriess/search', function () {
            $q = Request::input( 'q' );
            $inventories = Inventory::where ( 'assetTag', 'LIKE', '%' . $q . '%' )->orWhere ( 'itemName', 'LIKE', '%' . $q . '%' )->orWhere ( 'brand', 'LIKE', '%' . $q . '%' )->orWhere ( 'type', 'LIKE', '%' . $q . '%' )->orWhere ( 'locName', 'LIKE', '%' . $q . '%' )->get ();
            if (count ( $inventories ) > 0)
                return view ( 'Admin.inventorysearchresult' )->withDetails ( $inventories )->withQuery ( $q );
            else
                return view ( 'Admin.inventorysearchresult' )->withMessage ( 'No Details found. Try to search again !' );
        } );

        Route::resource('profilee', 'ManageProfileController')->only([
            'store',
            'show',
            'edit',
            'update'
        ]);

        Route::resource('user', 'UserController');
        Route::any ( '/user/search', function () {
            $q = Request::input( 'q' );
            $users = User::where ( 'userID', 'LIKE', '%' . $q . '%' )->orWhere ( 'userName', 'LIKE', '%' . $q . '%' )->orWhere ( 'icNo', 'LIKE', '%' . $q . '%' )->orWhere ( 'address', 'LIKE', '%' . $q . '%' )->orWhere ( 'usertype', 'LIKE', '%' . $q . '%' )->get ();
            if (count ( $users ) > 0)
                return view ( 'Admin.usersearchresult' )->withDetails ( $users )->withQuery ( $q );
            else
                return view ( 'Admin.usersearchresult' )->withMessage ( 'No Details found. Try to search again !' );
        } );


    });

    //------------------User routes-------------------------------//
    Route::namespace('User')->middleware(['is_engineer'])->prefix('/user')->group( function () {

        //Route::get('/', 'UserPagesController@welcome');
        //Route::get('/dashboard', 'HomeController@index')->name('userdashboard');
        //Route::get('/dashboard', 'PagesController@UserIndex')->name('userdashboard');
        //Route::get('/profile', 'PagesController@manageprofile')->name('userprofile');
        //Route::get('/locationlist', 'PagesController@locationlists')->name('userlocation');
        //Route::get('/inventorylist', 'PagesController@inventorylists')->name('userinventory');
        //Route::get('/additem', 'PagesController@addinventory')->name('useradditem');
        //Route::get('/addlocation', 'PagesController@addlocation')->name('useraddlocation');
        //Route::get('/editinventory', 'PagesController@editinventory')->name('usereditinventory');
        //Route::get('/editlocation', 'PagesController@editlocation')->name('usereditlocation');
        Route::resource('locations', 'LocationsController');
        Route::get('exports', 'LocationsController@export')->name('locations.export');
        Route::any ( '/locations/search', function () {
            $q = Request::input( 'q' );
            $locations = Location::where ( 'locationID', 'LIKE', '%' . $q . '%' )->orWhere ( 'locationName', 'LIKE', '%' . $q . '%' )->get ();
            if (count ( $locations ) > 0)
                return view ( 'User.locationsearchresult' )->withDetails ( $locations )->withQuery ( $q );
            else
                return view ( 'User.locationsearchresult' )->withMessage ( 'No Details found. Try to search again !' );
        } );


        Route::resource('inventories', 'InventoriesController');
        Route::get('export', 'InventoriesController@export')->name('inventories.export');
        Route::any ( '/inventories/search', function () {
            $q = Request::input( 'q' );
            $inventories = Inventory::where ( 'assetTag', 'LIKE', '%' . $q . '%' )->orWhere ( 'itemName', 'LIKE', '%' . $q . '%' )->orWhere ( 'brand', 'LIKE', '%' . $q . '%' )->orWhere ( 'type', 'LIKE', '%' . $q . '%' )->orWhere ( 'locName', 'LIKE', '%' . $q . '%' )->get ();
            if (count ( $inventories ) > 0)
                return view ( 'User.inventorysearchresult' )->withDetails ( $inventories )->withQuery ( $q );
            else
                return view ( 'User.inventorysearchresult' )->withMessage ( 'No Details found. Try to search again !' );
        } );

        Route::resource('profile', 'ManageProfileController')->only([
            'store',
            'show',
            'edit',
            'update'
        ]);




    });

    //------------------Staff routes-------------------------------//
    Route::namespace('Staff')->middleware(['is_staff'])->prefix('/staff')->group(function () {

        //Route::get('/', 'UserPagesController@welcome');
        //Route::get('/dashboard', 'PagesController@staffindex')->name('staffdashboard');
        //Route::get('/dashboard', 'HomeController@staffDashboard')->name('staffdashboard')->middleware('is_staff');
        //Route::get('/locationlist', 'PagesController@adminlocationlists')->name('location');
        //Route::get('/inventorylist', 'PagesController@inventorylists')->name('staffinventory');
        //Route::get('/profile', 'PagesController@manageprofile')->name('staffprofile');

        Route::resource('profileee', 'ManageProfileController')->only([
            'store',
            'show',
            'edit',
            'update'
        ]);

        Route::resource('inventory', 'InventoryShowController')->only([
            'index'
        ]);
        Route::any ( '/inventory/search', function () {
            $q = Request::input( 'q' );
            $inventories = Inventory::where ( 'assetTag', 'LIKE', '%' . $q . '%' )->orWhere ( 'itemName', 'LIKE', '%' . $q . '%' )->orWhere ( 'brand', 'LIKE', '%' . $q . '%' )->orWhere ( 'type', 'LIKE', '%' . $q . '%' )->orWhere ( 'locName', 'LIKE', '%' . $q . '%' )->get ();
            if (count ( $inventories ) > 0)
                return view ( 'Staff.inventorysearchresult' )->withDetails ( $inventories )->withQuery ( $q );
            else
                return view ( 'Staff.inventorysearchresult' )->withMessage ( 'No Details found. Try to search again !' );
        } );
    });

});










