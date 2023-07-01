<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GlobalShopController;
use App\Http\Controllers\ShopKeeperController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

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
Route::view('admin/sign-in', 'admin.sign-in')->name('admin.login')->middleware('guest');
Route::get('logout', [AuthController::class, 'Logout'])->name('logout');
Route::post('admin/authenticate', [AuthController::class, 'authenticate']);
Route::get('admin/get-city', [EmployeeController::class, 'GetCity']);
Route::get('employee/crnt_location', [ShopKeeperController::class, 'GetLocation']);

Route::get('/home',[AuthController::class,'Home'])->name('home');

Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::prefix('admin')->group(function () {

        // ********************** Admin Dashboard ********************************************

        Route::get('/dashboard',[EmployeeController::class,'Dashboard'])->name('dashboard');

        // ********************** Admin Employee ********************************************
        Route::get('/add-employee', [EmployeeController::class, 'Employee']);
        Route::post('/employee-add', [EmployeeController::class, 'NewEmployee']);
        Route::get('/active-employees', [EmployeeController::class, 'ActiveEmployees']);
        Route::get('/inactive-employee', [EmployeeController::class, 'InactiveEmployees']);
        Route::get('/employee-profile/{employee_id}', [EmployeeController::class, 'EmployeeProfile']);
        Route::get('/employee_status', [EmployeeController::class, 'EmployeeStatus']);

        // ***************************** Admin Customer ***************************

        Route::view('/add-customer', 'admin.customer.add-customer');
        Route::post('/new-customer', [CustomerController::class, 'NewCustomer']);
        Route::get('/inactive-customers', [CustomerController::class, 'InActiveCustomers']);
        Route::get('/active-customers', [CustomerController::class, 'ActiveCustomers']);
        Route::get('/customer_status', [CustomerController::class, 'CustomerStatus']);
        Route::get('/customer-profile/{customer_id}', [CustomerController::class, 'CustomerProfile']);
        Route::get('/update-customer/{customer_id}', [CustomerController::class, 'EditCustomer']);
        Route::post('/edit-customer/{customer_id}', [CustomerController::class, 'UpdateCustomer']);

        // **************************** Admin Shop *********************************

        Route::get('/local-shop-form', [ShopKeeperController::class, 'ShopForm']);
        Route::post('/create-shop', [ShopKeeperController::class, 'StoreLocalShop']);
        Route::get('/global-shop-form', [GlobalShopController::class, 'GlobalShop']);
        Route::post('/create-global-shop', [GlobalShopController::class, 'GlobalShopStore']);
        Route::get('/inactive-local-shops', [ShopKeeperController::class, 'InactiveLocalShop']);
        Route::get('/active-local-shops', [ShopKeeperController::class, 'ActiveLocalShop']);
        Route::get('/shop_status', [ShopKeeperController::class, 'ShopStatus']);
        Route::get('/shop-profile/{shop_id}', [ShopKeeperController::class, 'ShopProfile']);
        Route::get('/local-shop/{shop_id}', [ShopKeeperController::class, 'ShopUpdate']);
        Route::get('/shop/shop_menu/delete/{id}', [ShopKeeperController::class, 'ShopMenuDelete']);
        Route::get('/shop/shop_pic/delete/{id}', [ShopKeeperController::class, 'ShopPicDelete']);
        Route::get('/shop/shop_aadhar_card/delete/{id}', [ShopKeeperController::class, 'ShopAdharDelete']);
        Route::get('/shop/shop_pancard/delete/{id}', [ShopKeeperController::class, 'ShopPanDelete']);
        Route::get('/shop/shop_driving/delete/{id}', [ShopKeeperController::class, 'ShopDrivingDelete']);
        Route::get('/shop/shop_passport/delete/{id}', [ShopKeeperController::class, 'ShopPassportDelete']);
        Route::get('/shop/shop_cv/delete/{id}', [ShopKeeperController::class, 'ShopCvDelete']);
        Route::get('/shop/shop_agreement/delete/{id}', [ShopKeeperController::class, 'ShopAgreementDelete']);
        Route::post('/update-shop/{shop_id}', [ShopKeeperController::class, 'UpdateShop']);
        Route::get('/inactive-global-shops',[GlobalShopController::class,'InactiveGlobal']);
    });
});

// ***************************** Employee Dashboard data *******************************

