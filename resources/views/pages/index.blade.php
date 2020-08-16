@extends('layouts.main')

@section('metas')
	<title> SASTO SHOWROOM | Online Shopping in Nepal: Buy Clothes, Electronics & Mobiles </title>
	<link rel="canonical" href="https://www.sastoshowroom.com/" />
	<meta name="description" content="sastoshowroom.com : Online Store to Buy Clothing, Electronics, Mobiles &amp; much more at best prices Online all across Nepal." />
	<meta name="keywords" content="sasto, Showroom, Store, store, store Nepal, showroom, sasto, sasto show room, sastoshow room, sasto showroom, online shopping in Nepal, online shopping, sasto Nepal, sasto room, sasto showroom Nepal, Phones and Tablets, Men's Accessories, Food, Beverage, Sports, Women's Accessories, Mobile Accessories, Laptop, Cosmetics, Clothes, Baby, Home Appliances, Electronic, Goods, Others">
	<meta property="og:url" content="https://www.sastoshowroom.com/" />
	<meta property="og:title" content="Sastoshowroom" />
	<meta property="og:image" content="https://www.sastoshowroom.com/image/logoname.png" />
	<meta property="og:description" content="Sastoshowroom : Online Store to Buy Clothing, Electronics, Mobiles &amp; much more at best prices Online all across Nepal." />
@endsection

@section('styles')

