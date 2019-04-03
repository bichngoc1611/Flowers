@extends('admin.layout.master')
@section('content')


<div class="col-sm-9">
  <h4><small>Thêm slide</small></h4>
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
    <form action="admin/slide/add" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="POST" />
        <div class="form-group">
            <lable> Name </lable>
            <input type="text" id="name" class="form-control" placeholder="Nhập tên slide" name="name">
        </div>
      
        <div class="form-group">
            <lable> Link </lable>
            <input type="text" id="price" class="form-control" placeholder="Nhập link" name="link">
        </div>

        <div class="form-group">
            <lable> Image </lable>            
            <input type="file" id="image" name="image" class="form-control">
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
