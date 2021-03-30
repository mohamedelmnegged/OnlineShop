<?php

use App\Http\Controllers\Admin\admin;
use App\Http\Controllers\Admin\order;
use App\Http\Controllers\Admin\product;
use App\Http\Controllers\Admin\user;
use App\Models\Order as ModelsOrder;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin', ],function(){
    Route::group(['middleware' => 'admin:admin'], function(){
        Route::get('/', [admin::class, 'index'])->name('dashboard.show');
        //all routes related to user in admin panel
        Route::get('users', [user::class, 'index'])->name('admin.users.show');
        Route::get('users/block/{id}', [user::class, 'block'])->name('admin.users.block');
        Route::get('user/details/{id}', [user::class, 'details'])->name('admin.user.details');
        Route::post('user/delete', [user::class, 'delete'])->name('admin.user.delete');

        //routes for products
        Route::resource('products', product::class, array('as' => 'admin'));
        //routes for orders
        Route::resource('orders', order::class, ['as'=> 'admin']);

        //admin routes
        Route::get('logout', [admin::class, 'logout'])->name('admin.logout');
        Route::get('profile/{id}', [admin::class, 'profile'])->name('admin.profile');
        Route::get('edit/{id}', [admin::class, 'edit'])->name('admin.edit');
        Route::post('update', [admin::class, 'update'])->name('admin.update');
        Route::get('singup', [admin::class, 'signup'])->name('admin.signup');
        Route::post('save', [admin::class, 'save'])->name('admin.save');

    });

    //routes for login and signup and should not be login in to access them
    Route::get('login', [admin::class, 'login'])->name('admin.login');
    Route::post('login', [admin::class, 'enter'])->name('admin.login.enter');
});


