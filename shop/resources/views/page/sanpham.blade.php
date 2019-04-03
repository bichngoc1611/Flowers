@extends('master')
@section('content')
<!-- main -->
<div class="container">	
	<div class="main-content">
		<div class="row">
			<div class="container">
				<div id="content" class="space-top-none">
					<div class="main-content">
						<div class="row">
							<div class="col-sm-12">
								<div class="beta-products-list">
									<h4>Tất cả các Sản phẩm</h4>
									<div class="beta-products-details">
										<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
										<div class="clearfix"></div>
									</div>

									<div class="row">
										@foreach($product as $p)                            
										<div class="col-sm-3" style="    padding-bottom: 15px;" >
											<div class="single-item">
												@if($p->promotion_price != 0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
												@endif
												<div class="single-item-header">
													<a href="{{route('chitietsanpham',$p->id)}}"><img src="./public/source/images/product/{{$p->image}}" alt=""></a>
												</div>
												<div class="single-item-body">
													<p class="single-item-title">{{$p->name}}</p>
													<p class="single-item-price">
														@if($p->promotion_price == 0)
														<span class="">{{number_format($p->unit_price)}}VND</span>
														@else
														<span class="flash-del">{{number_format($p->unit_price)}}VND</span>
														<span class="flash-sale">{{number_format($p->promotion_price)}} VND</span>
														@endif
													</p>
												</div>
												<div class="single-item-caption">
													<a class="add-to-cart pull-left" href="{{route('themgiohang',$p->id)}}"><i class="fa fa-shopping-cart"></i></a>
													<a class="beta-btn primary" href="{{route('chitietsanpham',$p->id)}}">Details <i class="fa fa-chevron-right"></i></a>
													<div class="clearfix"></div>
												</div>
											</div>                            
										</div>
										@endforeach

									</div>
									<div class="row">{{$product->links("")}}</div>
								</div> <!-- .beta-products-list -->
								<div class="space50">&nbsp;</div>


							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>
</div>
</div>		
@endsection