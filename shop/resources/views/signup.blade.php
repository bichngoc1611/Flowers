
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link href="{{asset('public/source/assets/css/sigup.css')}}" rel="stylesheet" type="text/css" media="all">

	<!-- //css files -->
	<!-- online-fonts -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<style type="text/css">
		body{
			background-image:url('./public/source/images/slide/bg.jpg') ;
		}
	</style>
	<!--header-->

	<!--//header-->
	<!--main-->
	<div class="main-agileits">

		<h2 class="sub-head">Sign Up</h2>
		<div class="row">
			@if(count($errors)>0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $err)
				{{$err}}
				@endforeach
			</div>
			@endif
			@if(Session::has('thanhcong'))
			<div class="alert alert-success">{{Session::get('thanhcong')}} </div>
			@endif
		</div>
		<div class="sub-main">	

			<form action="dangki" method="post">

				<input type="hidden" name="_token" value="{{csrf_token()}}">

				<input placeholder="Name" name="name" class="name" type="text" required="">
				<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br>

				<input placeholder="Phone Number" name="phone" class="number" type="text" required="">
				<span class="icon2"><i class="fa fa-phone" aria-hidden="true"></i></span><br>

				<input placeholder="Email" name="email" class="email" type="text" required="">
				<span class="icon3"><i class="fa fa-envelope" aria-hidden="true"></i></span><br>

				<input  placeholder="Password" name="password" class="pass" type="password" required="">
				<span class="icon4"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>

				<input  placeholder="Confirm Password" name="re_password" class="pass" type="password" required="">
				<span class="icon5"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
				
				<input type="submit" value="sign up">
			</form>
		</div>
		<div class="clear"></div>
	</div>
	<!--//main-->



</body>
</html>