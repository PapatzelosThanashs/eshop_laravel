<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('admin.login');
    }

    
    public function auth(Request $request)
    {
      $result=Admin::where(['email'=>$request->email,'password'=>$request->password])->first();
      if(!isset($result)){
        $request->session()->flash('error','wrong credentials');
        return redirect('admin');
      }else{
        
        session(['ADMIN_LOGIN'=>true,'ADMIN_ID'=>$request->id]); 
        return redirect('admin/dashboard'); 
      }
    }

    public function dashboard()
    {
     return view('admin.dashboard');
    }


    
}
