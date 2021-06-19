


                 <!-- attributes area--->
                 <h3>Product Attributes</h3>
            <div class="row m-t-30" >
                <div class="col-md-12">
                    <div class="table--no-card m-b-30" >
                        <div class="card">
                            <div class="card-body" id="repeat">
                                @forelse($productattributes as $productattribute)
                                <hr>
                                    <div id="prod_att_0" class="row form-group">
                                        <div class="col-2 mt-3">
                                        <label for="sku" class="control-label mb-1">SKU</label>
                                            <input name="sku[]" type="text" placeholder="{{$productattribute->sku}}" class="form-control" value="{{$productattribute->sku ?? ''}}">
                                        </div>
                                        <div class="col-2 mt-3">
                                        <label for="mrp" class="control-label mb-1">MRP</label>
                                            <input name="mrp[]" type="text" placeholder="{{$productattribute->mrp}}" class="form-control" value="{{$productattribute->mrp ?? ''}}">
                                        </div>
                                        <div class="col-2 mt-3">
                                        <label for="price" class="control-label mb-1">Price</label>
                                            <input name="price[]" type="text" placeholder="{{$productattribute->price}}" class="form-control" value="{{$productattribute->price ?? ''}}">
                                        </div>

                                        <div class="col-2 mt-3">
                                        <label for="sizes_id" class="control-label mb-1">Size</label>
                                        <select id="sizes_id" name="sizes_id[]" class="form-control" value="{{$productattribute->sizes_id ?? ''}}">
                                         @foreach($sizes as $size)                             
                                                @if($productattribute->sizes_id==$size->id)
                                                <option selected value="{{$size->id}}">{{$size->size}}</option>
                                                @else
                                                <option value="{{$size->id}}">{{$size->size}}</option>
                                                @endif
                                         @endforeach
                                         </select>
                                        </div>
                                        <div class="col-2 mt-3">
                                        <label for="colors_id" class="control-label mb-1">Color</label>
                                        <select id="colors_id" name="colors_id[]" class="form-control" value="{{$productattribute->colors_id ?? ''}}">
                                         @foreach($colors as $color)                             
                                                @if($productattribute->colors_id==$color->id)
                                                <option selected value="{{$color->id}}">{{$color->color}}</option>
                                                @else
                                                <option value="{{$color->id}}">{{$color->color}}</option>
                                                @endif
                                         @endforeach
                                         </select>
                                        </div>
                                        
                                        <div class="col-2 mt-3">
                                        <label for="qty" class="control-label mb-1">Qty</label>
                                            <input name="qty[]" type="text" placeholder="{{$productattribute->qty}}" class="form-control" value="{{$productattribute->qty ?? ''}}">
                                        </div>

                                        <div class="col-4 mt-3">
                                            <label for="image_attr" class="control-label mb-1">Image_attr :</label>
                                            <img style="width:50px;height:50px" src="{{ asset('storage/product_photo/'.$productattribute->image_attr) }}" alt="Image Unavailable"> 
                                            <input  id="image_attr[]" name="image_attr[]" type="file" class="form-control" aria-required="true" aria-invalid="false" multiple >
                                            @error('image_attr')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            </div>

                                        <div class="col-2 mt-5">
                                        <button id="add_form" type="button" class="btn btn-success" onclick="add()">+ Add</button>
                                        </div>
                                        <div class="col-2 mt-5">
                                        <a href="/admin/del_attr/{{$productattribute->id}}"><button id="remove_attr" type="button" class="btn btn-warning">- Remove Attribute</button></a>
                                        </div>
                                    </div>
                                @empty
                                    <div id="prod_att_0" class="row form-group">
                                            <div class="col-3 mt-3">
                                            <label for="sku" class="control-label mb-1">SKU</label>
                                                <input name="sku[]" type="text" placeholder="" class="form-control" value="">
                                            </div>
                                            <div class="col-3 mt-3">
                                            <label for="mrp" class="control-label mb-1">MRP</label>
                                                <input name="mrp[]" type="text" placeholder="" class="form-control" value="">
                                            </div>
                                            <div class="col-3 mt-3">
                                            <label for="price" class="control-label mb-1">Price</label>
                                                <input name="price[]" type="text" placeholder="" class="form-control" value="">
                                            </div>

                                            <div class="col-3 mt-3">
                                            <label for="sizes_id" class="control-label mb-1">Size</label>
                                            <select id="sizes_id" name="sizes_id[]" class="form-control" value="">
                                                    <option value="" disabled selected>Select Size</option>
                                            @foreach($sizes as $size)                                 
                                                    <option value="{{$size->id}}">{{$size->size}}</option>
                                            @endforeach
                                            </select>
                                            </div>
                                            <div class="col-3 mt-3">
                                            <label for="colors_id" class="control-label mb-1">Color</label>
                                            <select id="colors_id" name="colors_id[]" class="form-control" value="">
                                                    <option value="" disabled selected>Select Color</option>
                                            @foreach($colors as $color)                                   
                                                    <option value="{{$color->id}}">{{$color->color}}</option>
                                            @endforeach
                                            </select>
                                            </div>
                                            
                                            <div class="col-3 mt-3">
                                            <label for="qty" class="control-label mb-1">Qty</label>
                                                <input name="qty[]" type="text" placeholder="" class="form-control" value="">
                                            </div>

                                            <div class="col-3 mt-3">
                                            <label for="image_attr" class="control-label mb-1">Image_attr</label>
                                            <input  id="image_attr[]" name="image_attr[]" type="file" class="form-control" aria-required="true" aria-invalid="false" multiple >
                                            @error('image_attr')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            </div>


                                            <div class="col-2 mt-5">
                                            <button id="add_form" type="button" class="btn btn-success" onclick="add()">+ Add</button>
                                            </div>

                                        </div>    
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>  
            </div>        



