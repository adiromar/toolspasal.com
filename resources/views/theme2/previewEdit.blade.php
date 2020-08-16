
<div class="alert alert-primary alert-dismissible fade show" role="alert" style="text-align: center">
	<strong>Preview Edit Section </strong> Only Authorized Users can View/Edit this section.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
@extends('theme2.layouts.main')

@section('menu')

@include('theme2.layouts.head')

@endsection

@section('sliders')

<section class="hero-slider">
	<?php $slider = App\Sliders::where('showSlider', 1)->get()->take(1); ?>
	<!-- Single Slider -->
	@foreach($slider as $slide)
	<div class="single-slider" style="background-image:url({{ '../uploads/sliders/' . $slide->sliderImage }})">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-9 offset-lg-3 col-12">
					<div class="text-inner">
						<div class="row">
							<div class="col-lg-7 col-12">
								<div class="hero-text">
									<h1>{!! $slide->textMain !!}</h1>
									<p>{!! $slide->textSecondary !!}</p>
									<div class="button">
										<a href="{{ route('sliders.edit', $slide->sliderId) }}" target="_blank" class="btn"><i class="fa fa-pencil"></i> Edit</a>
										<a href="#" class="btn show-slider ml-3"><i class="fa fa-plus"></i> Add New Slider</a>
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	<!--/ End Single Slider -->
</section>
<!--/ End Slider Area -->

@endsection

@section('categorysection')

	@include('theme2.layouts.categorysection')

@endsection

@section('productssection')

	<!-- Start Product Area -->
    <div class="product-area section">
		<div class="container">
	<div class="row">
	  <div class="col-12">
		<div class="section-title">
		  <h2>Promotional</h2>
		</div>
	  </div>
	</div>
	<div class="row">
	  <div class="col-12">
		<div class="product-info">
		  <div class="nav-main">
			<!-- Tab Nav -->
			@if( $tags = App\Product::recentProductsTags() )
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			<?php $active = 'active'; ?>
			@foreach ( $tags as $tag )
			  <li class="nav-item"><a class="nav-link {{ $active }}" data-toggle="tab" href="#toggle-{{ $tag->id }}" role="tab">{{ $tag->name }}</a></li>
			  <?php $active = ''; ?>
			@endforeach
			</ul>
			@endif
			<!--/ End Tab Nav -->
		  </div>
		  <div class="tab-content" id="myTabContent">
		  <?php $class = 'show active'; ?>
		  @foreach( $tags as $tag )
			<!-- Start Single Tab -->
			<div class="tab-pane fade {{$class}}" id="toggle-{{ $tag->id }}" role="tabpanel">
			  <div class="tab-single">
				<div class="row">

				  @auth
				  @if(Auth::user()->roles()->first()->role == 'Supplier') 
						@if($previewEdit == 1)
				  <div class="col-xl-3 col-lg-4" style="border: 1px solid lightgrey;">
					<div class="supplier-add-box">
					<a class="show-modal-tag supplier-btn" data-tagid="{{ $tag->id }}" data-tagname="{{ $tag->name }}">+ Add Product</a>
					</div>
				  </div>    
					@endif
				  @endif
				  @endauth
				  
				<?php $products = App\Tags::find($tag->id)->products()->inRandomOrder()->get()->take(8); ?>
				@foreach( $products as $product )
				  <div class="col-xl-3 col-lg-4 col-md-4 col-12">
					<div class="single-product">
					  <div class="product-img">
						<a href="{{ route('view.product.new2', $product->slug) }}">
						  <img class="default-img" src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage) }}" alt="#">
						  <img class="hover-img" src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage) }}" alt="#">
						@if( $product->discountPercent )
						  <span class="price-dec">{{ $product->discountPercent }}% Off</span>
						@endif
						</a>
						<div class="button-head">
						  <div class="product-action">
							<a title="Quick View">
								<form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
								var r=confirm('Are you sure you want to delete this item?');
								if(r== true){ this.submit(); }" method="post">
							{{ csrf_field() }}
							{{ method_field('delete') }}
							<i class="fa fa-trash"><input type="hidden" class="delete-btn"></i>
							</form>
						</a>
					 </div>
						  <div class="product-action-2">
							<a class="" title="Edit Product" href="{{ route('products.edit', $product->id) }}">Edit This Product</a>
						  </div>
						</div>
					  </div>
					  <div class="product-content">
						<h3><a href="{{ route('view.product.new2', $product->slug) }}">{{ $product->productName }}</a></h3>
						<div class="product-price">
						  <span>NRs. {{ $product->rate }}</span>
						</div>
					  </div>
					</div>
				  </div>
				@endforeach
				</div>
			  </div>
			</div>
			<!--/ End Single Tab -->
			<?php $class = ''; ?>
		  @endforeach
		  </div>
		</div>
	  </div>
	</div>
		</div>
</div>
<!-- End Product Area -->

@endsection

