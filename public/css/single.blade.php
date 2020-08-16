@extends ('layouts.main')

@section ('metas')
<title>{{ $product->title }} | Sastoshowroom.com</title>
<meta name="description" content="{{$product->detail}}">
<meta name="keywords" content="{{$product->keywords}}">
<meta name="author" content="Sastoshowroom.com">
<meta property="og:description" content="{{$product->detail}}">
<meta property="og:title" content="{{ $product->title }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{url('product' . $product->id)}}">
<meta property="og:image" content="{{asset('uploads/products/'.$product->image)}}">
<meta property="og:image:width" content="500" />
<meta property="og:image:height" content="500" />
<meta property="og:image:alt" content="{{ $product->title }}" />

@endsection

@section ('styles')
<style>
.review-btn{
	border: 1px solid grey;
background-color: #4267b2;
padding: 5px 10px;
	font-size: 14px;
cursor: pointer;
}
.review-btn a{
	color: white;
}
.review-section{
	border: 1px solid lightgrey;
	padding: 20px 40px;
}
.img-height-related{
	height: 200px;
}
.img-height-related img{
	object-fit: cover;
}
.jqEmoji-container{
	display: inline-flex;
	padding-left: 10px
}
.color-orange{
	color: orange;
}
.order{
	border: 1px solid lightgrey;margin-top:50px;padding:10px 10px;
}
.order .order-now{
	font-size:18px;font-weight:700;font-family:Roboto;
}
.discount{
	color: sienna;
    font-weight: bold;text-shadow: 0 0 3px #FF0000;    margin-left: 10px !important;
}
.supplier{
	margin-top: 60px;
	border:1px solid lightgrey;
	padding: 20px;
}
.big-img img:hover{
transform: none;
}
</style>
@endsection

@section ('content')
<?php session()->forget('product_id');
 ?>
<div class="container-fluid">
	<div class="row">

		<div class="col-xs-12 col-md-4">
			<div class="big-img  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
				<!-- <img id="myImg" src="{{  asset('uploads/products/'.$product->image) }}"> -->
				<img id="zoom_10" src="{{  asset('uploads/products/thumbnails/'.$product->image) }}" data-zoom-image="{{  asset('uploads/products/'.$product->image) }}"/>
			</div>
			<div class="row">
				<div class="col-lg-12  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
					<div class="small-img">
						<img  onclick="change_image(this)" src="{{  asset('uploads/products/thumbnails/'.$product->image) }}">
						<p id="demo"></p>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
					<div class="big-detail  wow fadeInRight" data-wow-duration="2s" data-wow-delay="0s">
						<p class="money">{{ $product->title }}</p>
						
						<p>
							<i class="fa fa-star {{ $averageRating >= 1 ? 'color-orange' : '' }}" aria-hidden="true"></i>
							<i class="fa fa-star {{ $averageRating >= 2 ? 'color-orange' : '' }}" aria-hidden="true"></i>
							<i class="fa fa-star {{ $averageRating >= 3 ? 'color-orange' : '' }}" aria-hidden="true"></i>
							<i class="fa fa-star {{ $averageRating >= 4 ? 'color-orange' : '' }}" aria-hidden="true"></i>
							<i class="fa fa-star {{ $averageRating >= 5 ? 'color-orange' : '' }}" aria-hidden="true"></i>
						</p>

						@if($product->detail)
							<p><strong>Detail:</strong></p>
							<p><span>{{ $product->detail }}</span></p>
						@endif
						@if($product->discount)
							<p class="discount">{{ $product->discount }} Off</p>
						@endif
						<div class="row">

							<div class="col-md-12">
								<p>
									<span class="float-left" style="font-weight:500;font-size:25px">NRs.</span>
									@if($product->old_price)
									<span class="float-left" style="text-decoration: line-through;font-weight:500;font-size:25px">{{ $product->old_price.' ' }}</span>
									@endif
									<span class="float-left" style="font-weight:500;font-size:25px">{{$product->price}}</span>
								</p>
							</div>
						</div>

					</div>

					<div class="cart  wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s">
						<!-- <button><i class="fas fa-shopping-cart"></i>ADD TO CART</button> -->
						<form action="{{ route('cart.store') }}" method="post">
							{{csrf_field()}}
							<input type="hidden" name="id" value="{{ $product->id }}">
							<input type="hidden" name="name" value="{{ $product->title }}">
							<input type="hidden" name="price" value="{{ $product->price }}">
							<button type="submit"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="supplier">
								<p><strong>Supplier:</strong></p>
								@if($product->user->profile)
								<p>
									<a href="{{ route('view.supplier', [$product->user->id, $product->user->name]) }}" target="_blank">

									<span>{{ $product->user->profile->detail ? $product->user->profile->detail : '$product->user->name' }}</span></a>
								</p>
								@endif
								@if($product->delivery_charge)
								<p><strong>Delivery Charge:</strong></p>
								@endif
								<p>
									@if($product->delivery_charge == 'Charge')
										{{$product->charge}}
									@else
										{{$product->delivery_charge}}
									@endif
								</p>
							</div>
						</div>
					</div>
					<div class="order">
						@guest
							<p class="order-now">कृपया <b>डिरेक्ट अर्डर</b> को लागि फेसबुक लगइन गर्नुहोस्</p>
							<div class="text-center pt-4">
							<button class="review-btn"><a href="{{ route('facebook.login') }}">Login with FACEBOOK</a></button>
							</div>

						@else
						<div style="padding-left:15px;padding-top: 15px">
							<form class="form" action="{{route('order.store')}}" method="post">
								{{csrf_field()}}
								<label for="" style="line-height: 30px"><b>{{Auth::user()->name}} जी,
								  &nbsp;अर्डर को लागि कृपया सम्पर्क फोन नम्बर र  डेलिवरी स्थान भर्नुहोस् ।</b></label><br>
								  <input type="hidden" name="name" value="{{Auth::user()->name}}">
								<label for="">सम्पर्क फोन न. :-</label>
								<input type="text" class="form-control" name="phone" value=""><br>
								<label for="">डेलिवरी ठेगाना :-</label>
								<input type="text" class="form-control" name="address" value="">
								<input type="hidden" name="product_id" value="{{$product->id}}">
								<input type="hidden" name="user_id" value="{{$product->user->id}}">
								<input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
								<hr>
								<input type="submit" class="btn btn-block btn-success" name="submit" value="अर्डर गर्नुहोस्">

							</form>
						</div>
						@endguest
					</div>

				</div>
			</div>
			@if($product->specification)
			<div class="row">
				<div class="col-md-12">
					<div class="detail-product">
						<label>More Details:</label>
						<div>
							{!! $product->specification !!}
						</div>
					</div>
				</div>
			</div>
			@endif
		</div>

	</div>
