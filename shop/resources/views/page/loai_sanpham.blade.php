@extends('master')
@section('content')
<!-- main -->
<div class="container">
  <div id="content" class="space-top-none">
   <div class="main-content">

    <div class="row">
     <div class="col-sm-3">
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
    </div>
    <div class="space60">&nbsp;</div>
    <div class="col-sm-9">
      <div class="beta-products-list">
       <h4>Sản phẩm {{$loai_sp->name}} </h4>
       <div class="beta-products-details">
        <p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
        <div class="clearfix"></div>
      </div>

      <div class="row">
        @foreach($sp_theoloai as $sp)
        <div class="col-sm-4">
         <div class="single-item">
          @if($sp->promotion_price != 0)
          <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
          @endif
          <div class="single-item-header">
           <a href="{{route('chitietsanpham',$sp->id)}}"><img src="./public/source/images/product/{{$sp->image}}" alt=""></a>
         </div>
         <div class="single-item-body">
           <p class="single-item-title">{{$sp->name}}</p>
           <p class="single-item-price">
            @if($sp->promotion_price == 0)
            <span class="">{{number_format($sp->unit_price)}}VND</span>
            @else
            <span class="flash-del">{{number_format($sp->unit_price)}}VND</span>
            <span class="flash-sale">{{number_format($sp->promotion_price)}} VND</span>
            @endif
          </p>
        </div>
        <div class="single-item-caption">
         <a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
         <a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Details <i class="fa fa-chevron-right"></i></a>
         <div class="clearfix"></div>
       </div>
     </div>
   </div>
   @endforeach
 </div>
</div>
</div>
<div class="row">{{$sp_theoloai->links("")}}</div>
</div>

</div> <!-- .beta-products-list -->

<div class="space50">&nbsp;</div>

<div class="beta-products-list">
 <h4>Sản phẩm khác</h4>
 <div class="beta-products-details">
  <p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
  <div class="clearfix"></div>
</div>
<div class="row">
 @foreach($sp_khac as $spk)
 <div class="col-sm-3">
   <div class="single-item">
    @if($spk->promotion_price != 0)
    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
    @endif
    <div class="single-item-header">
     <a href="{{route('chitietsanpham',$spk->id)}}"><img src="./public/source/images/product/{{$spk->image}}" alt=""></a>
   </div>
   <div class="single-item-body">
     <p class="single-item-title">{{$spk->name}}</p>
     <p class="single-item-price">
      @if($spk->promotion_price == 0)
      <span class="">{{number_format($spk->unit_price)}}VND</span>
      @else
      <span class="flash-del">{{number_format($spk->unit_price)}}VND</span>
      <span class="flash-sale">{{number_format($spk->promotion_price)}} VND</span>
      @endif
    </p>
  </div>
  <div class="single-item-caption">
   <a class="add-to-cart pull-left" href="{{route('themgiohang',$spk->id)}}"><i class="fa fa-shopping-cart"></i></a>
   <a class="beta-btn primary" href="{{route('chitietsanpham',$spk->id)}}">Details <i class="fa fa-chevron-right"></i></a>
   <div class="clearfix"></div>
 </div>
</div>
</div>
@endforeach

</div>

</div>

</div>
</div>
</div>
<div class="space40">&nbsp;</div>

</div> <!-- .beta-products-list -->
</div>
</div> <!-- end section with sidebar and main content -->


</div> <!-- .main-content -->
</div> <!-- #content -->
</div> <!-- .container -->
</div>
</div> 
@endsection