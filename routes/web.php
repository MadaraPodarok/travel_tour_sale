<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDashboardController;
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
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/detail', [DetailController::class, 'index'])->name('detail_list');
Route::get('/detail/{slug}', [DetailController::class, 'show'])->name('detail_show');

Route::group(['middleware' => 'auth'], function () {
    # Роуты пользователя
    Route::get('user/edit/{id}', 'ProfileController@edit')
        ->name('user-edit');

    Route::post('user/edit/{id}', 'ProfileController@update')
        ->name('user-update');

    # Роуты доски
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('user-dashboard');

    Route::get('/dashboard/detail/{id}',  [UserDashboardController::class, 'show'])
        ->name('user-dashboard-edit');

    # Роуты платежей
    Route::post('/checkout/{id}', 'CheckoutController@process')
        ->name('checkout-process');

    Route::get('/checkout/{id}', 'CheckoutController@index')
        ->name('checkout-list');

    Route::post('/checkout/create/{detail_id}', 'CheckoutController@create')
        ->name('checkout-create');

    Route::get('/checkout/remove/{detail_id}', 'CheckoutController@remove')
        ->name('checkout-remove');

    Route::get('/checkout/confirm/{id}', 'CheckoutController@success')
        ->name('checkout-success');

});

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('admin_dashboard');

        Route::resource('travel-package', 'TravelPackageController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('transaction', 'TransactionController');
    })
;

