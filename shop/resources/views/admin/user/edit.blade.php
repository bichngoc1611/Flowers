@extends('admin.layout.master')
@section('content')


<div class="col-sm-9">
  <h4><small>Sửa người dùng</small></h4>
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
    <form action="admin/user/edit/{{$user->id}} " method="POST" enctype="multipart/form-data">

     {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT" />
        <div class="form-group">
            <lable> Full Name </lable>
            <input type="text" id="name" class="form-control" placeholder="" name="full_name" value="{{$user->full_name}} " >
        </div>
        
        <div class="form-group">
            <lable> Email </lable>
            <input type="email" id="email" class="form-control  " disabled="" name="email" value="{{$user->email}} " >
        </div>

        <div class="form-group">
            <input type="checkbox" id="idChangePassword" name="changePassword" onchange="changePasswords();">
            <lable> Đổi lại Password </lable>
            <input type="password" class="form-control passwords" placeholder="" name="password" disabled  id="pass"  >
        </div>

        <div class="form-group">
            <lable> RePassword </lable>
            <input type="password" class="form-control passwords" placeholder="" name="repassword" id="repass" disabled >
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

<script>
    function changePasswords(){
        var changePassword = document.getElementById("idChangePassword");
        var pass = document.getElementById("pass");
        var repass = document.getElementById("repass");        
        
        if (changePassword.checked) {
            pass.removeAttribute("disabled");
            repass.removeAttribute("disabled");
        } else {
            pass.disabled = true;
           repass.setAttribute("disabled","false");
        }

    }
        

        

</script>
