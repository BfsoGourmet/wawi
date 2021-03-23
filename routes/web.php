<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProducerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ShopAPIController;
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

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::get('/api', [App\Http\Controllers\ShopAPIController::class, 'syncOrders']);
Route::get('/apii', [App\Http\Controllers\ShopAPIController::class, 'send_product_changes']);

Route::group(['middleware' => ['auth']], function () {
  Route::get('/', function () {
    return view('home');
  });
  Route::resources(
    [
      'products' => ProductController::class,
      'categories' => CategoryController::class,
      'couriers' => CourierController::class,
      'users' => UserManagementController::class,
      'producers' => ProducerController::class,
    ]
  );
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes();
