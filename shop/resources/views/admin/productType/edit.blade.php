@extends('admin.layout.master')
@section('content')


<div class="col-sm-9">
  <h4><small>Sửa loại {{$type->name}} </small></h4>
  <hr>
  @if(count($errors) > 0)
  <div class="alert alert-danger">
    @foreach($errors->all() as $err)
    {{$err}}<br/>
    @endforeach
</div>
@endif
@if(Session('thongbao'))
<div class="alert alert-success">
    {{Session('thongbao')}}
</div>
@endif
<div class="content">
  <form action="admin/productType/edit/{{$type->id}} " method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}} ">
    <div class="form-group">
        <label>Tên loại sản phẩm</label>
        <input class="form-control" type="" name="name"  value="{{$type->name}} ">
    </div>
    <div class="form-group">
        <label>Mô tả loại sản phẩm</label>
        <textarea class="form-control" type="" name="description" value="{{$type->description}} " ></textarea>
      </div>


    <button type="submit" class="btn btn-default">Edit</button>
    <button type="reset" class="btn btn-default">Reset</button>

</form>
</div>
</div>
</div>



@endsection 