@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đặt hàng</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="{{route('trang-chu')}} ">Home</a> / <span>Checkout</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		{{csrf_field()}}
		<form action="dathang " method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}} ">
			<div class="row">
				@if(Session('thongbao'))
<div class="alert alert-success">
    {{Session('thongbao')}}
</div>
@endif
			</div>
			<div class="row">
				<div class="col-sm-6">				
					
					<div class="form-block">
						<label for="your_last_name">Họ tên*</label>
						<input type="text" id="name" name="full_name" value="@if(Auth::check()){{Auth::user()->full_name}} @endif "  >
					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email"  placeholder="expample@gmail.com" value="@if(Auth::check()){{Auth::user()->email}} @endif " >
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="address" name="address" placeholder="Street Address" value="@if(Auth::check()){{Auth::user()->address}} @endif " >
					</div>		 


					<div class="form-block">
						<label for="phone">Phone*</label>
						<input type="text" id="phone" name="phone" value="@if(Auth::check()){{Auth::user()->phone_number}}@endif " >
					</div>
					
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes" name="notes"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body">
							<div class="your-order-item">
								<div>
									@if(Session::has('cart'))
									@foreach($product_cart as $cart)
									<!--  one item   -->
									<div class="media">
										<img width="35%" src="./public/source/images/product/{{$cart['item']['image']}} " alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large">{{$cart['item']['name']}} </p>
											<span class="color-gray your-order-info">Số lượng: {{$cart['qty']}} </span>
											<span class="color-gray your-order-info">Đơn giá: {{number_format($cart['price']/$cart['qty'])}} VND </span>
											
											
										</div>
									</div>
									@endforeach
									@endif
									<!-- end one item -->
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif VND </h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
						
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="tiền mặt" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán trực tiếp </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>                      
								</li>
								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Đoàn A
										<br>- Ngân hàng ACB, Chi nhánh Đà Nẵng
									</div>						
								</li>								
								
							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" >Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection