<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class Cart extends Controller
{
    public function index(){
        $orders = Order::whereUser_id(  auth('user')->id())->wherePurchase(0)->get();
        $ordersCount = Order::whereUser_id(auth('user')->id())->whereStatus(1)->wherePurchase(0)->count();
        $subPrice = 0;
        //here to get the sub price for check out
        foreach($orders as $order):
            if($order->status == 1):
                $subPrice += ($order->product->price) * ($order->amount);
            endif;
        endforeach;
        $text = 1000;

        return view('user.cart', compact('orders', 'subPrice', 'text', 'ordersCount'));
    }
}
