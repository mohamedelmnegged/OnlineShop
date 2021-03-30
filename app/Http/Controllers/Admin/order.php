<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order as ModelsOrder;
use Illuminate\Http\Request;

class order extends Controller
{
    //
    public function index(){
        $orders = ModelsOrder::wherePurchase(0)->paginate(10);
        return view('admin.orders_show', compact('orders'));
    }

    public function edit($id){
        //check if product is exsit or not
        $order = ModelsOrder::whereId($id)->first();
        if($order):
            $update = 1;
            if($order->status == 1):
                $update = 0;
            endif;
            $order->update([
                'status' => $update,
                ]);
            return back()->withSucess('Done');
        endif;
        return redirect()->route('admin.orders.index')->withMsg("the Order is not found");
    }
}
