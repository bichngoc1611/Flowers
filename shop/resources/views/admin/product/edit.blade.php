@extends('admin.layout.master')
@section('content')


<div class="col-sm-9">
  <h4><small>Sửa sản phẩm {{$product->name}} </small></h4>
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
    <form action="admin/product/edit/{{$product->id}} " method="POST" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        
        <div class="form-group">
            <lable> Name </lable>
            <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{$product->name}} ">
        </div>
        <div class="form-group">
            <lable> Product_type </lable>
            <select class="form-control" name="producttype_id">
                @foreach($producttype as $pt)
                <option
                @if($product->id_type == $pt->id)
                {{"selected"}}
                @endif

                value="{{$pt->id}}">{{$pt->name}} </option>
                @endforeach

            </select>  
        </div>
        <div class="form-group">
            <lable> Description </lable>
            <textarea id="description" class="form-control ckeditor" name="description" >{{$product->description}}</textarea>
        </div>
        <div class="form-group">
            <lable> Price </lable>
            <input type="" id="price" class="form-control" placeholder="Price" name="price" value="{{$product->unit_price}} " >
        </div>
        <div class="form-group">
            <lable> Promotion_price </lable>
            <input type="" id="promotion_price" class="form-control" placeholder="Promotion_price" name="promotion_price" value="{{$product->promotion_price}} " >
        </div>
        <div class="form-group">
            <lable> Image </lable>
            <p>
                <img width="100px" height="100px" src="./public/source/images/product/{{$product->image}}">
            </p>
            <input type="file" id="image" name="image" class="form-control"  >
        </div>
        <div class="form-group">
            <lable> Unit </lable>
            <input type="text" id="unit" class="form-control" placeholder="Unit" name="unit" value="{{$product->unit}} " >
        </div>
       <div class="form-group">
            <lable> <b> New </b></lable>
            <lable class="radio-inline">
                <input type="radio" id="new" name="new" value="1"
                @if($product->new == 1)
                {{"checked"}}
                @endif
                >
                Mới
            </lable>
            <lable class="radio-inline">
                <input type="radio" id="new" name="new" value="0" 
                @if($product->new == 0)
                {{"checked"}}
                @endif
                > Đã có
            </lable>
        </div>

        <div class="form-group">
            <lable> <b> Status </b></lable>
            <lable class="radio-inline">
                <input type="radio" id="status" name="status" value="Còn"
                @if($product->status == "Còn")
                {{"checked"}}
                @endif
                >
                Còn
            </lable>
            <lable class="radio-inline">
                <input type="radio" id="status" name="status" value="Hết" 
                @if($product->status == "Hết")
                {{"checked"}}
                @endif
                > Hết
            </lable>
        </div>
        <div>
            <button type="submit" class="btn btn-danger">Edit</button>
            <button type="reset" class="btn btn-success">Reset</button>
        </div>

    </form>
</div>
</div>
</div>

<div class="space10">&nbsp;</div>

@endsection
