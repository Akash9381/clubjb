<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\DocumentController;
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
Route::get('admin',[AuthController::class,'AdminLogin']);
Route::get('employee',[AuthController::class,'EmployeeLogin']);
Route::get('shopkeeper',[AuthController::class,'ShopKeeperLogin']);
Route::view('admin/sign-in', 'admin.sign-in')->name('admin.login')->middleware('guest');
Route::get('logout', [AuthController::class, 'Logout'])->name('logout');
Route::post('admin/authenticate', [AuthController::class, 'authenticate']);
Route::get('admin/get-city', [EmployeeController::class, 'GetCity']);
Route::get('employee/crnt_location', [ShopKeeperController::class, 'GetLocation']);

Route::get('/home', [AuthController::class, 'Home'])->name('home');

Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::prefix('admin')->group(function () {

        // ********************** Admin Dashboard ********************************************

        Route::get('/dashboard', [EmployeeController::class, 'Dashboard'])->name('dashboard');

        // ********************** Admin Employee ********************************************

        Route::get('/add-employee', [EmployeeController::class, 'Employee']);
        Route::get('/edit-employee/{id}', [EmployeeController::class, 'EditEmployee']);
        Route::post('/update-employee/{id}', [EmployeeController::class, 'UpdateEmployee']);
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
        Route::get('/global-shop-profile/{shop_id}', [GlobalShopController::class, 'ShopProfile']);
        Route::get('/local-shop/{shop_id}', [ShopKeeperController::class, 'ShopUpdate']);
        Route::get('/global-shop/{shop_id}', [GlobalShopController::class, 'ShopUpdate']);
        Route::get('/shop/shop_menu/delete/{id}', [ShopKeeperController::class, 'ShopMenuDelete']);
        Route::get('/shop/shop_pic/delete/{id}', [ShopKeeperController::class, 'ShopPicDelete']);
        Route::get('/shop/shop_aadhar_card/delete/{id}', [ShopKeeperController::class, 'ShopAdharDelete']);
        Route::get('/shop/shop_pancard/delete/{id}', [ShopKeeperController::class, 'ShopPanDelete']);
        Route::get('/shop/shop_driving/delete/{id}', [ShopKeeperController::class, 'ShopDrivingDelete']);
        Route::get('/shop/shop_passport/delete/{id}', [ShopKeeperController::class, 'ShopPassportDelete']);
        Route::get('/shop/shop_cv/delete/{id}', [ShopKeeperController::class, 'ShopCvDelete']);
        Route::get('/shop/shop_agreement/delete/{id}', [ShopKeeperController::class, 'ShopAgreementDelete']);
        Route::post('/update-shop/{shop_id}', [ShopKeeperController::class, 'UpdateShop']);
        Route::post('/update-global-shop/{shop_id}', [GlobalShopController::class, 'UpdateShop']);
        Route::get('/global_shop_status', [GlobalShopController::class, 'GlobalShopStatus']);
        Route::get('/inactive-global-shops', [GlobalShopController::class, 'InactiveGlobal']);
        Route::get('/active-global-shops', [GlobalShopController::class, 'ActiveGlobal']);

        //*********************** Banner *******************************
        Route::get('/add-banner', [BannerController::class, 'Banner']);
        Route::get('/add-global-banner', [BannerController::class, 'GlobalBanner']);
        Route::post('/banner-add', [BannerController::class, 'CreateBanner']);
        Route::post('/global-banner-add', [BannerController::class, 'CreateGlobalBanner']);
        Route::get('/banners-list', [BannerController::class, 'BannerList']);
        Route::get('/global-banners-list', [BannerController::class, 'GlobalBannerList']);
        Route::get('/banner-view/{id}', [BannerController::class, 'BannerView']);
        Route::get('/global-banner-view/{id}', [BannerController::class, 'GlobalBannerView']);
        Route::get('/update-banner/{id}', [BannerController::class, 'BannerUpdate']);
        Route::get('/update-global-banner/{id}', [BannerController::class, 'GlobalBannerUpdate']);
        Route::get('/global-banner/delete/{id}', [BannerController::class, 'GlobalBannerDelete']);
        Route::get('/banner/delete/{id}', [BannerController::class, 'BannerDelete']);
        Route::post('/banner-update/{id}', [BannerController::class, 'UpdateBanner']);
        Route::post('/global-banner-update/{id}', [BannerController::class, 'GlobalUpdateBanner']);
    });
});

// ***************************** Delete Documents **************************************

Route::get('admin/employee/employee_picture/delete/{id}', [EmployeeController::class, 'DeletePicture']);
Route::get('admin/employee/aadhar_document/delete/{id}', [EmployeeController::class, 'DeleteAadhar']);
Route::get('admin/employee/driving_document/delete/{id}', [EmployeeController::class, 'DeleteDriving']);
Route::get('admin/employee/cv_document/delete/{id}', [EmployeeController::class, 'DeleteCv']);
Route::get('admin/employee/passport_document/delete/{id}', [EmployeeController::class, 'DeletePassport']);
Route::get('admin/employee/agreement_document/delete/{id}', [EmployeeController::class, 'DeleteAgreement']);


Route::get('shop/shop_menu/delete/{id}', [DocumentController::class, 'DeleteShopMenu']);
Route::get('shop/shop_pic/delete/{id}', [DocumentController::class, 'DeleteShopPic']);
Route::get('shop/shop_aadhar_card/delete/{id}', [DocumentController::class, 'DeleteShopAdhar']);
Route::get('shop/shop_pancard/delete/{id}', [DocumentController::class, 'DeleteShopPanCard']);
Route::get('shop/shop_driving/delete/{id}', [DocumentController::class, 'DeleteShopDriving']);
Route::get('shop/shop_passport/delete/{id}', [DocumentController::class, 'DeleteShopPassport']);
Route::get('shop/shop_cv/delete/{id}', [DocumentController::class, 'DeleteShopCV']);
Route::get('shop/shop_agreement/delete/{id}', [DocumentController::class, 'DeleteShopAgreement']);

// ******************************* Deal Delete ****************************************
Route::get('deal/delete/{id}', [DealController::class, 'DealDelete']);

// ***************************** Employee Dashboard Data *******************************

Route::view('/employee/login', 'employee.sign-in')->name('employee.login')->middleware('guest');
Route::post('employee/authenticate', [AuthController::class, 'EmployeeAuthenticate']);
Route::group(['middleware' => ['role:employee', 'auth']], function () {
    Route::view('employee/dashboard', 'employee.dashboard');
    Route::get('employee/logout', [AuthController::class, 'EmployeeLogout']);
    Route::get('employee/customer-search', [EmployeeController::class, 'CustomerSearch']);
    Route::get('employee/employee-search', [EmployeeController::class, 'EmployeeSearch']);
    Route::get('employee/profile', [EmployeeController::class, 'Profile']);
    Route::get('employee/update-profile/{id}', [EmployeeController::class, 'UpdateProfile']);
    Route::post('employee/edit-employee/{id}', [EmployeeController::class, 'UpdateProfileData']);
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
Route::get('user/login', [AuthController::class, 'UserAuth']);
Route::get('user/register', [UserController::class, 'Register'])->name('register')->middleware('guest');
Route::post('user/insert', [UserController::class, 'Store'])->middleware('guest');
Route::get('user/login-pin', [UserController::class, 'LoginPin'])->name('loginpin')->middleware('guest');
Route::post('users/authenticate', [AuthController::class, 'UserLogin']);
Route::group(['middleware' => ['role:customer', 'auth']], function () {
    Route::get('user/home', [UserController::class, 'UserHome']);
    Route::get('user/profile', [UserController::class, 'UserProfile']);
    Route::get('user/global-store/{id}', [DealController::class, 'UserDealList']);
    Route::get('user/local-store/{id}', [DealController::class, 'LocalDealList']);
    Route::get('user/deal/{id}', [DealController::class, 'UserDeal']);
    Route::get('user/dealdetail/{id}', [DealController::class, 'StoreDeal']);
    Route::get('user/edit-profile', [UserController::class, 'UpdateUser']);
    Route::post('user/update-profile', [UserController::class, 'UpdateProfile']);
    Route::get('user/logout', [AuthController::class, 'UserLogout']);
});


// ******************************* ShopKeeper ****************************************


Route::view('shopkeeper/login', 'shopkeeper.login')->middleware('guest')->name('shop.login');
Route::post('shopkeeper/authenticate', [AuthController::class, 'ShopKeeperAuth']);
Route::group(['middleware' => ['role:shopkeeper', 'auth']], function () {
    Route::prefix('shopkeeper')->group(function () {
        Route::get('/profile', [ShopKeeperController::class, 'Profile']);
        Route::get('/customer-search', [ShopKeeperController::class, 'SearchCustomer']);
        Route::get('/shopkeeper-search', [EmployeeController::class, 'ShopkeeperSearch']);
        Route::view('/add-customer', 'shopkeeper.add-customer');
        Route::post('/new-customer', [CustomerController::class, 'ShopKeeperNewCustomer']);
        Route::view('/dashboard', 'shopkeeper.dashboard')->name('ShopDashboard');
        Route::get('/logout', [AuthController::class, 'ShopLogout']);
        Route::get('/add-shopkeeper', [ShopKeeperController::class, 'CreateNewShopKeeper']);
        Route::post('/create-shop', [ShopKeeperController::class, 'StoreShopKeeper']);
        Route::get('/customer-report', [CustomerController::class, 'ShopkeeperCustomerReport']);
        Route::get('/shopkeeper-reports', [ShopKeeperController::class, 'ShopkeeperCustomerReport']);
        Route::get('/give-services', [ShopKeeperController::class, 'GiveService']);
        Route::post('/take-service', [ShopKeeperController::class, 'TakeService']);
        Route::get('/shop-update/{shop_id}', [ShopKeeperController::class, 'EditShop']);
        Route::get('/given-deals', [ShopKeeperController::class, 'GivenDeals']);
        Route::get('/deals', [ShopKeeperController::class, 'Deals']);
        Route::get('/deal/edit/{id}', [DealController::class, 'EditDeal']);
        Route::post('/update-deal/{id}', [DealController::class, 'UpdateDeal']);
        Route::post('/update-shop/{shop_id}', [ShopKeeperController::class, 'UpdateShopkeeper']);
    });
});
