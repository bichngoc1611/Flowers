@extends('admin.layout.master')
@section('content')


<div class="col-sm-9">
  <h4><small>Thêm người dùng</small></h4>
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
    <form action="admin/user/add" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="POST" />
        <div class="form-group">
            <lable> Full Name </lable>
            <input type="text" id="name" class="form-control" placeholder="Nhập tên người dùng" name="full_name">
        </div>
        
        <div class="form-group">
            <lable> Email </lable>
            <input type="email" id="email" class="form-control" placeholder="Nhập Email" name="email">
        </div>

        <div class="form-group">
            <lable> Password </lable>
            <input type="password" class="form-control" placeholder="Nhập Password" name="password">
        </div>

        <div class="form-group">
            <lable> RePassword </lable>
            <input type="password" id="price" class="form-control" placeholder="Nhập lại Password" name="repassword">
        </div>

        <div class="form-group">
            <lable> <b> Role </b></lable>
            <lable class="radio-inline">
                <input type="radio" id="role" name="role" value="1" checked=""> Admin
            </lable>
            <lable class="radio-inline">
                <input type="radio" id="role" name="role" value="0" checked=""> Thường
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
