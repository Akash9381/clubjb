<?php

use App\Http\Controllers\AuthController;
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

Route::group(['middleware' => ['role:admin']], function(){
    Route::view('admin/add-employee', 'admin.employee.add-employee');
    Route::view('admin/active-employees', 'admin.employee.active-employee');
    Route::view('admin/inactive-employee', 'admin.employee.inactive-employee');
    Route::view('admin/employee-profile', 'admin.employee.employee-profile');

});
