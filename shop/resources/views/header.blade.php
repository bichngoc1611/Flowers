        <header id="header">
            <!-- top-link -->
            <section class="top-link clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav navbar-nav topmenu-contact pull-left">
                                <li><i class="fa fa-phone"></i> <span>Hotline:01667854378</span></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right topmenu  hidden-xs hidden-sm">
                               
                                <li class="order-check"><a href="{{route('dathang')}}"><i class="fa fa-pencil-square-o"></i>Kiểm tra đơn hàng</a></li>
                                <li class="order-cart"><a href="{{route('dathang')}}"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                                 @if(Auth::check())
                                <li class="account-login"><a href="/"><i class="fa fa-user-circle"></i>{{Auth::user()->full_name}} </a></li>
                                <li class="account-register"><a href="dangxuat"><i class="fa fa-user-times"></i>Đăng xuất </a></li>
                                @else
                                <li class="account-register"><a href="dangnhap"><i class="fa fa-user-circle"></i>Đăng nhập </a></li>
                                <li class="account-register"><a href="dangki"><i class="fa fa-key"></i>Đăng ký </a></li>
                                @endif
                            </ul>
                            <div class="show-mobile hidden-lg hidden-md">
                                <div class="quick-user">
                                    <div class="quickaccess-toggle">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="inner-toggle">
                                        <ul class="login links">
                                            <li>
                                                <a href="dangki"><i class="fa fa-sign-out"></i> Đăng ký</a>
                                            </li>
                                            <li>
                                                <a href="dangnhap"><i class="fa fa-user"></i> Đăng nhập</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="quick-access">
                                    <div class="quickaccess-toggle">
                                        <i class="fa fa-list"></i>
                                    </div>
                                    <div class="inner-toggle">
                                        <ul class="links">
                                            <li><a id="mobile-wishlist-total" href="{{route('dathang')}}" class="wishlist"><i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng</a></li>
                                            <li><a href="{{route('dathang')}}" class="shoppingcart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end top-link -->
            <!-- header-content -->
            <section class="header-content clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-xs-12 col-sm-12 header-left text-center">
                            <div class="logo">
                                <a href="index" title="">
                                    <img alt="flowershop" src="./public/source/images/slide/logo.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 col-xs-12 col-sm-12 header-right">
                            <div class="sale-policy clearfix hidden-sm hidden-xs">
                                <ul class="clearfix">
                                    <li class="shipping">
                                        <i class="fa fa-truck"></i><span>
                                            Giao hàng miễn phí
                                        </span>
                                    </li>
                                    <li class="payment">
                                        <i class="fa fa-money"></i><span>
                                            Thanh toán linh hoạt
                                        </span>
                                    </li>
                                    <li class="return">
                                        <i class="fa fa-refresh"></i><span>
                                            Trả hàng trong 30 ngày
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-8 top-search">
                                    <div class="search-mobile hidden-md hidden-lg">
                                        <div class="input-cat form-search clearfix">
                                            <div class="form-search-controls">
                                                <form class="search" role="search" method="get" id="searchform" action="{{route('search')}}">
                                                    <input type="text" value="" name="search" class="input timkiem_val" id="s" placeholder="Tìm kiếm..." />
                                                    <button class="fa fa-search" type="submit" class="nut_tim" id="searchsubmit"></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search hidden-sm hidden-xs">
                                        <div class="input-cat form-search clearfix">
                                           <div class="form-search-controls">
                                            <form class="form_timkiem" role="search" method="get" id="searchform" action="{{route('search')}}">
                                                <input type="text" value="" name="search" class="form-search" id="s" placeholder="Tìm kiếm..." />
                                                <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 top-cart">

                                <div class="cart">
                                    <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                                    <div class="beta-dropdown cart-body">
                                     @if(Session::has('cart'))

                                     @foreach($product_cart as $product)
                                     <div class="cart-item">
                                        <a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}} "><i class="fa fa-times"></i></a>
                                        <div class="media">
                                            <a class="pull-left" href="#"><img src="./public/source/images/product/{{$product['item']['image']}}" alt=""></a>
                                            <div class="media-body">
                                                <span class="cart-item-title">{{$product['item']['name']}}</span>
                                                <span class="cart-item-amount">{{$product['qty']}}*<span>@if($product['item']['promotion_price']==0){{number_format($product['item']['unit_price'])}} @else {{number_format($product['item']['promotion_price'])}}@endif</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="cart-caption">
                                        <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif VND</span></div>
                                        <div class="clearfix"></div>

                                        <div class="center">
                                            <div class="space10">&nbsp;</div>
                                            <a href="{{route('dathang')}} " class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>


                                </div>
                            </div> <!-- .cart -->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end header-content -->
    <!-- navbar -->
    <section class="navigation-menu  clearfix">
        <div class="container">
            <div class="menu-top">
                <div class="row">
                    <div class="col-md-3">
                        <div class="menu-cate menu-quick-select">
                            <div class="menu-cate-title">
                                <span><i class="fa fa-th-list"></i><a href="">Danh mục sản phẩm</a></span>
                                <i class="fa fa-chevron-circle-down"></i>
                            </div>
                            <ul class="menu-cate-content">
                                @foreach($loai_sp as $loai)
                                <li>
                                    <a href="{{route('loaisanpham',$loai->id)}}">
                                        <i class="icon-menu fa fa-snowflake-o"></i>
                                        {{$loai->name}}<span class="arrow-menu"><i class="fa fa-chevron-right "></i></span>
                                    </a>
                                </li>

                                @endforeach


                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        <nav class="navbar nav-menu">
                            <div class="navbar-header">
                                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <nav id="mobile-menu" class="mobile-menu collapse navbar-collapse">
                                <ul class="menu nav navbar-nav"><li class="level0"><a class="" href="{{route('trang-chu')}}"><span>Trang chủ</span></a></li>
                                    <li class="level0"><a class="" href="{{route('gioithieu')}}"><span>Giới thiệu</span></a></li>
                                    <li class="level0"><a class="" href="{{route('sanpham')}}"><span>Sản phẩm</span></a></li>
                                    <li class="level0"><a class="" href="{{route('tintuc')}}"><span>Cẩm nang</span></a></li>
                                    <li class="level0"><a class="" href="{{route('tintuc')}}"><span>Dịch vụ</span></a></li>
                                    <li class="level0"><a class="" href="lienhe"><span>Liên hệ</span></a></li>
                                </ul>
                            </nav>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end navbar -->
</header>
<!-- end header -->
