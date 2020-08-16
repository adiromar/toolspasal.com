@extends('layouts.main')

@section('metas')
	<title> SASTOSHOWROOM | Online Shopping in Nepal: Buy Clothes, Electronics & Mobiles </title>
	<meta name="description" content="sastoshowroom.com : Buy Clothing, Electronics, Mobiles &amp; much more at best prices Online all across Nepal." />
	<meta name="keywords" content="Sasto,Showroom,Phones and Tablets,Men's Accessories,Food,Beverage,Sports,Women's Accessories,Mobile Accessories,Laptop,Cosmetics,Clothes,Baby,Home,Appliances,Electronic,Goods,Others">
	<meta property="og:title" content="SASTOSHOWROOM | Online Shopping in Nepal: Buy Clothes, Electronics & Mobiles" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://www.sastoshowroom.com/" />
	<meta property="og:image" content="https://sastoshowroom.com/uploads/suppliers/153424062737489.jpg" />
	<meta property="og:site_name" content="Sastoshowroom" />
	<meta property="og:image:width" content="1000" />
	<meta property="og:image:height" content="1000" />
@endsection

@section('styles')

<style>
	.cat-bar{
		padding-top: 12px !important;color: black;
	}
	.cat-bar li{
	border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-left: 0px;
    border-right: 0px;
	}
	.cat-bar a{
		color: grey;
		font-size: 17px;

	}

	.cata-back{
		display: none;
	}
	@media (max-width: 575px) {
		.brop-back{
			display: none;
		}
	}
</style>

@endsection

@section ('content')


<header>
	<div class="container-fluid p-5">
		<div class="row">
			<div class="col-sm-12 col-md-3 col-lg-3 product-sidebar">
				<div class="list-bar wow fadeIn"
					data-wow-duration="2s" data-wow-delay="0s">
					<i class="fas fa-bars"></i>
					Products
				</div>
				<div class="list-product wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s">
					<ul class="list-group cat-bar">
						<li class="list-group-item"><div><a href="{{ url('/') }}"><b>All Categories</b> ({{ count(App\Product::all()) }})</a></div><i class="fas fa-caret-right"></i></li>
						@foreach ($categories as $cat)
							<li class="list-group-item"><div><a href="{{ route('category.product', $cat->id) }}">{{ $cat->name }} ({{ count($cat->products()->get()) }})</a></div><i class="fas fa-caret-right"></i></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-sm-12 col-md-9 col-lg-9">
				<div class="best-selling">
					<h5>FEATURED</h5>
					<div class="row">
					@foreach (App\Product::where('featured', 1)->orderBy('updated_at','desc')->take(6)->get() as $p)
						<div class="col-12 col-sm-6 col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0s">
							<div class="best-cover">
								<div class="best-img">
									<a href="{{ route('view.product', $p->id) }}"><img  src="{{asset('uploads/products/thumbnails/'.$p->image)}}"></a>
								</div>
								<div class="best-info">
									<a href="{{ route('view.product', $p->id) }}"><h6>{{$p->title}}</h6></a>
									<p>NRS - {{$p->price}}/-</p>
								</div>
									<div class="best-but">
										<a role="button" href="{{ route('view.product', $p->id) }}" ><i class="fas fa-eye"></i> VIEW</a>
										<a href="" class="order-btn" data-product-id="{{$p->id}}" data-user-id="{{$p->user->id}}">Direct Order</a>
									</div>
							</div>
						</div>
						@endforeach
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
					@foreach($products->chunk(4) as $chunk)
						@foreach ($chunk as $product)
						<div class=" col-12 col-sm-6 col-md-4 col-lg-3">
							<div class="offer-img">
								<div class="img-height">
									<a href="{{ route('view.product', [$product->id]) }}"><img class="offer-img-size" src="{{asset('uploads/products/thumbnails/'.$product->image)}}"></a>
								</div>
								<div class="offer-disc">
									<h6><a href="">{{$product->title}}</a></h6>
									<p>NRS - {{$product->price}}/-</p>
								</div>
								<div class="order-but">
									<a role="button" href="{{ route('view.product', $product->id) }}" ><i class="fas fa-eye"></i> VIEW</a>
										<a href="" class="order-btn" data-product-id="{{$product->id}}" data-user-id="{{$product->user->id}}">Direct Order</a>
								</div>
							</div>
						</div>
						@endforeach
						<div class="col-lg-12">
							<div class="banner-img">
								<img src="./image/banner.jpg">
							</div>
						</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>
	</offer>
@endsection
