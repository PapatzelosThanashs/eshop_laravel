@extends('admin.layout')

@section('content')

    <h1>Coupon</h1>
    <a href="coupon/create">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Add Coupon</button>
    </a>

    <div class="row m-t-30">

        <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
        {{session('message')}}  
            </div>
        @endif
           <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Coupon Title</th>
                            <th>Coupon Code</th>
                            <th>Coupon Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{$coupon->id}}</td>
                            <td>{{$coupon->coupon_title}}</td>
                            <td>{{$coupon->coupon_code}}</td>
                            <td>{{$coupon->coupon_value}}</td>
                            <td style="display: flex;">
                           
                            <form action="{{url('/admin/coupon/')}}/{{$coupon->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            
                             <a href="{{url('/admin/coupon/')}}/{{$coupon->id}}"> <button type="submit" class="btn btn-primary">Edit</button></a>
                         
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>   
    </div>             
@endsection