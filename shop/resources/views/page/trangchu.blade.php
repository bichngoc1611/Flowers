    @extends('master')
    @section('content')



    <div class="container clearfix">
        <div class="row">
            <div class="col-md-3">
                <div class="menu-news">
                    <h3><span>Tin mới nhất</span></h3>
                    <ul class="level0">
                      @foreach($new_bar as $nb)
                      <li>
                        @if($nb->type_news == 1)
                        <a href="">
                          <i class="fa fa-random">{{$nb->title}} </i>
                      </a>
                      @endif
                  </li>
                  @endforeach
              </ul>
          </div>
          <div class="news-content">

          </div>
      </div>
      <div class="col-md-6 slideshows">
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            @foreach($slide as $sl)
            <li data-target="#carousel" data-slide-to="{{$loop->index}}" class="{{$loop->first?'active' : ''}}"></li>
            @endforeach
        </ul>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach($slide as $sl)
            <div class="item {{$loop->first?'active' : ''}}">
                <img src="./public/source/images/slide/{{$sl->image}}" alt="{{$sl->title}}" width="100%" > 
            </div>
            @endforeach

        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only"></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only"></span>
      </a>
  </div>    
</div>                      
<div class="col-md-3">
    <div class="box-html">
        <p><img src="./public/source/images/product/A6.jpg" class="img-respons"></p>
        <p><img src="./public/source/images/product/A7.jpg" class="img-respons"></p>
    </div>
</div>       
</div>
</div>  
<!-- end slide -->      

<!-- main -->
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
   
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($new_product as $new)                            
                            <div class="col-sm-3" style="    padding-bottom: 15px;" >
                                <div class="single-item">
                                 @if($new->promotion_price != 0)
                                 <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                 @endif
                                 <div class="single-item-header">
                                    <a href="{{route('chitietsanpham',$new->id)}}"><img src="./public/source/images/product/{{$new->image}}" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$new->name}}</p>
                                    <p class="single-item-price">
                                        @if($new->promotion_price == 0)
                                        <span class="">{{number_format($new->unit_price)}}VND</span>
                                        @else
                                        <span class="flash-del">{{number_format($new->unit_price)}}VND</span>
                                        <span class="flash-sale">{{number_format($new->promotion_price)}} VND</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>                            
                        </div>
                        @endforeach

                    </div>
                    <div class="row">{{$new_product->links()}}</div>
                </div> <!-- .beta-products-list -->
                <div class="space50">&nbsp;</div>

                <div class="beta-products-list">
                    <h4>Sản phẩm khuyến mãi</h4>
                    <div class="beta-products-details">
                        <p class="pull-left">Tìm thấy {{count($product_sale)}} sản phẩm</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        @foreach($product_sale as $ps)
                        <div class="col-sm-3" style="padding-bottom: 15px;">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <a href="{{route('chitietsanpham',$ps->id)}}"><img src="./public/source/images/product/{{$ps->image}}" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$ps->name}}</p>
                                    <p class="single-item-price">
                                        <span class="flash-del">{{number_format($ps->unit_price)}}VND</span>
                                        <span class="flash-sale">{{number_format($ps->promotion_price)}}VND</span>
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                
                                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$ps->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            
                                    <a class="beta-btn primary" href="{{route('chitietsanpham',$ps->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>

                        @endforeach


                        
                    </div><!-- .beta-products-list -->
                    <div class="row">{{$product_sale->links()}}</div>
                 

                    
                </div>
            </div>
        </div>
    </div>
</div>
</div> 
@endsection