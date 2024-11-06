<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/detail/{slug}', 'DetailController@index')->name('detail');

//Route::get('/register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
//
//Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
//
//Route::get('/login', [LoginController::class, 'create'])->name('login');
//Route::get('logout', [LoginController::class, 'logout'])->middleware('auth');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'UserDashboardController@index')
        ->name('user-dashboard');

    Route::get('/dashboard/detail/{id}', 'UserDashboardController@show')
        ->name('detail-order');

    Route::get('dashboard/edit/{id}', 'ProfileController@edit')
        ->name('edit');

    Route::post('dashboard/edit/{id}', 'ProfileController@update')
        ->name('update');

});

Route::post('/checkout/{id}', 'CheckoutController@process')
    ->name('checkout_process')
    ->middleware(['auth']);

Route::get('/checkout/{id}', 'CheckoutController@index')
    ->name('checkout')
    ->middleware(['auth']);

Route::post('/checkout/create/{detail_id}', 'CheckoutController@create')
    ->name('checkout_create')
    ->middleware(['auth']);

Route::get('/checkout/remove/{detail_id}', 'CheckoutController@remove')
    ->name('checkout_remove')
    ->middleware(['auth']);

Route::get('/checkout/confirm/{id}', 'CheckoutController@success')
    ->name('checkout_success')
    ->middleware(['auth']);

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');

        Route::resource('travel-package', 'TravelPackageController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('transaction', 'TransactionController');
    });

