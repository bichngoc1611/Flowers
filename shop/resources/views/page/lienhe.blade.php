 @extends('master')
 @section('content')
 <div class="container">
 	<h3 class="title">Gửi thông tin liên hệ</h3>
 	<div class="description">
 		Xin vui lòng điền các yêu cầu vào mẫu dưới đây và gửi cho chúng tôi. Chúng tôi
 		sẽ trả lời bạn ngay sau khi nhận được. Xin chân thành cảm ơn!
 	</div>
 	<div class="row">
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
 		<div class="col-md-6 col-sm-12 col-xs-12">
 			<div class="contact-feedback">
 				
 				<form action="lienhe" method="post" class="ng-pristine ng-invalid ng-invalid-required ng-valid-email">
 					<input type="hidden" name="_token" value="{{csrf_token()}}">
 					<input type="hidden" name="_method" value="POST" />
 					<div class="form-group input-group">
 						<span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-user"></i></span>
 						<input type="text" placeholder="Họ tên" name="name" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" value="@if(Auth::check()){{Auth::user()->full_name}} @endif" >
 					</div>
 					<div class="form-group input-group">
 						<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
 						<input type="text" placeholder="Địa chỉ" name="address" class="form-control ng-pristine ng-untouched ng-valid" value="@if(Auth::check()){{Auth::user()->address}} @endif" >
 					</div>
 					<div class="form-group input-group">
 						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
 						<input type="email" placeholder="Email" name="email" ng-model="Email" class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required"  value="@if(Auth::check()){{Auth::user()->email}} @endif" >
 					</div>
 					<div class="form-group input-group">
 						<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
 						<input type="text" placeholder="Điện thoại" name="phone" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required"  value="@if(Auth::check()){{Auth::user()->phone_number}} @endif" >
 					</div>
 					
 					<div class="form-group">
 						<textarea placeholder="Nội dung" name="message" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" rows="3" ng-model="Content"></textarea>
 					</div>
 					<button class="btn btn-defaults" type="submit">Gửi</button>
 				</form>
 			</div>
 		</div>
 		<div class="col-md-6 col-sm-12 col-xs-12">
 			<div class="map clearfix">
 				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.091474305932!2d108.15954391393237!3d16.060742288886104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421923760378af%3A0x5cdd8bdb1f95b2f4!2zNDE5IFTDtG4gxJDhu6ljIFRo4bqvbmcsIEhvw6AgTWluaCwgTGnDqm4gQ2hp4buDdSwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1552740848704" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
 			</div>
 		</div>
 	</div>
 </div>
 @endsection
