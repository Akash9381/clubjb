<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view('admin/sign-in', 'admin.sign-in')->name('login')->middleware('guest');
Route::get('logout',[AuthController::class,'Logout'])->name('logout');
Route::post('admin/authenticate',[AuthController::class,'authenticate']);
Route::get('admin/get-city',[EmployeeController::class,'GetCity']);

Route::group(['middleware' => ['role:admin']], function(){
    Route::get('admin/add-employee',[EmployeeController::class,'Employee']);
    Route::post('admin/employee-add',[EmployeeController::class,'NewEmployee']);
    Route::view('admin/active-employees', 'admin.employee.active-employee');
    Route::get('admin/inactive-employee', [EmployeeController::class,'InactiveEmployees']);
    Route::view('admin/employee-profile', 'admin.employee.employee-profile');

});
