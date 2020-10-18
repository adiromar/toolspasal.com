
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


@section('all')
<!-- Start Small Banner  -->
<style>
    .feat-nav{
        display: contents;
        flex-wrap: wrap;
        list-style: none;
        justify-content: center;
        max-width: 1220px;
        margin: auto;
    }
    .feat-nav a{
        font-size: 14px;
        font-weight: 600;
        color: #231f20;
        -webkit-transition: all 0.33s;
        -moz-transition: all 0.33s;
        transition: all 0.33s;
        border: 1px solid #ddd;
        margin: 0 -1px -1px 0;
        background: #fff;
        display: flex;
        align-items: center;
        padding: 15px 15px 20px 15px;
        width: 16.75%;
        justify-content: center;
        flex-direction: column;
    }
    .feat-nav .image-tab{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .feat-nav a span{
        margin-left: 10px;
        text-align: center;
    }
    .feat-nav a:hover{
        color: orange;
    }
</style>

<section class="small-banner section" style="background: #f2f2f2;">
    <div class="container p-4">
        <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Categories</h2>
                    </div>
                </div>
            </div>
        <div class="row">
            <!-- Single Banner  -->
            <div class="feat-nav">
        @foreach( App\Category::where('featured', 1)->inRandomOrder()->get()->take(12) as $category)
            <a href="{{ route('category.product.new2', $category->slug) }}">
                <div class="image-tab">
                    <img src="{{ asset( $category->image ) }}" style="" alt="#">
                    
                </div>
                <span>{{ $category->name }}</span>
            </a>
            
        @endforeach
                </div>
        </div>


        {{-- Brands section  --}}
        <div class="row mt-5">
            <div class="col-12">
                <div class="section-title">
                    <h2>Shop By Brands</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Banner  -->
            <div class="feat-nav">
        @foreach( App\Brand::where('status', 1)->inRandomOrder()->get()->take(12) as $brand)
            <a href="{{ route('products.brands', $brand->brandId) }}">
                <div class="image-tab">
                    <img src="{{ asset( $brand->image ) }}" style="" alt="#">
                    
                </div>
                <span>{{ $brand->brandName }}</span>
            </a>
            
        @endforeach
                </div>
        </div>


    </div>
</section>
<!-- End Small Banner -->

@endsection



@section('popularsection')

	<!-- Start Most Popular -->
	<div class="product-area most-popular section" style="background: #f2f2f2;">
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
						<div class="single-product" style="background: #fff;padding: 10px;">
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
									{{-- NRs. <span class="old">{{ $product->discountPercent > 0 ? $product->actualRate : '' }}</span> --}}
									<span>{{ $product->rate }}</span>
									@if($product->actualRate - $product->rate > 0)
										<del>{{ $product->actualRate }}</del>
									@else

									@endif
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


@section('productssection')
	<!-- Start Most Popular -->


<div class="product-area most-popular pt-2" style="background: #f2f2f2">
    <div class="container">

        @if( $tags = App\Product::recentProductsTags() )
        @foreach ( $tags as $tag )
        <div class="row pt-5">
            <div class="col-12">
                <div class="section-title">
                    
                        <h2 class="">{{ $tag->name }}</h2>
                    
                </div>
            </div>
		</div>
		

        {{-- @if( $featuredProducts = App\Product::where('featured', 1)->latest()->get()->take(12) ) --}}
        <div class="row pb-5">
            <div class="col-12">
                <div class="owl-carousel popular-slider">

					<div class="single-product" style="background: #fff;padding: 12px;min-height: 275px;">
                        <div class="product-img">
							<a class="show-modal-tag supplier-btn" data-tagid="{{ $tag->id }}" data-tagname="{{ $tag->name }}">+ Add Product</a>
						</div>
					</div>
                <?php $products = App\Tags::find($tag->id)->products()->inRandomOrder()->get()->take(8); ?>
                @foreach( $products as $product )
                    <!-- Start Single Product -->
                    <div class="single-product" style="background: #fff;padding: 12px;">
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
									<a title="Quick View" href=""><i class=" ti-eye"></i>
									<form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
										var r=confirm('Are you sure you want to delete this item?');
										if(r== true){ this.submit(); }" method="post">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<i class="fa fa-trash"><input type="hidden" class="delete-btn"></i>
									</form>
								</a>

                                    {{-- <a class="add-to-wishlist" data-product="{{ $product->id }}" title="Wishlist" href=""><i class="ti-heart"></i><span>Add to Wishlist</span></a> --}}
                                </div>
                                <div class="product-action-2">
                                    <a class="" title="Edit Product" href="{{ route('products.edit', $product->id) }}">Edit This Product</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('view.product.new2', $product->slug) }}">{{ $product->productName }}</a></h3>
                            <div class="product-price">
                                 {{-- <span class="old">NRs.{{ $product->discountPercent > 0 ? $product->actualRate : '' }}</span> --}}
								<span>NRs.{{ $product->rate }}</span>
								@if($product->actualRate - $product->rate > 0)
										<del>{{ $product->actualRate }}</del>
									@else

									@endif
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                @endforeach
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
<!-- End Most Popular Area -->

@endsection


@section('threecolumns')

	<!-- Start Shop Home List  -->
	<section class="shop-home-list pt-4" style="background: #f2f2f2;">
		<div class="container">
			<div class="row">
			@if( $products = App\Product::productSales(6) )
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
											
											<a title="Delete Product" style="color: red;float: right;">
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
			@if( $topsellers = App\Product::productMostBought(3) )
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
									
									<a title="Delete Product" style="color: red;float: right;">
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