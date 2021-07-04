<?php

namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $color=Color::all();
        return view('admin.color.color',compact('color'));
    }


    public function create()
    {
        return view('admin.color.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'color' => 'required|unique:colors',
        ]);

        Color::create([
        'color' => $request->color,
        ]);

        $request->session()->flash('message','Color added');

        return redirect('admin/color');
    }
 

    public function delete(Color $color_id)
    {
        Color::destroy($color_id->id);
        request()->session()->flash('message','Color deleted');
        return back();
    }

    public function show(Color $color_id)
    {
      
        $color=Color::where(['id'=>$color_id->id])->first();
       
    
        return view('admin.color.show',compact('color'));
    }

    public function update(Color $color)
    {
       
        $data=request()->validate([
            'color' => 'required',
        ]);

        $color->update($data);

        request()->session()->flash('message','Color edited');

        return redirect('admin/color');
    }

    public function status(Color $color_id,$status)
    {
        $status=!$status;
        $color_id->update(['status'=>$status]);
        request()->session()->flash('message','Color status updated');
        return redirect('admin/color');
    }
}
