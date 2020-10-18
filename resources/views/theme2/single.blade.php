@extends('theme2.layouts.main')

@section('menu')

	@include('theme2.layouts.head')

@endsection

@section('head')

<style>
	input{
		width: 100%;
    	padding: 5px;
	}
</style>

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
						<li><a href="{{ route('category.product.new2', $category->slug) }}">{{ $category->name }}<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="">{{ $product->productName }}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<div class="shopping-cart section">
<div class="container">
<div class="row">
<div class="col-12">

	<div class="modal-body">
        <div class="row no-gutters">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <!-- Product Slider -->
					<div class="product-gallery">
						<?php $class = 'quickview-slider'; ?>
						@if( $product->images()->count() > 0 )
						<?php $class = 'quickview-slider-active'; ?>
						@endif
						<div class="{{ $class }}">
							
							<div class="single-slider">
								<img src="{{  asset('uploads/products/'.$product->featuredImage) }}" alt="#">
							</div>
							@if( $product->images()->count() > 0 )

							@foreach( $product->images as $img )
								<div class="single-slider">
									<img src="{{  asset('uploads/products/'.$img->image) }}" alt="#">
								</div>
							@endforeach

							@endif
							
						</div>
					</div>
				<!-- End Product slider -->
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="quickview-content">
                    <h2>{{ $product->productName }}</h2>
                    <div class="quickview-ratting-review">
                        <div class="quickview-ratting-wrap">
                            <div class="quickview-ratting">
                            	@if( $averageRating > 0 )
	                                <i class="{{ $averageRating >= 1 ? 'yellow' : '' }} fa fa-star"></i>
	                                <i class="{{ $averageRating >= 2 ? 'yellow' : '' }} fa fa-star"></i>
	                                <i class="{{ $averageRating >= 3 ? 'yellow' : '' }} fa fa-star"></i>
	                                <i class="{{ $averageRating >= 4 ? 'yellow' : '' }} fa fa-star"></i>
	                                <i class="{{ $averageRating >= 5 ? 'yellow' : '' }} fa fa-star"></i>
                                @endif
                            </div>
                            <div class="product_reviews_link"><a href="#ratehere">{{ $product->nosReview }} Review(s)</a></div>
                        </div>
                        <div class="quickview-stock">
                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                        </div>
                    </div>
                    <h3>NRs. {{ $product->rate }}</h3>
                    <div class="quickview-peragraph">
                        <p>{{ $product->shortDesc }}</p>
                    </div>
					<div class="size">
						<div class="row">
							<div class="col-12">
								<h5 class="title">Additional Detail</h5>
								<p>{!! $product->description !!}</p>
							</div>
						</div>
					</div>
					<div>
						<a href="#" class="btn add-to-cart" data-productid="{{ $product->id }}" data-product="{{ $product->productName }}" data-rate="{{ $product->rate }}">Add to cart</a>
						<a href="#" class="btn min add-to-wishlist" data-product="{{ $product->id }}"><i class="ti-heart"></i></a>
					</div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div id="ratehere"></div>
		</div>
	</div>
</div>

@auth
<div class="reviews section">
	<div class="container">
		<div class="row">
			<div class="col col-lg-6 offset-lg-3 pb-3 pt-1">
				
				<h3 class="mb-3" id="ratehere">Add a Review:</h3>
				@include('errors.errors')
				<form action="{{ route('product.review') }}" method="post">
					{{csrf_field()}}
					
					<div class="form-group">
						<input type="text" name="reviewTitle" class="form-input" placeholder="Review Title (required)" value="{{ old('reviewTitle') }}">
					</div>

					<div class="form-group" id="rating" style="display: inline-flex;">
						<small>Rate this product&nbsp;&nbsp;</small>
					</div>

					<textarea name="reviewDesc" rows="6" class="form-textarea" placeholder="Review Here...">{{old("reviewDesc")}}</textarea>
					<input type="hidden" name="user_id" value="{{ Auth::id() }}">
					<input type="hidden" name="product_id" value="{{ $product->id }}">
					<input type="hidden" name="email" value="{{ Auth::user()->email }}">
					<div class="form-group">
						<input type="submit" name="submit" value="Submit" class="btn btn-submit btn-block">
					</div>

				</form>
				

			</div>
		</div>
	</div>
</div>
@endauth
					

@endsection

@section('footer')
<script src="{{ asset('js/jquery.emojiRatings.min.js') }}"></script>
<script defer src="{{ asset('js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
<script type="text/javascript">
	function change_image(x){
		var nn =x.src ;
		document.getElementById("myImg").src = nn;
		document.getElementById("demo").src = nn;
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#zoom_10").elevateZoom({
			easing : true,
			zoomWindowWidth:350,
            zoomWindowHeight:350,
            zoomWindowPosition: 1, zoomWindowOffetx: 250
		});
	});
	$("#rating").emojiRating({
				fontSize: 20,
				onUpdate: function(count) {
					$(".review-text").show();
					$("#starCount").html(count + " Star");
					var rating = $('.emoji-rating').val();
					$('#rating-input').val(rating);
				}
			});


			$('#order-submit').click(function(e){
				$(this).prop('disabled', true);
				$('#oform').submit();
			});
</script>
@endsection