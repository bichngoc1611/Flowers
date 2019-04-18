@extends('admin.layout.master')
@section('content')


<div class="col-sm-9">
  <h4><small>Sửa tin tức{{$news->name}} </small></h4>
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
    <form action="admin/news/edit/{{$news->id}}" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT" />
        <div class="form-group">
            <lable> Title </lable>
            <input type="text" id="title" class="form-control" placeholder="Nhập tiêu đề" name="title" value="{{$news->title}} " >
        </div>
        
        <div class="form-group">
            <lable> Content </lable>
            <textarea id="content" class="form-control ckeditor" name="content" placeholder="Nhập nội dung">{{$news->content}} </textarea>
        </div>

        <div class="form-group">
            <lable> <b> Type_news </b></lable>
            <lable class="radio-inline">
                <input type="radio" id="type_news" name="type_news" value="1" 
                @if($news->type_news == 1)
                {{"checked"}}
                @endif
                > 1(Mới)
            </lable>
            <lable class="radio-inline">
                <input type="radio" id="type_news" name="type_news" value="0" 
                @if($news->type_news == 0)
                {{"checked"}}
                @endif
                > 0
            </lable>
        </div>

        <div class="form-group">
            <lable> Image </lable>       
            <p>
                <img width="100px" height="100px" src="./public/source/images/product/{{$news->image}}">
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

<div class="space10">&nbsp;</div>

@endsection
