<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Flower Shop</title>
    <base href="{{asset('')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/source/assets/css/styles-home.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/source/assets/css/style.css')}}">

    <!-- Fonts -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script type="text/javascript" src="{{url('public/js/ckeditor/ckeditor.js')}} "></script>
   
    <!-- Styles -->

</head>
<body>
    <div class="wrapper">
        <!-- header -->
        @include('header')
        <!-- slideshow -->
        @yield('content')       

        <!-- footer -->
        @include('footer')               


    </div>




</body>
<!-- <script type="text/javascript" src="{{asset('public/source/assets/js/menu1.js')}}"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
  $('.navigation-menu').addClass('original').clone().insertAfter('.navigation-menu').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

  scrollIntervalID = setInterval(stickIt, 10);

  function stickIt() {

      var orgElementPos = $('.original').offset();
      orgElementTop = orgElementPos.top;               

      if ($(window).scrollTop() >= (orgElementTop)) {
    // scrolled past the original position; now only show the cloned, sticky element.

    // Cloned element should always have same left position and width as original element.     
    orgElement = $('.original');
    coordsOrgElement = orgElement.offset();
    leftOrgElement = coordsOrgElement.left;  
    widthOrgElement = orgElement.css('width');
    $('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).show();
    $('.original').css('visibility','hidden');
} else {
    // not scrolled past the menu; only show the original menu.
    $('.cloned').hide();
    $('.original').css('visibility','visible');
}
}
</script>
</html>
