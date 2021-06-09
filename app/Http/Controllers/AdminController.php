<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(session()->has('ADMIN_LOGIN')){
        return redirect('admin/dashboard');
      }else{
        return view('admin.login');
      }
     
    }

    
    public function auth(Request $request)
    {
      $result=Admin::where(['email'=>$request->email])->first();

      if(!isset($result)){
        $request->session()->flash('error','wrong credentials');
        return redirect('admin');
      }else{

        if(Hash::check($request->password,$result->password)){
          session(['ADMIN_LOGIN'=>true,'ADMIN_ID'=>$request->id]); 
          return redirect('admin/dashboard'); 
        }else{
          $request->session()->flash('error','Please enter correct password');
          return redirect('admin');
        }
      }
    }

    public function dashboard()
    {
     return view('admin.dashboard');
    }

    public function logout()
    {
    session()->forget('ADMIN_LOGIN'); 
    session()->forget('ADMIN_ID'); 
    session()->flash('error','Logout successfully');
     return redirect('admin');
    }

    
}
