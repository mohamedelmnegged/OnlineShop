<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLogin;
use App\Http\Requests\Admin\Admin as AdminRequest;
use App\Models\Admin as ModelsAdmin;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class admin extends Controller
{
    public function index(){

        $users = User::count();
        $products = Product::count();
        $orders = Order::wherePurchase(0)->count();
        return view('admin.dashboard', compact('users', 'products', 'orders'));
    }

    public function login(){
        return view('admin.login');
    }

    public function enter(AdminLogin $admin){
        //after validated that user enter data try to make the login

        $credentials = $admin->only(['email', 'password']);
        //Auth::guard('admin');
        if(Auth::guard('admin')->attempt($credentials)):
            // here make login after validating
            return redirect()->route('dashboard.show');
        endif;
        return redirect()->back()->withMsg("There is A worng in your Credentials");
    }

    public function logout(){
        if( !auth('admin')->user())
            return redirect()->route('admin.login')->withMsg('you are already logged out ');
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function edit(){
        return view('admin.edit');
    }


    public function update(AdminRequest $admin){
        //after validate from the coming data then update it
        $password = "";
        if($admin->password != null):
            $password = bcrypt($admin->password);
        else:
            $password = auth('admin')->user()->password;
        endif;
        $update = ModelsAdmin::whereId(auth('admin')->id())->update([
            'name'      => $admin->name,
            'email'     => $admin->email,
            'phone'     => $admin->phone,
            'password'  => $password,
        ]);
        return back()->withMsg('Your Info Updated Successfuly');
    }

    public function signup(){
        return view('admin.signup');
    }

    public function save(AdminRequest $admin ){
        //after validate the data from the admin then add him
        $save = new ModelsAdmin();
        $save->name     = $admin->name;
        $save->email    = $admin->email;
        $save->phone    = $admin->phone;
        $save->password = bcrypt($admin->password);
        $save->save();
        return redirect()->route('dashboard.show')->withSuccess("New Admin Added Successfuly");
    }

}
