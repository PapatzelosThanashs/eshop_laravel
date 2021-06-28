@extends('admin.layout')
@section('title', 'User')
@section('active_user','active')
@section('content')

    <h1>User</h1>

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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $user_val)
                        <tr>
                            <td>{{$user_val->id}}</td>
                            <td>{{$user_val->name}}</td>
                            <td>{{$user_val->email}}</td>
                            <td>{{$user_val->mobile}}</td>
                            <td>{{$user_val->city}}</td>
                            <td style="display: flex;">
                           
                           
                            @if($user_val->status==false)
                            <a href="{{url('/admin/user/')}}/{{$user_val->id}}/{{$user_val->status}}"> <button type="submit" class="btn btn-success">Active</button></a>
                            @else
                            <a href="{{url('/admin/user/')}}/{{$user_val->id}}/{{$user_val->status}}"> <button type="submit" class="btn btn-warning">Deactive</button></a>
                            @endif
                            
                             <a href="{{url('/admin/user/')}}/{{$user_val->id}}"> <button type="submit" class="btn btn-primary">Show</button></a>
                         
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>   
    </div>             
@endsection