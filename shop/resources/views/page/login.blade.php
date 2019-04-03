
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Login Form </title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="{{asset('public/source/assets/css/login.css')}}" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="{{asset('public/source/assets/css/bootstrap/font-awesome.css')}}"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- //css files -->
<!-- online-fonts -->
<!-- //online-fonts -->
</head>
<body>
  <style type="text/css">
    body{
        background-image: url(./public/source/images/slide/bgl.jpg);
    }
  </style>
<!-- main -->
<div class="center-container">
  <!--header-->

  <!--//header-->
  <div class="main-content-agile">
    <div class="sub-main-w3"> 
      <div class="wthree-pro">
        <h2>Login</h2>
      </div>

      <form action="{{route('login')}} " method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
     
      @if(Session::has('flag'))
      <div style="color: #fff;" class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}} </div>
      @endif
    </div>
        <div class="pom-agile">
          <input placeholder="E-mail" name="email" class="user" type="email" required="">
          <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
        </div>
        <div class="pom-agile">
          <input  placeholder="Password" name="password" class="pass" type="password" required="">
          <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
        </div>
        <div class="sub-w3l">
          <h6><a href="#">Forgot Password?</a></h6>
          <div class="right-w3l">
            <input type="submit" value="Login">
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--//main-->
  <!--footer-->
 
  <!--//footer-->
</div>
</body>
</html>