<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GlobalShopController;
use App\Http\Controllers\ShopKeeperController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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



Route::view('admin/sign-in', 'admin.sign-in')->name('login')->middleware('guest');
Route::get('logout', [AuthController::class, 'Logout'])->name('logout');
Route::post('admin/authenticate', [AuthController::class, 'authenticate']);
Route::get('admin/get-city', [EmployeeController::class, 'GetCity']);
Route::get('employee/crnt_location', [ShopKeeperController::class, 'GetLocation']);

Route::group(['middleware' => ['role:admin']], function () {

    // ********************** Admin Employee ********************************************
    Route::get('admin/add-employee', [EmployeeController::class, 'Employee']);
    Route::post('admin/employee-add', [EmployeeController::class, 'NewEmployee']);
    Route::get('admin/active-employees', [EmployeeController::class, 'ActiveEmployees']);
    Route::get('admin/inactive-employee', [EmployeeController::class, 'InactiveEmployees']);
    Route::get('admin/employee-profile/{employee_id}', [EmployeeController::class, 'EmployeeProfile']);
    Route::get('/admin/employee_status', [EmployeeController::class, 'EmployeeStatus']);

    // ***************************** Admin Customer ***************************

    Route::view('admin/add-customer', 'admin.customer.add-customer');
    Route::post('admin/new-customer', [CustomerController::class, 'NewCustomer']);
    Route::get('admin/inactive-customers', [CustomerController::class, 'InActiveCustomers']);
    Route::get('admin/active-customers', [CustomerController::class, 'ActiveCustomers']);
    Route::get('/admin/customer_status', [CustomerController::class, 'CustomerStatus']);
    Route::get('admin/customer-profile/{customer_id}', [CustomerController::class, 'CustomerProfile']);
    Route::get('admin/update-customer/{customer_id}', [CustomerController::class, 'EditCustomer']);
    Route::post('admin/edit-customer/{customer_id}', [CustomerController::class, 'UpdateCustomer']);

    // **************************** Admin Shop *********************************

    Route::get('admin/local-shop-form', [ShopKeeperController::class, 'ShopForm']);
    Route::post('admin/create-shop', [ShopKeeperController::class, 'StoreLocalShop']);
    Route::get('admin/global-shop-form', [GlobalShopController::class, 'GlobalShop']);
    Route::post('admin/create-global-shop', [GlobalShopController::class, 'GlobalShopStore']);
    Route::get('admin/inactive-local-shops', [ShopKeeperController::class, 'InactiveLocalShop']);
    Route::get('admin/active-local-shops', [ShopKeeperController::class, 'ActiveLocalShop']);
    Route::get('admin/shop_status', [ShopKeeperController::class, 'ShopStatus']);
    Route::get('admin/shop-profile/{shop_id}', [ShopKeeperController::class, 'ShopProfile']);
    Route::get('admin/local-shop/{shop_id}', [ShopKeeperController::class, 'ShopUpdate']);
    Route::get('admin/shop/shop_menu/delete/{id}', [ShopKeeperController::class, 'ShopMenuDelete']);
    Route::get('admin/shop/shop_pic/delete/{id}', [ShopKeeperController::class, 'ShopPicDelete']);
    Route::get('admin/shop/shop_aadhar_card/delete/{id}', [ShopKeeperController::class, 'ShopAdharDelete']);
    Route::get('admin/shop/shop_pancard/delete/{id}', [ShopKeeperController::class, 'ShopPanDelete']);
    Route::get('admin/shop/shop_driving/delete/{id}', [ShopKeeperController::class, 'ShopDrivingDelete']);
    Route::get('admin/shop/shop_passport/delete/{id}', [ShopKeeperController::class, 'ShopPassportDelete']);
    Route::get('admin/shop/shop_cv/delete/{id}', [ShopKeeperController::class, 'ShopCvDelete']);
    Route::get('admin/shop/shop_agreement/delete/{id}', [ShopKeeperController::class, 'ShopAgreementDelete']);
    Route::post('admin/update-shop/{shop_id}', [ShopKeeperController::class, 'UpdateShop']);
});

// ***************************** Employee Dashboard data *******************************

Route::view('/employee/login', 'employee.sign-in')->name('employee.login')->middleware('guest');
Route::post('employee/authenticate', [AuthController::class, 'EmployeeAuthenticate']);
Route::group(['middleware' => ['role:employee']], function () {
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
})->name('user.login')->middleware('guest');
Route::get('users/login', [AuthController::class, 'UserAuth']);
Route::post('users/authenticate', [AuthController::class, 'UserLogin']);
Route::group(['middleware' => ['role:customer']], function () {
    Route::get('users/home', [UserController::class, 'UserHome']);
    Route::get('users/profile', [UserController::class, 'UserProfile']);
    Route::get('users/deal-list', [DealController::class, 'UserDealList']);
    Route::get('users/deal', [DealController::class, 'UserDeal']);
    Route::get('user/logout',[AuthController::class,'UserLogout']);
});
// ******************************* ShopKeeper ****************************************
Route::view('shopkeeper/login','shopkeeper.login')->middleware('guest')->name('shop.login');
Route::post('shopkeeper/authenticate',[AuthController::class,'ShopKeeperAuth']);
Route::group(['middleware' => ['role:shopkeeper']], function (){
    Route::prefix('shopkeeper')->group(function(){
        Route::get('/customer-search',[ShopKeeperController::class,'SearchCustomer']);
        Route::get('/shopkeeper-search',[EmployeeController::class,'ShopkeeperSearch']);
        Route::view('/add-customer','shopkeeper.add-customer');
        Route::post('/new-customer',[CustomerController::class,'ShopKeeperNewCustomer']);
        Route::view('/dashboard','shopkeeper.dashboard');
        Route::get('/logout',[AuthController::class,'ShopLogout']);
        Route::get('/add-shopkeeper',[ShopKeeperController::class,'CreateNewShopKeeper']);
        Route::post('/create-shop',[ShopKeeperController::class,'StoreShopKeeper']);
        Route::get('/customer-report',[CustomerController::class,'ShopkeeperCustomerReport']);
        Route::get('/shopkeeper-reports',[ShopKeeperController::class,'ShopkeeperCustomerReport']);

    });
});
