@extends('admin.layout.master')
@section('content')


<div class="col-sm-9">
  <h4><small>Thêm tin tức</small></h4>
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
    <form action="admin/news/add" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="POST" />
        <div class="form-group">
            <lable> Title </lable>
            <input type="text" id="title" class="form-control" placeholder="Nhập tiêu đề" name="title">
        </div>
        
        <div class="form-group">
            <lable> Content </lable>
            <textarea id="content" class="form-control ckeditor" name="content" placeholder="Nhập nội dung"></textarea>
        </div>

        <div class="form-group">
            <lable> <b> Type_news </b></lable>
            <lable class="radio-inline">
                <input type="radio" id="type_news" name="type_news" value="1" checked=""> 1(Mới)
            </lable>
            <lable class="radio-inline">
                <input type="radio" id="type_news" name="type_news" value="0" checked=""> 0
            </lable>
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