</div>
<div class="container pt-4">
	<h5 style="border-bottom: 3px solid DodgerBlue;padding-bottom: 20px"><span>Related Products</span></h5>
	<br>
	<div class="row">
		@if(!empty($productsOfCategory))
		@foreach ($productsOfCategory as $prod)
		<div class="col-md-3">

				<div class="offer-img">
					<div class="img-height-related">
						<a href="{{route('view.product', $prod->id)}}"><img class="offer-img-size" src="{{asset('uploads/products/'.$prod->image)}}" alt="image"></a>
					</div>
					<hr>
					<div class="offer-disc">
						<h6><a href="">{{$prod->title}}</a></h6>
						<p>NRS - {{$prod->price}}/-</p>
					</div>
				</div>

		</div>
		@endforeach
		@endif
	</div>
</div>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-8">

			<div class="row">
				<div class="col-md-12 padding-review">
					<p>
						<span style="text-decoration: underline;">Rate product OR Write a review</span> ?
						@guest
						<button type="button" class="review-btn" >
							<a href="{{ route('facebook.login') }}">Login With Facebook</a>
						</button>
						&nbsp;&nbsp;
						@else
						<form action="{{ route('product.review') }}" method="post" class="pl-2">
							{{csrf_field()}}
							<!-- <label for="Your Review:"><b>Your Review:</b></label> -->
							<div class="form-group" id="rating" style="display: inline-flex;">
							</div>
							<textarea name="review" id="" rows="4" class="form-control"></textarea>
							<input type="hidden" name="user_id" value="{{Auth::id()}}">
							<input type="hidden" name="name" value="{{Auth::user()->name}}">
							<input type="hidden" name="product_id" value="{{$product->id}}">
							<input type="hidden" name="email" value="{{Auth::user()->email}}">
							<input type="hidden" name="rating" id="rating-input" value="">
							<input type="submit" class="btn btn-info mt-3" name="Submit" value="Submit">
						</form>
						@endguest
					</p>
				</div>
			</div>


			<div class="row">
				<div class="col-md-12" style="padding-left: 40px">
					<p>{{ $productReviews ?  count($productReviews) : '0'}} review(s)</p>
					@if(!empty($productReviews))
					@foreach ($productReviews as $review)
						<div class="row" style="border: 1px solid lightgrey">
							<div class="col-md-12">
								<p><b>By </b>{{ $review->name }},</p>
								<p style="padding-left: 100px;">{{ $review->review }}</p>
							</div>
						</div>
					@endforeach
					@endif
				</div>
			</div>

		</div> <!-- END OF COL lEFT	 -->
		<div class="col-md-4" style="padding-top: 50px;padding-left: 40px">
			<a href=""><img src="{{ asset('image/addhere.jfif') }}" alt="" style="width: 100%" height="300"></a>
		</div>

	</div>
</div>
<hr>



@endsection
@section('scripts')
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
            zoomWindowHeight:350
		});
	});
	$("#rating").emojiRating({
				fontSize: 26,
				onUpdate: function(count) {
					$(".review-text").show();
					$("#starCount").html(count + " Star");
					var rating = $('.emoji-rating').val();
					$('#rating-input').val(rating);
				}
			});
</script>
@endsection
