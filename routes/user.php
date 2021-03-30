<?php



/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "user" middleware group. Now create something great!
|
*/

use App\Http\Controllers\User\Cart;
use App\Http\Controllers\User\Checkout;
use App\Http\Controllers\User\Order;
use App\Http\Controllers\User\user;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function(){
    // all routes related to user in user panel and should be login to access them
    Route::get('logout', [user::class, 'logout'])->name('user.logout');
    Route::get('profile', [user::class, 'profile'])->name('user.profile');
    Route::get('edit', [user::class, 'edit'])->name('user.edit');
    Route::post('update', [user::class, 'update'])->name('user.update');

    //cart routes
    Route::get("cart", [Cart::class, 'index'])->name('user.cart');

    //order routes
    Route::post('order/remove', [Order::class, 'remove'])->name('user.order.remove');
    Route::post('order/saveForLater', [Order::class, 'saveLater'])->name('user.order.savelater');
    Route::post('orders/buy', [Order::class, 'buy'])->name('user.order.buy');
    Route::post('order/add', [Order::class, 'add'])->name('user.order.add');
    Route::post('order/update', [Order::class, 'update'])->name('user.order.update');

    //check out routes
    Route::get('checkout', [Checkout::class, 'index'])->name('user.checkout.index');
    Route::post('checkout', [Checkout::class, 'add'])->name('user.checkout.add');

});
// all routes to access without login
Route::get('',[user::class, 'index'])->name('user.dashboard');
Route::get('login', [user::class, 'login'])->name('user.login');
Route::post('login', [user::class, 'enter'])->name('user.enter');
Route::get('signup', [user::class, 'signup'])->name('user.signup');
Route::post('create', [user::class, 'create'])->name('user.create');



