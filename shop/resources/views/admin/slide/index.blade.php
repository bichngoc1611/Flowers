@extends('admin.layout.master')
@section('content')

<div class="col-sm-9">

    <h4 class="text-center"> Slide </h4>
    <div class="row mb-3">
        <div class="col-md-12 d-flex flex-row">
            <div class="d-flex align-items-center mr-3"> Tìm kiếm: </div> 
            <form action="admin/products/search-product" method="GET" class="d-flex flex-row mr-3">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search" name="search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
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
    <table class="table table-hover table-bordered text-center">
        <thead>
            <tr align="text-center" >
                <th> ID </th>
                <th> Name </th>
                <th> Link </th>
                <th> Image </th>
                <th> Delete </th>
                <th> Edit </th>
            </tr>
        </thead>
        <tbody>
            @foreach($slide as $sl)
            <tr>
                <td> {{$sl->id}} </td>
                <td> {{$sl->name}} </td>
                <td> {{$sl->link}} </td>
                <td>
                    <img width="500px" height="200px" src="./public/source/images/slide/{{$sl->image}}">
                </td>                 

                <td >
                    <div class="d-flex flex-row justify-content-center">
                        <form action="admin/slide/delete/{{$sl->id}}" method="GET">
                            <button class='btn btn-danger ml-2'> <i class="fa fa-trash-o"></i> </button>
                        </form>
                </td>
                <td>
                        <form action="admin/slide/edit/{{$sl->id}}" method="GET">
                            <button class='btn btn-success ml-2'> <i class="fa fa-edit"></i> </button> 
                        </form>
                        
                    </div> 
                </td> 
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="row mt-4">
        <div class="col-md-12 d-flex justify-content-center ">

        </div>
    </div>
</div>


@endsection