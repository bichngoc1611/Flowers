@extends('admin.layout.master')
@section('content')

<div class="col-sm-9">

    <h4 class="text-center"> Danh sách đơn hàng </h4>
    <div class="row mb-3">


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
                <th> Tên người order </th>
                <th> Ngày đặt hàng </th>
                <th> Tổng tiền </th>
                <th> Loại tiền trả </th>
                <th> Ghi chú </th>
                <th> Trạng thái </th>
                <th> Chi tiết </th>
                <th> Delete </th>
            </tr>
        </thead>
        <tbody>
         @foreach($bill as $b)
         @foreach($user as $u)
         @if ($u->id == $b->id_users)
         <tr>
            <td> {{$b->id}} </td>
            <td> {{$u->full_name}} </td>
            <td> {{$b->date_order}} </td>
            <td> {{$b->total}} </td>
            <td> {{$b->payment}} </td>  
            <td> {{$b->note}} </td>  
            <td> {{$b->status}} </td>               
            <td >
                <div class="d-flex flex-row justify-content-center">
                    <form action="admin/bill/chitietbill/{{$b->id}}" method="GET">
                        <button class='btn btn-danger ml-2'>  Chi tiết</button>
                    </form>
                </div>
            </td>
            <td >
                <div class="d-flex flex-row justify-content-center">
                    <form action="admin/news/delete/" method="GET">
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