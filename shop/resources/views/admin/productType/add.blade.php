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
    <form action="admin/productType/add" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}} ">
      <div class="form-group">
        <label>Tên loại sản phẩm</label>
        <input class="form-control" type="" name="name" placeholder="Nhập tên loại sản phẩm">
      </div>
      <div class="form-group">
        <label>Mô tả loại sản phẩm</label>
        <textarea class="form-control ckeditor" type="" name="description" placeholder="Nhập mô tả loại sản phẩm"></textarea>
      </div>

      <button type="submit" class="btn btn-danger">Add</button>
      <button type="reset" class="btn btn-success">Reset</button>
    </form>
  </div>
</div>
</div>



@endsection