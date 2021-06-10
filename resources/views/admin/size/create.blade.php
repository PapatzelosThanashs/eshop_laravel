@extends('admin.layout')
@section('title', 'Create Size')
@section('content')

    <h1>Manage Size</h1>
    <a href="{{url('admin/size')}}">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Back</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('/admin/size')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="size" class="control-label mb-1">Size</label>
                                <input id="size" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('size')
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