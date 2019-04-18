@extends('admin.layout.master')
@section('content')

<div class="col-sm-9">

    <h4 class="text-center">Quản lý Liên hệ </h4>
   
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
                <th> Address </th>
                <th> Email </th>
                <th> Phone_number </th>
                <th> Message </th>
                <th> Delete </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($contact as $ct)
            @foreach($user as $u)
            @if($ct->user_id == $u->id)
            <tr>
                <td> {{$ct->id}} </td>
                <td> {{$u->full_name}} </td>
                <td> {{$u->address}} </td>
                <td> {{$u->email}} </td>
                <td> {{$u->phone_number}} </td>
                <td> {{$ct->message}} </td>                

                <td >
                    <div class="d-flex flex-row justify-content-center">
                        <form action="admin/contact/delete/{{$ct->id}}" method="GET">
                            <button class='btn btn-danger ml-2'> <i class="fa fa-trash-o"></i> </button>
                        </form>
                    </div>
                </td>

            </tr>
            @endif
            @endforeach
            @endforeach

        </tbody>
    </table>
    <div class="row mt-4">
        <div class="col-md-12 d-flex justify-content-center ">

        </div>
    </div>
</div>


@endsection