Route::view('/employee/login', 'employee.sign-in')->name('employee.login')->middleware('guest');
Route::post('employee/authenticate', [AuthController::class, 'EmployeeAuthenticate']);
Route::group(['middleware' => ['role:employee', 'auth']], function () {
    Route::view('employee/dashboard', 'employee.dashboard');
    Route::get('employee/logout', [AuthController::class, 'EmployeeLogout']);
    Route::get('employee/customer-search', [EmployeeController::class, 'CustomerSearch']);
    Route::get('employee/employee-search', [EmployeeController::class, 'EmployeeSearch']);
    Route::view('employee/profile', 'employee.profile');
    Route::view('employee/add-customer', 'employee.add-customer');
    Route::get('employee/add-employee', [EmployeeController::class, 'EmployeeNewEmployee']);
    Route::post('employee/create-employee', [EmployeeController::class, 'EmployeeStoreEmployee']);
    Route::post('employee/new-customer', [CustomerController::class, 'EmployeeNewCustomer']);

    //************************ */Employee Shopkeeper ******************************************
    Route::get('employee/add-shopkeeper', [ShopKeeperController::class, 'EmployeeAddShop']);
    Route::get('employee/shopkeeper-search', [EmployeeController::class, 'SearchShopKeeper']);
    Route::post('employee/create-shop', [ShopKeeperController::class, 'CreateShop']);
    Route::get('employee/shopkeeper-reports', [ShopKeeperController::class, 'ShopReport']);
    Route::get('employee/shop-profile/{shop_id}', [ShopKeeperController::class, 'ShopEmployeeProfile']);
    Route::get('employee/edit-shopkeeper/{id}', [EmployeeController::class, 'EmployeeEditShopKeeper']);
    Route::post('employee/update-shop/{shop_id}', [EmployeeController::class, 'EmployeeUpdateShopKeeper']);

    //************************ / Employee Customer ********************************************
    Route::get('employee/customer-report', [CustomerController::class, 'CustomerReport']);
    Route::get('employee/customer-profile/{customer_id}', [CustomerController::class, 'CustomerEmployeeProfile']);
});

// *********************************** Users **************************************

Route::get('/', function () {
    return view('users.login');
})->name('login')->middleware('guest');
Route::post('users/login', [AuthController::class, 'UserAuth']);
Route::get('user/register',[UserController::class,'Register'])->name('register')->middleware('guest');
Route::post('user/insert',[UserController::class,'Store'])->middleware('guest');
Route::get('user/login-pin',[UserController::class,'LoginPin'])->name('loginpin')->middleware('guest');
Route::post('users/authenticate', [AuthController::class, 'UserLogin']);
Route::group(['middleware' => ['role:customer', 'auth']], function () {
    Route::get('users/home', [UserController::class, 'UserHome']);
    Route::get('users/profile', [UserController::class, 'UserProfile']);
    Route::get('users/deal-list', [DealController::class, 'UserDealList']);
    Route::get('users/deal', [DealController::class, 'UserDeal']);
    Route::get('user/logout', [AuthController::class, 'UserLogout']);
});


// ******************************* ShopKeeper ****************************************


Route::view('shopkeeper/login', 'shopkeeper.login')->middleware('guest')->name('shop.login');
Route::post('shopkeeper/authenticate', [AuthController::class, 'ShopKeeperAuth']);
Route::group(['middleware' => ['role:shopkeeper', 'auth']], function () {
    Route::prefix('shopkeeper')->group(function () {
        Route::get('/customer-search', [ShopKeeperController::class, 'SearchCustomer']);
        Route::get('/shopkeeper-search', [EmployeeController::class, 'ShopkeeperSearch']);
        Route::view('/add-customer', 'shopkeeper.add-customer');
        Route::post('/new-customer', [CustomerController::class, 'ShopKeeperNewCustomer']);
        Route::view('/dashboard', 'shopkeeper.dashboard');
        Route::get('/logout', [AuthController::class, 'ShopLogout']);
        Route::get('/add-shopkeeper', [ShopKeeperController::class, 'CreateNewShopKeeper']);
        Route::post('/create-shop', [ShopKeeperController::class, 'StoreShopKeeper']);
        Route::get('/customer-report', [CustomerController::class, 'ShopkeeperCustomerReport']);
        Route::get('/shopkeeper-reports', [ShopKeeperController::class, 'ShopkeeperCustomerReport']);
    });
});
