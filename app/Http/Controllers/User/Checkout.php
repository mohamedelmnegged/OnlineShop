<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Checkout as RequestsCheckout;
use App\Models\Cart;
use App\Models\Checkout as ModelsCheckout;
use App\Models\Order;
use Illuminate\Http\Request;

class Checkout extends Controller
{
    public function index(){
        $orders = Order::whereUser_id(auth('user')->id())->whereStatus(1)->wherePurchase(0)->get();
        $ordersCount = $orders->count();
        $subPrice = 0;
        //here to get the sub price for check out
        foreach($orders as $order):
            if($order->status == 1):
                $subPrice += ($order->product->price) * ($order->amount);
            endif;
        endforeach;
        $tax = 1000;

        return view('user.checkout', compact('orders', 'subPrice', 'tax', 'ordersCount'));
    }
    public function add(RequestsCheckout $request){
        //after validate from the coming data then send to data base
        $create  = ModelsCheckout::create($request->validated());
        //after insert data in check out then add check out to car
        $orders = Order::whereUser_id($request->user_id)->whereStatus(1)->wherePurchase(0)->get("id");
        foreach($orders as $order):
            $cart = Cart::create([
                'order_id'      => $order->id,
                'checkout_id'   => $create->id,
            ]);
            $order->update([ 'purchase' => 1]);
        endforeach;
        return back()->withMsg('Your Purchase is done');
    }
}
