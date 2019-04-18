@extends('admin.layout.master')
@section('content')

<div class="col-sm-9">

    <h4 class="text-center"> Quản lý User </h4>
   
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
                <th> Full Name </th>
                <th> Email </th>
                <th> Role </th>
                <th> Delete </th>
                <th> Edit </th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $u)
            <tr>
                <td> {{$u->id}} </td>
                <td> {{$u->full_name}} </td>
                <td> {{$u->email}} </td>
                <td> 
                    @if($u->role == 1)
                    {{"Admin"}}
                    @else {{"Thường"}}
                    @endif
                </td>                 

                <td >
                    <div class="d-flex flex-row justify-content-center">
                        <form action="admin/user/delete/{{$u->id}}" method="GET">
                            <button class='btn btn-danger ml-2'
                            @if($u->role == 1)
                            {{"disabled"}}
                            @endif
                            > <i class="fa fa-trash-o"></i> </button>
                        </form>
                    </td>
                    <td>
                        <form action="admin/user/edit/{{$u->id}}" method="GET">
                            <button class='btn btn-success ml-2' 
                            @if($u->role == 1)
                            {{"disabled"}}
                            @endif
                            > <i class="fa fa-edit"></i> </button> 
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