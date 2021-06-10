<?php

namespace App\Http\Controllers;
use App\Models\Coupon;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons= Coupon::all();
        return view('admin.coupon.coupon',compact('coupons'));
    }


    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(Request $request)
    {
     
        $request->validate([
        'coupon_title' => 'required',
        'coupon_code' => 'required|unique:coupons',
        'coupon_value'=>'required',
    ]);

        Coupon::create([
        'coupon_title' => $request->coupon_title,
        'coupon_code' => $request->coupon_code,
        'coupon_value' => $request->coupon_value,
    ]);

        $request->session()->flash('message','Coupon added');

        return redirect('admin/coupon');
    }
 

    public function delete(Coupon $coupon_id)
    {
        Coupon::destroy($coupon_id->id);
        request()->session()->flash('message','Coupon deleted');
        return back();
    }

    public function show(Coupon $coupon_id)
    {
      
        $coupon=Coupon::where(['id'=>$coupon_id->id])->first();
       
    
        return view('admin.coupon.show',compact('coupon'));
    }

    public function update(Coupon $coupon)
    {
       
        $data=request()->validate([
            'coupon_title' => 'required',
            'coupon_code' => 'required',
            'coupon_value'=>'required',
    ]);

        $coupon->update($data);

        request()->session()->flash('message','Coupon edited');

        return redirect('admin/coupon');
    }
}
