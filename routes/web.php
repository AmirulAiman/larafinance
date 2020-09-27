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
Route::redirect('/','/login');
Route::middleware('auth')->group(function(){

    Route::view('/home','pages.home')->name('home');

    Route::middleware('admin')->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::view('/dashboard', 'pages.admin.dashboard')->name('admin.dashboard');
            Route::view('/company','pages.admin.company')->name('admin.company');
//            Route::view('/user', '')->name('admin.user');
        });
    });

    Route::middleware('company')->group(function(){
        Route::prefix('/company')->group(function(){
            Route::view('/dashboard','pages.company.dashboard')->name('company.dashboard');
            Route::view('/invoice','pages.company.invoice')->name('company.invoice');
            Route::view('/customers','pages.company.customer')->name('company.customer');
            Route::view('/new-invoice','pages.company.new-invoice')->name('company.new-invoice');
        });
    });
    Route::middleware('customer')->group(function(){
        Route::prefix('/customer')->group(function(){
            Route::view('/dashboard','pages.customer.dashboard')->name('customer.dashboard');
            Route::view('/invoice','pages.customer.invoice')->name('customer.invoice');
            Route::view('/company','pages.customer.company')->name('customer.company');
        });
    });
});

