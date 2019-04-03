@extends('admin.layout.master')
@section('content')


<div class="col-sm-9">
  <h4><small>Thêm loại sản phẩm</small></h4>
  <hr>
  @if(count($errors) > 0)
  <div class="alert alert-danger">
    @foreach($errors->all() as $err)
    {{$err}}
    @endforeach
</div>
@endif
@if(Session('thongbao'))
<div class="alert alert-success">
    {{Session('thongbao')}}
</div>
@endif
<div class="content">
    <form action="admin/product/add" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="POST" />
        <div class="form-group">
            <lable> Name </lable>
            <input type="text" id="name" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <lable> Product_type </lable>
            <select class="form-control" name="producttype_id">
                @foreach($producttype as $pt)
                <option value="{{$pt->id}}">{{$pt->name}} </option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <lable> Description </lable>
            <textarea id="description" class="form-control ckeditor" name="description"></textarea>
        </div>
        <div class="form-group">
            <lable> Price </lable>
            <input type="text" id="price" class="form-control" placeholder="Price" name="price">
        </div>
        <div class="form-group">
            <lable> Promotion_price </lable>
            <input type="text" id="promotion_price" class="form-control" placeholder="Promotion_price" name="promotion_price">
        </div>
        <div class="form-group">
            <lable> Image </lable>            
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="form-group">
            <lable> Unit </lable>
            <input type="text" id="unit" class="form-control" placeholder="Unit" name="unit">
        </div>
        <div class="form-group">
            <lable> New </lable>
            <input type="text" id="new" class="form-control" placeholder="New" name="new">
        </div>

        <div class="form-group">
            <lable> <b> Status </b></lable>
            <lable class="radio-inline">
                <input type="radio" id="status" name="status" value="Còn" checked=""> Còn
            </lable>
            <lable class="radio-inline">
                <input type="radio" id="status" name="status" value="Hết" checked=""> Hết
            </lable>
        </div>
        <div>
            <button type="submit" class="btn btn-danger">Add</button>
            <button type="reset" class="btn btn-success">Reset</button>
        </div>

    </form>
</div>
</div>
</div>

<div class="space10">&nbsp;</div>

@endsection
