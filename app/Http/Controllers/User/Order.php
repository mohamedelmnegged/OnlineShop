<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order as ModelsOrder;
use App\Models\Product;
use Illuminate\Http\Request;

class Order extends Controller
{
    public function remove(Request $request){
        //check first if order is exist or not
        $order = ModelsOrder::whereId($request->id)->first();
        $order->delete();
        return back()->withMsg('Done');
    }

    public function add(Request $request){
        //check from product
        $product = Product::whereId($request->productId)->first();
        $userId = auth('user')->id();
        if($product):
            //check if this order is exist or not
            $checked = ModelsOrder::whereUser_id($userId)->whereProduct_id($request->productId)->wherePurchase(0)->first();
            if($checked):
                return back()->withError("This item is already exist in Your Cart");
            endif;
            //here add new order
            $order = new ModelsOrder();
            $order->create([
                'user_id'       => $userId,
                'product_id'    => $request->productId,
                'quantity'      => '1',
                'status'        => 1
            ]);
            return back()->withMsg('Item Added Successfuly');
        endif;
        return back()->withError('Sorry this Product is not found');
    }

    public function saveLater(Request $request){
        //check if the order is exist
        $order = ModelsOrder::whereId($request->id)->first();
        if($order):
            //then return status to false
            $order->update([
                'status' => 0,
            ]);
            return back()->withMsg('done');
        endif;
        return back()->withError('this item didnot found');
    }

    public function buy(Request $request){
        //check if the order is exist
        $order = ModelsOrder::whereId($request->id)->first();
        if($order):
            //then return status to false
            $order->update([
                'status' => 1,
            ]);
            return back()->withMsg('done');
        endif;
        return back()->withError('this item didnot found');
    }

    public function update(Request $request){
        $amounts = $request->amounts;
        $orders = ModelsOrder::whereUser_id(auth('user')->id())->whereStatus(1)->wherePurchase(0)->get();
        for($i=0; $i<count($orders); $i++):
            $orders[$i]->update([
                'amount'  => $amounts[$i],
            ]);
        endfor;
        return response('done', 200, ['msg' => 'orders updated']);
    }
}
