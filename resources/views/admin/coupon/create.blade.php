@extends('admin.layout')
@section('title', 'Create Coupon')
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
                        <form action="{{url('/admin/coupon')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="coupon_title" class="control-label mb-1">Coupon name</label>
                                <input id="coupon_title" name="coupon_title" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('coupon_title')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="coupon_code" class="control-label mb-1">Coupon code</label>
                                <input id="coupon_code" name="coupon_code" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('coupon_code')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="coupon_value" class="control-label mb-1">Coupon value</label>
                                <input id="coupon_value" name="coupon_value" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('coupon_value')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
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