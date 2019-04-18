@extends('admin.layout.master')
@section('content')


<div class="col-sm-9">
	<h4><small>Chi tiết đơn hàng </small></h4>
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
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="col-md-4">Thông tin khách hàng</th>
					<th class="col-md-6"></th>
				</tr>
			</thead>
			<tbody>
                <tr>
                    <td> Họ tên </td>
                    <td> {{$bill->user->full_name}} </td>
                </tr>
                <tr>
                    <td> Địa chỉ email </td>
                    <td> {{$bill->user->email}} </td>
                </tr>
                <tr>
                    <td> Số điện thoại </td>
                    <td> {{$bill->user->phone_number}} </td>
                </tr>
                <tr>
                    <td> Địa chỉ </td>
                    <td> {{$bill->user->address}} </td>
                </tr>
                <tr>
                    <td> Ngày đặt hàng  </td>
                    <td> {{$bill->date_order}} </td>
                </tr>
            </tbody>
        </table>
    </div>
    <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
            <tr role="row">
                <th class="sorting col-md-1" >ID Bill</th>
                <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                <th class="sorting_asc col-md-3">Hình ảnh</th>
                <th class="sorting col-md-1">Số lượng</th>
                <th class="sorting_asc col-md-2">Giá tiền</th>
            </thead>
            <tbody>
                @foreach($ctbill as $ctb)
                @foreach($product as $p)
                @if($p->id == $ctb->id_product)
                <tr>
                    <td>{{ $ctb->id_bill}}</td>
                    <td>{{ $p->name }}</td>
                    <th><img style="width: 50px;height: 50px" src="public/source/images/product/{{$p->image}}">   </th>
                    <td>{{$ctb->quantity}}</td>
                    <td>{{ number_format($ctb->unit_price) }} VNĐ</td>
                </tr>
                @endif
                @endforeach  
                @endforeach
                <tr>
                    <td colspan="4"><b>Tổng tiền</b></td>
                    <td colspan="1"><b class="text-red"> {{number_format($ctb->bill->total)}} VNĐ</b></td>
                </tr>
            </tbody>
        </table>


        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <form action = "admin/bill/chitietbill/{{$bill->id}} " method="POST">
                        
                         <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="mb-3 d-flex flex-row">
                            <lable> <b>  Trạngthái: </b></lable>
                            <lable class="ml-3 radio-inline text-danger">
                                <input type="radio" id="status" name="status" value="Chưa giao hàng" checked=""> Chưa giao hàng
                            </lable>
                            <lable class="ml-3 radio-inline text-danger">
                                <input type="radio" id="status" name="status" value="Đang giao hàng"> Đang giao hàng
                            </lable>
                            <lable class="ml-3 radio-inline text-danger">
                                <input type="radio" id="status" name="status" value="Giao hàng thành công" > Giao hàng thành công
                            </lable>    
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-info" type="submit"> SAVE
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
</div>

        <div class="space10">&nbsp;</div>

        @endsection
