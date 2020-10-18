@extends('theme2.layouts.main')

@section('menu')

@include('theme2.layouts.headmenu')

@endsection

@section('content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="">{{ $title }}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
							<!-- Single Widget -->
							<div class="single-widget category">
								<h3 class="title">Categories</h3>
								<ul class="categor-list">
								@foreach( App\Category::orderBy('name')->get() as $category )
									<li><a href="{{ route('category.product.new2', $category->slug) }}">{{ $category->name }}</a></li>
								@endforeach
								</ul>
							</div>
							<!--/ End Single Widget -->
						</div>

						<div class="shop-sidebar pt-4">
							<!-- Single Widget -->
							<div class="single-widget category">
								<h3 class="title">Brands</h3>
								<ul class="categor-list">
								@foreach( App\Brand::latest()->get() as $brand )
									<li><a href="{{ route('products.brands', $brand->brandId) }}">{{ $brand->brandName }}</a></li>
								@endforeach
								</ul>
							</div>
							<!--/ End Single Widget -->
						</div>


					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Show :</label>
											<select>
												<option selected="selected">All</option>
											</select>
										</div>
										<div class="single-shorter">
											<label>Sort By :</label>
											<select class="sort-product" name="sort">
												<option value="name">Name</option>
												<option value="low_high" {{ request()->sort == 'low_high' ? 'selected' : '' }}>Price: Low to High</option>
												<option value="high_low" {{ request()->sort == 'high_low' ? 'selected' : '' }}>Price: High to Low</option>
											</select>
										</div>
									</div>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
							@if( count($products) )
							@foreach ( $products as $product )
							<div class="col-lg-4 col-md-6 col-12">
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
												<a title="Quick View" href="{{ route('view.product.new2', $product->slug) }}"><i class=" ti-eye"></i><span>Quick Shop</span></a>
												<a class="add-to-wishlist" data-product="{{ $product->id }}" title="Wishlist" href=""><i class="ti-heart"></i><span>Add to Wishlist</span></a>
											</div>
											<div class="product-action-2">
												<a class="add-to-cart" title="Add to cart" href="" data-productid="{{$product->id}}" data-product="{{ $product->productName }}" data-rate="{{ $product->rate }}">Add to cart</a>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h3><a href="{{ route('view.product.new2', $product->slug) }}">{{ $product->productName }}</a></h3>
										<div class="product-price">
											<span>NRs. {{ $product->rate }}</span>
											@if($product->actualRate - $product->rate > 0)
												<del>{{ $product->actualRate}}</del>
											@endif
										</div>
									</div>
								</div>
							</div>
							@endforeach
							@else
							<div class="col-md-12 p-3">
								<h4>There are no items for this category.</h4>
							</div>
							@endif
						</div>

						<div class="row">
							<div class="col-md-12">
								{{ $products->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	

@endsection