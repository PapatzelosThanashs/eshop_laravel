@extends('admin.layout')
@section('title', 'Edit Coupon')
@section('content')

    <h1>Manage Coupon</h1>
    <a href="{{url('admin/coupon')}}">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Back</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('/admin/coupon/')}}/{{$coupon->id}}" method="post">
                            @method('PATCH')
                            @csrf

                            <div class="form-group">
                                <div class="row m-t-30" >
                                    <div class="col-md-6">  
                                    <label for="coupon_title" class="control-label mb-1">Coupon title</label>
                                    <input id="coupon_title" name="coupon_title" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$coupon->coupon_title ?? ''}}">
                                    @error('coupon_name')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    </div>

                                    <div class="col-md-6">  
                                    <label for="coupon_code" class="control-label mb-1">Coupon code</label>
                                    <input id="coupon_code" name="coupon_code" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$coupon->coupon_code ?? ''}}">
                                    @error('coupon_code')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row m-t-30" >
                                    <div class="col-md-6">  
                                    <label for="coupon_value" class="control-label mb-1">Coupon value</label>
                                    <input id="coupon_value" name="coupon_value" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$coupon->coupon_value ?? ''}}">
                                    @error('coupon_value')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    </div>

                                    <div class="col-md-6">   
                                    <label for="type">type</label><BR>
                                    <select id="type" name="type" class="form-control">
                                    @if($coupon->type=='value')
                                    <option selected value="value">Value</option>
                                    <option value="percent">Percent</option>
                                    @else
                                    <option value="value">Value</option>
                                    <option selected value="percent">Percent</option>

                                    @endif
                                    </select>
                                    </div>          
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row m-t-30" >
                                    <div class="col-md-6">  
                                    <label for="min_order_amt" class="control-label mb-1">Min Order Amount</label>
                                    <input id="min_order_amt" name="min_order_amt" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$coupon->min_order_amt ?? ''}}">
                                    @error('min_order_amt')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    </div>

                                    <div class="col-md-6">   
                                    <label for="is_one_time">Is one time</label><BR>
                                    <select id="is_one_time" name="is_one_time" class="form-control">
                                    @if($coupon->is_one_time==1)
                                    <option selected value="1">Yes</option>
                                    <option value="0">No</option>
                                    @else
                                    <option value="1">Yes</option>
                                    <option selected value="0">No</option>
                                    @endif
                                    </select>
                                    </div>          
                                </div>
                            </div>

                            
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    <span id="payment-button-amount">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>        
@endsection