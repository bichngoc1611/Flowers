@extends('admin.layout.master')
@section('content')

<div class="col-sm-9">

    <h4 class="text-center"> Quản lý Sản phẩm </h4>
    
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
        {{$err}}<br/>
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
            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> Product_type </th>
                <th> Price </th>
                <th> Promotion_price </th>
                <th> Description </th>
                <th> Images </th>
                <th> Status </th>
                <th> Delete </th>
                <th> Edit </th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $p)
            <tr>
                <td> {{$p->id}} </td>
                <td> {{$p->name}} </td>
                <td> {{$p->product_type->name}} </td>
                <td> {{$p->unit_price}} </td>
                <td> {{$p->promotion_price}} </td>
                <td> {!!$p->description!!} </td>
                <td>
                    <img class="images" src="./public/source/images/product/{{$p->image}} " style="width: 50px; height: 50px;" >
                </td>
                <td> {{$p->status}} </td>
                <td >
                    <div class="d-flex flex-row justify-content-center">
                        <form action="admin/product/delete/{{$p->id}}" method="GET">
                            <button class='btn btn-danger ml-2'> <i class="fa fa-trash-o"></i> </button>
                        </form>
                    </td>
                    <td>   
                        <form action="admin/product/edit/{{$p->id}}" method="GET">
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
            <!--  -->
        </div>
    </div>
</div>


@endsection