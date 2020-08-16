<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						
                            <h2 class="">Featured Products</h2>
                        
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