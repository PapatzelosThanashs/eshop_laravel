  <!-- images area--->
    <h3>Product Images</h3>
    <div class="row m-t-30" >
        <div class="col-md-12">
            <div class="table--no-card m-b-30" >
                <div class="card" >
                    <div class="card-body" id="repeat_image">
                     @forelse($productimages as $productimage)
                        <div class="form-group" id="prod_image_0">
                                <label for="product_images" class="control-label mb-1">Image</label>
                                    <img style="width:50px;height:50px" src="{{ asset('storage/product_photo/'.$productimage->images) }}" alt="Italian Trulli">
                                    <input  id="product_images[]" name="product_images[]" type="file" class="form-control" aria-required="true" aria-invalid="false"   >
                                    @error('product_images')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                <div class="row m-t-1" >                           
                                    <div class="col-2 mt-2">
                                        <button id="add_image" type="button" class="btn btn-success" onclick="addImage()">+ Add</button>
                                    </div> 
                                    <div class="col-md-1 mt-2">                              
                                        <a href="/admin/del_image/{{$productimage->id}}"><button id="remove_image" type="button" class="btn btn-warning">- Remove Image</button></a>                           
                                    </div>
                                </div> 
                        </div>                               
                 
                    @empty
                        <div class="form-group" id="prod_image_0">
                                    <label for="product_images" class="control-label mb-1">Image</label>
                                        <img style="width:50px;height:50px" src="" alt="Italian Trulli">
                                        <input  id="product_images[]" name="product_images[]" type="file" class="form-control" aria-required="true" aria-invalid="false"   >
                                        @error('product_images')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    <div class="col-2 mt-2">
                                            <button id="add_image" type="button" class="btn btn-success" onclick="addImage()">+ Add</button>
                                    </div>        
                        </div>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- end images area--->  