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
              @if($tags)
              @foreach( $tags as $tag )
                <!-- Start Single Tab -->
                <div class="tab-pane fade {{$class}}" id="toggle-{{ $tag->id }}" role="tabpanel">
                  <div class="tab-single">
                    <div class="row">


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
              @endif
              </div>
            </div>
          </div>
        </div>

        <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                    @foreach( $featured_products as $product )
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
									 <span class="old">NRs.{{ $product->discountPercent > 0 ? $product->actualRate : '' }}</span>
									<span>NRs.{{ $product->rate }}</span>
								</div>
							</div>
						</div>
						<!-- End Single Product -->
					@endforeach
                    </div>
                </div>
            </div>
            </div>
    </div>
  <!-- End Product Area -->