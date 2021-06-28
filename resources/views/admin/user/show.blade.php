@extends('admin.layout')
@section('title', 'User Details')
@section('content')

    <h1>User Details</h1>
    <a href="{{url('admin/user')}}">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Back</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <tbody>                             
                        <tr>
                            <td>ID</td>
                            <td>{{$user->id}}</td>                                                                 
                        </tr>                          
                        <tr>
                            <td>Name</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td>{{$user->mobile}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$user->address}}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{$user->city}}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{$user->state}}</td>
                        </tr>
                        <tr>
                            <td>Zip</td>
                            <td>{{$user->zip}}</td>
                        </tr>
                        <tr>
                            <td>Company</td>
                            <td>{{$user->company}}</td>
                        </tr>
                        <tr>
                            <td>Created at</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Updated at</td>
                            <td>{{$user->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>    
            </div>
        </div>  
    </div>        
@endsection