@section('popularsection')

	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						 <h2 class="">Featured Products<a class="show-modal supplier-btn pull-right">+ Add Product</a></h2>
					</div>
				</div>
            </div>
            {{-- @if( $featuredProducts = App\Product::where('featured', 1)->latest()->get()->take(12) ) --}}
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                    @foreach( $featured_products as $product )
						<!-- Start Single Product -->
						<div class="single-product">
							<div class="product-img">
								<a href="{{ route('view.product.new2', $product->slug) }}">
									<img class="default-img" src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="#">
									<img class="hover-img" src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="#">
									@if( $product->discountPercent > 0 )
									<span class="out-of-stock">{{ $product->discountPercent }}% Off</span>
									@endif
								</a>
								<div class="button-head">
									<div class="product-action">
										<a title="Quick View">
											<form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
											var r=confirm('Are you sure you want to delete this item?');
											if(r== true){ this.submit(); }" method="post">
										{{ csrf_field() }}
										{{ method_field('delete') }}
										<i class="fa fa-trash"><input type="hidden" class="delete-btn"></i>
										</form>
									</a>
										
									</div>
									<div class="product-action-2">
										<a class="" title="Edit Product" href="{{ route('products.edit', $product->id) }}">Edit This Product</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="{{ route('view.product.new2', $product->slug) }}">{{ $product->productName }}</a></h3>
								<div class="product-price">
									NRs. <span class="old">{{ $product->discountPercent > 0 ? $product->actualRate : '' }}</span>
									<span>{{ $product->rate }}</span>
								</div>
							</div>
						</div>
						<!-- End Single Product -->
					@endforeach
                    </div>
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </div>
	<!-- End Most Popular Area -->

@endsection

@section('threecolumns')

	<!-- Start Shop Home List  -->
	<section class="shop-home-list section">
		<div class="container">
			<div class="row">
			@if( $products = App\Product::productSales_new(6, 2) )
				<div class="col-lg-8 col-md-8 col-12">
					<div class="row">
						<div class="col-12">
							<div class="shop-section-title">
								<h1>On sale</h1>
							</div>
						</div>
					</div>
					<div class="row">
					@foreach ( $products as $product )
						<div class="col-lg-6 col-md-6 col-12">
							<!-- Start Single List  -->
							<div class="single-list">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-6">
										<div class="list-image overlay">
											<img src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage) }}" alt="#">
											<a class="buy add-to-cart" title="Add to cart" href="" data-productid="{{$product->id}}" data-product="{{ $product->productName }}" data-rate="{{ $product->rate }}"><i class="fa fa-shopping-bag"></i></a>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-6 no-padding">
										<div class="content">
											<h4 class="title"><a href="{{ route('view.product.new2', $product->slug) }}">{{ $product->productName }}</a></h4>
											<p class="price with-discount">NRs. {{ $product->rate }}</p>
											<a class="price" title="Edit Product" href="{{ route('products.edit', $product->id) }}">Edit Product</a>
											
											<a title="Quick View">
												<form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
												var r=confirm('Are you sure you want to delete this item?');
												if(r== true){ this.submit(); }" method="post">
											{{ csrf_field() }}
											{{ method_field('delete') }}
											<i class="fa fa-trash"><input type="hidden" class="delete-btn"></i>
											</form></a>
										</div>
									</div>
								</div>
							</div>
							<!-- End Single List  -->
						</div>
					@endforeach
					</div>
				</div>
			@endif
			@if( $topsellers = App\Product::productMostBought_new(3, 2) )
				<div class="col-lg-4 col-md-6 col-12">
					<div class="row">
						<div class="col-12">
							<div class="shop-section-title">
								<h1>Best Seller</h1>
							</div>
						</div>
					</div>
					<!-- Start Single List  -->
				@foreach ($topsellers as $product)
					<div class="single-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="list-image overlay">
									<img src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage) }}" alt="#">
									<a class="buy add-to-cart" title="Add to cart" href="" data-productid="{{$product->id}}" data-product="{{ $product->productName }}" data-rate="{{ $product->rate }}"><i class="fa fa-shopping-bag"></i></a>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12 no-padding">
								<div class="content">
									<h5 class="title"><a href="{{ route('view.product.new2', $product->slug) }}">{{ $product->productName }}</a></h5>
									<p class="price with-discount">NRs. {{ $product->rate }}</p>
									<a class="price" title="Edit Product" href="{{ route('products.edit', $product->id) }}">Edit Product</a>
									
									<a title="Quick View">
										<form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
										var r=confirm('Are you sure you want to delete this item?');
										if(r== true){ this.submit(); }" method="post">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<i class="fa fa-trash"><input type="hidden" class="delete-btn"></i>
									</form></a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
					<!-- End Single List  -->
				</div>
			@endif
			</div>
		</div>
	</section>
	<!-- End Shop Home List  -->

@endsection

@section('services')

	@include('theme2.layouts.services')

@endsection

@section('modals')

	@include('theme2.layouts.insert_modals')

@endsection