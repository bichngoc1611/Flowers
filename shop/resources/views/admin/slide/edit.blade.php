@extends('admin.layout.master')
@section('content')
<div class="col-lg-9">
    <div class="row"> 
        <div class="col-md-6 offset-md-3">
            <h5 class="text-info"> Sửa slide </h5> 
        </div>
    </div>
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
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="admin/slide/edit/{{$slide->id}} " method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <input type="hidden" name="_method" value="POST" />
                <div class="form-group">
                    <lable> Name </lable>
                    <input type="text" class="form-control" id="name" name="name" value="{{$slide->name}} " >
                </div>


                <div class="form-group">
                    <lable> Link </lable>
                    <input type="text" id="link" class="form-control" name="link" value="{{$slide->link}} " >
                </div>
                <div class="form-group">
                    <lable> Image </lable>
                    <p>
                        <img width="100px" height="100px" src="./public/source/images/slide/{{$slide->image}}">
                    </p>
                    <input type="file" id="image" name="image" class="form-control">
                </div>

                <div>
                    <button type="submit" class="btn btn-danger">Edit</button>
                    <button type="reset" class="btn btn-success">Reset</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection