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
						<a href="{{route('tintuc')}}">
							<i class="fa fa-random"> {{$nb->title}} </i>
						</a>
						@endif
					</li>
					@endforeach
				</ul>
			</div>
			<div class="news-content">

			</div>
		</div>
		<div class="col-md-9">
			<div class="breadcrumb clearfix">
				<ul>
					<li itemtype="" itemscope="" class="home">
						<a title="Đến trang chủ" href="{{route('trang-chu')}} " itemprop="url"><span itemprop="title">Trang chủ</span></a>
					</li>
					<li class="icon-li"><strong>Tin tức</strong> </li>
				</ul>
			</div>

			<div class="news-content">
				<h1 class="title"><span>Tin tức</span></h1>
				<div class="news-block clearfix">
					@foreach($new as $tt)
					<div class="news-item clearfix">

						<div class="col-md-3 col-sm-4 col-xs-12 image">
							<a href="">
								<img src="./public/source/images/product/{{$tt->image}} " class="img-responsive lazy-img" data-original="" alt="{{$tt->title}}" style="display: inline-block;">
							</a>
						</div>
						<div class="col-md-9 col-sm-8 col-xs-12 news-info ">
							<h2 class="name"><a href="">{{$tt->title}} </a></h2>
							<p class="date">{{$tt->create_at}} </p>
							<div class="desc"><div style="text-align: justify;"><span style="line-height: 1.42857; box-sizing: border-box;">{!!$tt->content!!} </span></div></div>
						</div>

					</div>
					@endforeach


				</div>
				<div class="">{{$new->links("")}}</div>
			</div>
		</div>
	</div>


</div>

@endsection
