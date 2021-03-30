<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Signup;
use App\Http\Requests\User\UserCheck;
use App\Models\Order;
use App\Models\Product;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class user extends Controller
{
    public function index(){
        $products = Product::get();
        $orders = Order::where('user_id',auth('user')->id())->wherePurchase(0)->get();
        $ordersCount = Order::whereUser_id(auth('user')->id())->whereStatus(1)->wherePurchase(0)->count();
        return view('user.dashboard', compact('products', 'orders', 'ordersCount'));
    }

    public function login(){
        return view('user.login');
    }

    public function enter(UserCheck $user){
        //after validate from the data then try to login in
        $credentials = $user->only(['email', 'password']);
        if(Auth::guard('user')->attempt($credentials)):
            $login = ModelsUser::whereEmail($user->email)->first();
            return redirect()->route('user.dashboard');
        endif;
        return back()->withMsg('Sorry sir you Entered invalid Credentials');
    }

    public function logout(Request $request){
        Auth::guard('user')->logout();
        return redirect()->route('user.login');
    }

    public function signup(){
        return view('user.signup');
    }

    public function create(Signup $user){
        //after validate from the user then create one and login
        $create = new ModelsUser();
        $create->name       = $user->name;
        $create->email      = $user->email;
        $create->phone      = $user->phone;
        $create->address    = $user->address;
        $create->password   = bcrypt($user->password);
        $create->status     = true;
        $create->save();
        Auth::login($create);
        return redirect()->route('user.dashboard')->withMsg('You Are Successfuly Added');
    }

    public function profile(){
        $ordersCount = Order::whereUser_id(auth('user')->id())->whereStatus(1)->wherePurchase(0)->count();
        return view('user.profile', compact('ordersCount'));
    }

    public function edit(){
        $ordersCount = Order::whereUser_id(auth('user')->id())->whereStatus(1)->wherePurchase(0)->count();
        return view('user.edit', compact('ordersCount'));
    }

    public function update(Signup $user){
        //after validate from the data update the data
        //make the password first
        $password = "";
        if($user->password == null):
            $password = $user->oldpassword;
        else:
            $password = bcrypt($user->password);
        endif;
        $update = ModelsUser::whereId($user->id)->update([
            'name'      => $user->name,
            'email'     => $user->email,
            'phone'     => $user->phone,
            'address'   => $user->address,
            'password'  => $password
        ]);
        return back()->withMsg('Your Info Updated Successfuly');
    }
}
