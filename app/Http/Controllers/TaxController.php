<?php

namespace App\Http\Controllers;
use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        $tax=Tax::all();
        return view('admin.tax.tax',compact('tax'));
    }


    public function create()
    {
        return view('admin.tax.create');
    }

    public function store(Request $request)
    {
     
        $request->validate([
        'tax_desc' => 'required|unique:taxes',
    ]);

         Tax::create([
        'tax_desc' => $request->tax_desc,
        'tax_value'=>$request->tax_value,
    ]);

        $request->session()->flash('message','Tax added');

        return redirect('admin/tax');
    }
 

    public function delete(Tax $tax_id)
    {
        Tax::destroy($tax_id->id);
        request()->session()->flash('message','Tax deleted');
        return back();
    }

    public function show(Tax $tax_id)
    {
      
        $tax=Tax::where(['id'=>$tax_id->id])->first();
        return view('admin.tax.show',compact('tax'));
    }

    public function update(Tax $tax)
    {
       
        $data=request()->validate([
            'tax_desc' => 'required',
            'tax_value'=>'required',
    ]);

        $tax->update($data);

        request()->session()->flash('message','Tax edited');

        return redirect('admin/tax');
    }

    public function status(Tax $tax_id,$status)
    {
       
        

        $status=!$status;
        $tax_id->update(['status'=>$status]);

        request()->session()->flash('message','Tax status updated');

        return redirect('admin/tax');
    }
}
