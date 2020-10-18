<!-- Start Shop Home List  -->
	<section class="shop-home-list section" style="background: #f2f2f2;">
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

											@if($product->actualRate - $product->rate > 0)
												<del class="del-price">NRs. {{ $product->actualRate }}</del>
											@else
											@endif
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
									@if($product->actualRate - $product->rate > 0)
										<del class="del-price">NRs. {{ $product->rate }}</del>
									@endif
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