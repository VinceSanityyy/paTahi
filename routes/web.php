<?php

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
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users/index',[App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::post('/approveUser/{id}',[App\Http\Controllers\UserController::class, 'approveUser']);
Route::post('/denyUser/{id}',[App\Http\Controllers\UserController::class, 'denyUser']);


//clients
Route::get('/clients/taylors', [App\Http\Controllers\ClientsController::class, 'showTaylors'])->name('client.taylors.index');
Route::get('/clients/orders', [App\Http\Controllers\ClientsController::class, 'showRequestOrders'])->name('client.orders.index');

//taylors
Route::get('/taylors/products', [App\Http\Controllers\TaylorsController::class, 'showTaylorProducts'])->name('taylor.products.index');
Route::get('/taylors/clients', [App\Http\Controllers\TaylorsController::class, 'showTaylorClients'])->name('taylor.clients.index');
Route::get('/taylors/orders', [App\Http\Controllers\TaylorsController::class, 'showTaylorsOrder'])->name('taylor.orders.index');


Auth::routes();
