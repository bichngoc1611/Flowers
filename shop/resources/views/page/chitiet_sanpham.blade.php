 @extends('master')
 @section('content')

 <div class="inner-header">
   <div class="container">
    <div class="pull-left">
     <h6 class="inner-title">Sản phẩm {{$ct_sanpham->name}}</h6>
   </div>
   <div class="pull-right">
     <div class="beta-breadcrumb font-large">
      <a href="{{route('trang-chu')}}">Home</a> / <span>Thông tin chi tiết sản phẩm</span>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
</div>

<div class="container">
 <div id="content">
  <div class="row">
   <div class="col-sm-9">

    <div class="row">
     <div class="col-sm-4">
      <img src="./public/source/images/product/{{$ct_sanpham->image}}" alt="">
    </div>
    
    <div class="col-sm-8">
      <div class="single-item-body">
       <p class="single-item-title">{{$ct_sanpham->name}}</p>
       <p class="single-item-price">
        @if($ct_sanpham->promotion_price == 0)
        <span class="">{{number_format($ct_sanpham->unit_price)}}VND</span>
        @else
        <span class="flash-del">{{number_format($ct_sanpham->unit_price)}}VND</span>
        <span class="flash-sale">{{number_format($ct_sanpham->promotion_price)}} VND</span>
        @endif
      </p>
    </div>

    <div class="clearfix"></div>
    <div class="space20">&nbsp;</div>


    <div class="space20">&nbsp;</div>
    <form action="add-to-cart/{{$ct_sanpham->id}}" method="get">
      <input type="hidden" name="_token" value="{{csrf_token()}} ">
      <div class="single-item-options">
        <div class="options">
          <span>Số lượng</span>
          <input type="number" min="1" name="sl" value="" style="width: 50px;" required="">
        </div>   

        <button  type="submit" class="add-to-cart"
        @if($ct_sanpham->status == "Hết")
        {{"disabled"}}
        @endif><i class="fa fa-shopping-cart" ></i></button>

        <div class="clearfix"></div>
      </div>
      @if($ct_sanpham->status == "Còn")
      <div class="quantity"> <span>Sản phẩm còn</span></div>
      @else
      <div class="quantity"> <span>Sản phẩm hết</span></div>
      @endif
    </form>
  </div>
</div>

<div class="space40">&nbsp;</div>
<div class="woocommerce-tabs">
 <ul class="tabs">
  <li><a href="">Mô tả</a></li>
  
</ul>

<div class="panel" id="tab-description">
  <p>{!!$ct_sanpham->description!!} </p>
</div>

</div>
<div class="space50">&nbsp;</div>
<div class="beta-products-list">
 <h4>Sản phẩm tương tự</h4>

 <div class="row">
  @foreach($sp_tuongtu as $sptt)
  <div class="col-sm-4">
   <div class="single-item">
    @if($sptt->promotion_price != 0)
    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
    @endif
    <div class="single-item-header">
     <a href="{{route('chitietsanpham',$sptt->id)}}"><img src="./public/source/images/product/{{$sptt->image}} " alt=""></a>
   </div>
   <div class="single-item-body">
     <p class="single-item-title"> {{$sptt->name}} </p>
     <p class="single-item-price">
      @if($sptt->promotion_price == 0)
      <span class="">{{number_format($sptt->unit_price)}}VND</span>
      @else
      <span class="flash-del">{{number_format($sptt->unit_price)}}VND</span>
      <span class="flash-sale">{{number_format($sptt->promotion_price)}} VND</span>
      @endif
    </p>
  </div>
  <div class="single-item-caption">
   <a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
   <a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Details <i class="fa fa-chevron-right"></i></a>
   <div class="clearfix"></div>
 </div>
</div>
</div>
@endforeach

</div>
<div class="row">{{$sp_tuongtu->links("")}}</div>
</div> <!-- .beta-products-list -->
</div>
<div class="col-sm-3 aside">
  <div class="widget">
   <h3 class="widget-title">Product Sale </h3>
   <div class="widget-body">
    <div class="beta-sales beta-lists">
      @foreach($sp_km as $sp_km)
      @if($sp_km->promotion_price != 0)
      <div class="media beta-sales-item">
        <a class="pull-left" href="{{route('chitietsanpham',$sp_km->id)}}"><img src="./public/source/images/product/{{$sp_km->image}}" alt=""></a>
        <div class="media-body">
          {{$sp_km->name}}
          <span class="beta-sales-price">{{number_format($sp_km->promotion_price)}} VND </span>
        </div>
      </div>
      @endif
      @endforeach


    </div>
  </div>
</div> <!-- best sellers widget -->
<div class="widget">
 <h3 class="widget-title">New Products</h3>
 <div class="widget-body">
  <div class="beta-sales beta-lists">
    @foreach($new_product as $new)
    <div class="media beta-sales-item">
      <a class="pull-left" href="{{route('chitietsanpham',$new->id)}}"><img src="./public/source/images/product/{{$new->image}} " alt=""></a>
      <div class="media-body">
       {{$new->name}}
       <span class="beta-sales-price">{{number_format($new->unit_price)}}VND</span>
     </div>
   </div>
   @endforeach

 </div>
</div>
</div> <!-- best sellers widget -->
</div>
</div>
</div> <!-- #content -->
</div>

@endsection