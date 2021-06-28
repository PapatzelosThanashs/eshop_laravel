<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user=User::all();
        return view('admin.user.user',compact('user'));
    }


    public function show(User $user_id)
    {
      
        $user=User::where(['id'=>$user_id->id])->first();
       
    
        return view('admin.user.show',compact('user'));
    }


    public function status(User $user_id,$status)
    {
       
        

        $status=!$status;
        $user_id->update(['status'=>$status]);

        request()->session()->flash('message','User status updated');

        return redirect('admin/user');
    }
}
