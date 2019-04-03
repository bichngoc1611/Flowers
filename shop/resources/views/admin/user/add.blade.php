@extends('admin.layout.index')
@section('content')
    <div class="container mt-3 mb-5">
        <div class="row"> 
            <div class="col-md-6 offset-md-3">
                <h5 class="text-info"> Thêm sản phẩm </h5> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <p class="mb-3 mt-3 text-success"> 
               
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="admin/products/store" method="POST" enctype="multipart/form-data">
               
                <input type="hidden" name="_method" value="POST" />
                    <div class="mb-3 d-flex flex-column">
                        <lable> Name </lable>
                        <input type="text" id="name" placeholder="Name" name="name">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Producttype </lable>
                        <select class="form-control" name="producttype_id">
                           
                                <option value="{{$tl->id}}">
                                  
                                </option>
                           
                        </select>
                        
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Description </lable>
                        <textarea id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Price </lable>
                        <input type="text" id="price" placeholder="Price" name="price">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Promotion_price </lable>
                        <input type="text" id="promotion_price" placeholder="Promotion_price" name="promotion_price">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Image </lable>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Unit </lable>
                        <input type="text" id="unit" placeholder="Unit" name="unit">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> New </lable>
                        <input type="text" id="new" placeholder="New" name="new">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Status </b></lable>
                        <lable class="radio-inline">
                        <input type="radio" id="status" name="status" value="Còn" checked=""> Còn
                        </lable>
                        <lable class="radio-inline">
                        <input type="radio" id="status" name="status" value="Hết" checked=""> Hết
                        </lable>
                    </div>
                    <div>
                        <button type="submit"> CREATE
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection