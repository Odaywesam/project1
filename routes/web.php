<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoreController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\UserAuthController;

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

Route::prefix('master/')->middleware('guest:admin,merchant,seller')->group(function(){
    Route::get('{guard}/login', [UserAuthController::class ,'ShowLogin'])->name('view.login');
    Route::post('{guard}/login', [UserAuthController::class ,'Login']);


});

Route::prefix('master/admin')->middleware('auth:admin')->group(function(){
    Route::get('/logout' , [UserAuthController::class , 'Logout'])->name('master.admin.logout');
});

Route::prefix('master/admin/')->group(function(){
    Route::view('parent' , 'master.parent');
    Route::resource('cities', CityController::class);
    Route::post('update_cities/{id}',[CityController::class ,'update'])->name('update_cities');
    Route::resource('categories', CategoreController::class);
    Route::post('update_categories/{id}',[CategoreController::class ,'update'])->name('update_categories');
    Route::resource('admins', AdminController::class);
    Route::post('update_admins/{id}',[AdminController::class ,'update'])->name('update_admins');
    Route::resource('employees', EmployeeController::class);
    Route::post('update_employees/{id}',[EmployeeController::class ,'update'])->name('update_employees');
    Route::resource('merchants', MerchantController::class);
    Route::post('update_merchants/{id}',[MerchantController::class ,'update'])->name('update_merchants');
    Route::resource('sellers', SellerController::class);
    Route::post('update_sellers/{id}',[SellerController::class ,'update'])->name('update_sellers');
    Route::resource('products', ProductController::class);
    Route::post('update_products/{id}',[ProductController::class ,'update'])->name('update_products');


});
