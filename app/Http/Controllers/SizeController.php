<?php

namespace App\Http\Controllers;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $size= Size::all();
        return view('admin.size.size',compact('size'));
    }


    public function create()
    {
        return view('admin.size.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'size' => 'required|unique:sizes',
    ]);

        Size::create([
        'size' => $request->size,
    ]);

        $request->session()->flash('message','Size added');

        return redirect('admin/size');
    }
 

    public function delete(Size $size_id)
    {
        Size::destroy($size_id->id);
        request()->session()->flash('message','Size deleted');
        return back();
    }

    public function show(Size $size_id)
    {
        $size=Size::where(['id'=>$size_id->id])->first();
        return view('admin.size.show',compact('size'));
    }

    public function update(Size $size)
    {
       
        $data=request()->validate([
            'size' => 'required',
        ]);

        $size->update($data);

        request()->session()->flash('message','Size edited');

        return redirect('admin/size');
    }

    public function status(Size $size_id,$status)
    {
        $status=!$status;
        $size_id->update(['status'=>$status]);
        request()->session()->flash('message','Size status updated');
        return redirect('admin/size');
    }
}