<style>
	.cat-bar{padding-top: 12px !important;color: black;}
	.cat-bar li{border-top-left-radius: 0px;  border-top-right-radius: 0px;border-left: 0px;border-right: 0px;	}
	.cat-bar a{color: grey;	font-size: 17px;}
	.cata-back{	display: none;	}
	.seemore-btn{	padding: 8px 30px;background-color: #bf3d4acf;color: white;	}
	.seemore-btn:hover{	color: white;}
	.top-section{padding-top: 1rem;	padding-left: 35px;	padding-right: 25px;padding-bottom: 25px;}
	.offer-disc h6{	height: 45px !important;}
	.off{position: absolute;top:14px;right: 19px; background-color: #dc2727; color: white;padding-left: 8px;padding-right: 8px; padding-top: 2px; padding-bottom: 2px; font-size: 14px;	}
	.offA{position: absolute; top: 35px; right: 20px; background-color: #dc2727; color: white; padding-left: 8px; padding-right: 8px;
			 padding-top: 2px; padding-bottom: 2px; font-size: 14px;}
	@media (max-width: 575px) {	.brop-back{	display: none;	}.top-section{	padding-top: 3rem;padding-left: 20px;padding-right:20px;} }
</style>

@endsection

@section ('content')


<header>
	<div class="container-fluid top-section">
		<div class="row">
			
			@include( 'pages.partials.front-sidebar' )

			<div class="col-sm-12 col-md-9 col-lg-9">
				<div class="best-selling">
					<h5>FEATURED</h5>
					<div class="row">
					@foreach ($featured_products as $p)
						<div class="col-12 col-sm-6 col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0s">
							<div class="best-cover">
								<div class="best-img">
									<a href="{{ route('view.product', [$p->slug]) }}">
										<img  src="{{asset('uploads/products/thumbnails/'.$p->featuredImage)}}">
									</a>
									@if($p->discountPercent)
									<span class="off">
										{{ $p->discountPercent }}
									</span>
									@endif
								</div>
								<div class="best-info">
									<a href="{{ route('view.product', [$p->slug]) }}"><h6>{{$p->productName}}</h6></a>
									<p>NRS - {{$p->rate}}/-</p>
								</div>
									<div class="best-but">

										<a role="button" href="{{ route('view.product', [$p->slug]) }}" ><i class="fas fa-eye"></i> VIEW</a>
										<a href="" class="order-btn" data-product-id="{{$p->id}}" data-user-id="{{$p->user->id}}" data-product-slug="{{$p->slug}}">Direct Order</a>
									</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="row">
						<div class="col-md-12 text-center pt-4">
							<a href="{{ route('featured.products') }}" class="seemore-btn">See More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<offer>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 ">
				<div class="banner-img">
					<img src="{{ asset('image/banner.jpg') }}">
				</div>
			</div>
		</div>
	</div>
	</offer>
	<offer id="name">
	<div class="container  mt-5">
		<div class="row">
			<div class="col-12 col-lg-12 back-offer ">
				<div class="row">
					@foreach($products->take(4)->get() as $product)
						<div class=" col-12 col-sm-6 col-md-4 col-lg-3">
							<div class="offer-img">
								<div class="img-height">
									<a href="{{ route('view.product', [$product->slug]) }}"><img class="offer-img-size" src="{{asset('uploads/products/thumbnails/'.$product->featuredImage)}}"></a>
									@if($product->discountPercent)
									<span class="offA">
										{{ $product->discountPercent }} Off
									</span>
									@endif
								</div>
								<div class="offer-disc">
									<h6><a href="{{ route('view.product', [$product->slug]) }}">{{$product->productName}}</a></h6>
									<p>NRS - {{$product->rate}}/-</p>
								</div>
								<div class="order-but">
									<a role="button" href="{{ route('view.product', [$product->slug]) }}" ><i class="fas fa-eye"></i> VIEW</a>
										<a href="" class="order-btn" data-product-id="{{$product->id}}" data-user-id="{{$product->user->id}}" data-product-slug="{{$product->slug}}">Direct Order</a>
								</div>
							</div>
						</div>
					@endforeach
					<div class="col-lg-12">
							<div class="banner-img">
								<img src="./image/banner.jpg">
							</div>
					</div>
					@foreach($products->skip(4)->take(4)->get() as $product )
						<div class=" col-12 col-sm-6 col-md-4 col-lg-3">
								<div class="offer-img">
									<div class="img-height">
										<a href="{{ route('view.product', [$product->slug]) }}"><img class="offer-img-size" src="{{asset('uploads/products/thumbnails/'.$product->image)}}"></a>
										@if($product->discount)
										<span class="offA">
											{{ $product->discount }} Off
										</span>
										@endif
									</div>
									<div class="offer-disc">
										<h6><a href="{{ route('view.product', [$product->slug]) }}">{{$product->title}}</a></h6>
										<p>NRS - {{$product->price}}/-</p>
									</div>
									<div class="order-but">
										<a role="button" href="{{ route('view.product', [$p->slug]) }}" ><i class="fas fa-eye"></i> VIEW</a>
											<a href="" class="order-btn" data-product-id="{{$product->id}}" data-user-id="{{$product->user->id}}" data-product-slug="{{$product->slug}}">Direct Order</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="col-lg-12">
							<div class="banner-img">
								<img src="./image/banner.jpg">
							</div>
						</div>
						@foreach($products->skip(8)->take(8)->get() as $product)
						<div class=" col-12 col-sm-6 col-md-4 col-lg-3">
							<div class="offer-img">
								<div class="img-height">
									<a href="{{ route('view.product', [$product->slug]) }}"><img class="offer-img-size" src="{{asset('uploads/products/thumbnails/'.$product->image)}}"></a>
									@if($product->discount)
									<span class="offA">
										{{ $product->discount }} Off
									</span>
									@endif
								</div>
								<div class="offer-disc">
									<h6><a href="{{ route('view.product', [$product->slug]) }}">{{$product->title}}</a></h6>
									<p>NRS - {{$product->price}}/-</p>
								</div>
								<div class="order-but">
									<a role="button" href="{{ route('view.product', [$product->slug]) }}" ><i class="fas fa-eye"></i> VIEW</a>
										<a href="" class="order-btn" data-product-id="{{$product->id}}" data-user-id="{{$product->user->id}}" data-product-slug="{{$product->slug}}">Direct Order</a>
								</div>
							</div>
						</div>
					@endforeach
					<div class="col-md-12 text-center pt-4 pb-4">
						<a href="{{ route('more.products') }}" class="seemore-btn">See More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</offer>
@endsection
