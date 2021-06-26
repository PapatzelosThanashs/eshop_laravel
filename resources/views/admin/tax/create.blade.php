@extends('admin.layout')
@section('title', 'Create Tax')
@section('content')

    <h1>Manage Tax</h1>
    <a href="{{url('admin/tax')}}">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Back</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('/admin/tax')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="tax_desc" class="control-label mb-1">Tax description</label>
                                <input id="tax_desc" name="tax_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('tax_desc')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tax_value" class="control-label mb-1">Tax value</label>
                                <input id="tax_value" name="tax_value" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('tax_value')
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