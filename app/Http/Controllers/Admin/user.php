<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeleteUser;
use App\Models\User as ModelsUser;


class user extends Controller
{
    public function index(){
        $users =ModelsUser::paginate(4);
        return view('admin.users_show', compact('users'));
    }

    public function block($id){
        //first validate from the id
        $check = ModelsUser::whereId($id)->first();
        if($check->count()):
            if($check->status == 1):
                ModelsUser::whereId($id)->update(['status' => 0]);
            else:
                ModelsUser::whereId($id)->update(['status' => 1]);
            endif;
            return back();
        endif;
        return back()->withMsg('the User Is not found', 'msg');

    }

    public function details($id){
        //check from if user exit
        $user = ModelsUser::whereId($id)->first();
        if(!$user):
            return redirect()->route('admin.users.show')->withMsg('this User is Not Found');
        endif;
        return view('admin.user_details', compact('user'));

    }

    public function delete(DeleteUser $request){
        //after check that user is exist delete it
        ModelsUser::whereId($request->id)->delete();
        return redirect()->route('admin.users.show')->withMsg("the User is Deleted Successfuly");
    }
}
