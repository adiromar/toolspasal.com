@extends ('layouts.main')

@section ('metas')
<title>{{ $product->title }} | Sastoshowroom.com</title>
<meta name="description" content="{{$product->detail}}">
<meta name="keywords" content="Sasto showroom, sastoshworoom, product, {{$product->keywords}}">
<meta name="author" content="Sastoshowroom.com">
<meta property="og:description" content="{{$product->detail}}">
<meta property="og:title" content="{{ $product->title }}">
<meta property="og:type" content="article">
<meta property="og:url" content="https://www.sastoshowroom.com/product/{{$product->slug}}">
<meta property="og:image" content="{{asset('uploads/products/'.$product->featuredImage)}}">
<meta property="og:image:width" content="500" />
<meta property="og:image:height" content="500" />
<meta property="og:image:alt" content="{{ $product->productName }}" />
<link rel="canonical" href="https://www.sastoshowroom.com/product/{{$product->slug}}" />

@endsection

@section ('styles')
<style>
.review-btn{	border: 1px solid grey;background-color: #4267b2;padding: 5px 10px;	font-size: 14px;cursor: pointer;}
.review-btn a{	color: white;}
.review-section{	border: 1px solid lightgrey;	padding: 20px 40px;}
.img-height-related{	height: 200px;}
.img-height-related img{	object-fit: cover;}
.jqEmoji-container{	display: inline-flex;	padding-left: 10px}
.color-orange{	color: orange;}
.order{	border: 1px solid lightgrey;margin-top:50px;padding:10px 10px;background-color: #f5f5f540;}
.order .order-now{	font-size:18px;font-weight:700;font-family:Roboto;}
.discount{	color: sienna;font-weight: bold;text-shadow: 0 0 3px #FF0000; margin-left: 10px !important;}
.supplier{	margin-top: 60px;	border:1px solid lightgrey;	padding: 20px;}
.big-img img:hover{transform: none !important;}
.off{	position: absolute;	bottom: 45px;	right: 35px;background-color: #dc2727;color: white;	padding-left: 15px; padding-right: 15px; padding-top: 8px; padding-bottom: 8px; font-size: 18px;}
.offA{ position:absolute;top:34px;right:19px;background-color:#dc2727;color:white;padding-left:8px;padding-right:8px;padding-top: 2px;
  padding-bottom: 2px;font-size: 14px; }
.big-img{	position: relative;}
.zoomContainer{	height: 200px !important;	width: 200px !important;}
/* .delivery_charge{	border: 1px solid lightgrey;padding: 8px 8px;margin-top: 10px;background-color: #add8e640;} */
.delivery_charge .p1{color: maroon;font-size: 15px;font-weight: 600;}
.delivery_charge .p2{color: black;font-size: 15px;	padding-bottom: 15px;}
.detail-product{	border: 1px solid #a5253770 !important; }
.big-detail span{ font-size: 15px  }
.anim:hover{-webkit-stroke-width: 5.3px;  -webkit-stroke-color: #FFFFFF; -webkit-fill-color: #FFFFFF; text-shadow: 1px 0px 20px yellow;}
.review-btn:hover{ color: white }
.rating-row{ padding-top: 12px;  }
</style>
@endsection

@section ('content')
<?php session()->forget('product_id');
 ?>
 <!-- Modal 2 -->
<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content container-fluid">
  	<div class="row">
  		<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="float-left">
							<h5>Details:</h5>
						</div>
						<div class="float-right">
							<span id="closeit" class="close float-right" style="color: red;">&times;</span>
						</div>
					</div>
				</div>
				<div style="padding: 20px">

					<div class="">
						{!! $product->description !!}
					</div>
				</div>
  		</div>
  	</div>
  </div>
</div>
<!-- End modal 2 -->
<div class="container-fluid">
	<div class="row">

		<div class="col-xs-12 col-md-4">
			<div class="big-img  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
				<!-- <img id="myImg" src="{{  asset('uploads/products/'.$product->image) }}"> -->
				<img id="zoom_10" src="{{  asset('uploads/products/'.$product->featuredImage) }}" data-zoom-image="{{  asset('uploads/products/'.$product->featuredImage) }}"/>
				@if($product->discountPercent)
				<span class="off">
					{{ $product->discountPercent }} Off
				</span>
				@endif
			</div>

		</div>

		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
					<div class="big-detail  wow fadeInRight" data-wow-duration="2s" data-wow-delay="0s">
						<p class="money" style="font-weight: 600">{{ $product->productName }}</p>
            <div class="row">
              <div class="col-md-12">
                <div class="delivery_charge">
                  <div class="row">
                  	<div class="col-md-6">
                  		@if($product->user->profile)
        							<p><strong>Supplier:</strong>

        								<!-- <a href="{{ route('view.supplier', [$product->user->id, $product->user->name]) }}" target="_blank"> -->
											{{ $product->user->supplier ? $product->user->supplier->detail : '' }}
        								<!-- </a> -->
        							</p>
        						@endif
                  	</div>
                  	<div class="col-md-6" style="padding-top: 10px;">
                  		<?php if ($averageRating > 0): ?>
						<p>
  							<i class="fa fa-star {{ $averageRating >= 1 ? 'color-orange' : '' }}" aria-hidden="true"></i>
  							<i class="fa fa-star {{ $averageRating >= 2 ? 'color-orange' : '' }}" aria-hidden="true"></i>
  							<i class="fa fa-star {{ $averageRating >= 3 ? 'color-orange' : '' }}" aria-hidden="true"></i>
  							<i class="fa fa-star {{ $averageRating >= 4 ? 'color-orange' : '' }}" aria-hidden="true"></i>
  							<i class="fa fa-star {{ $averageRating >= 5 ? 'color-orange' : '' }}" aria-hidden="true"></i>
  						</p>
		            <?php else: ?>
		            	<br>
		              			<a href="#ratehere" class="anim" style="color: coral;font-weight: 500;margin-left: 15px;">मन पर्‍यो ?</a>
		          <?php endif; ?>
                  	</div>

                  </div>
                  <div class="row">

                  </div>
                </div>
              </div>
            </div>

						@if($product->shortDesc)
							<p><strong>Detail:</strong></p>
							<p style="font-family: sans-serif;"><span>{{ $product->shortDesc }}</span></p>
						@endif
						@guest
						@else
						<br>
						@endguest
						<div class="row">

							<div class="col-md-12">
								<p>
									<span class="float-left" style="font-weight:500;font-size:30px">NRs.</span>
									@if($product->actualRate)
									<span class="float-left" style="text-decoration: line-through;font-weight:500;font-size:30px">{{ $product->actualRate.' ' }}</span>
									@endif
									<span class="float-left" style="font-weight:500;font-size:30px">{{$product->rate}}</span>
								</p>
							</div>
							<div class="col-md-12">
								@if($product->availableItems == 1)
									<p style="color: red;font-size:15px">Limited Stock</p>
								@endif
							</div>

						</div>

					</div>
						@guest
						@else
						<br>
						@endguest
						<br>
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="cart wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s">
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
              			@if($product->description)
							<div class="col-md-6 col-xs-12" style="padding-top: 20px;">
								<a href="#" class="specs" style="border: 1px solid grey;padding: 10px 25px;color: white;background-color: #a52537f7">MORE DETAILS</a>
							</div>
              			@endif
						</div>
				</div>
				<div class="col-md-6">
					<div class="order">
						@guest
							<br>
							<p class="order-now">कृपया <b>डिरेक्ट अर्डर</b> को लागि फेसबुक लगइन गर्नुहोस्</p>
							<div class="text-center pt-4">
							<a class="review-btn" href="{{ route('facebook.login') }}">Login with FACEBOOK</a>
							</div>
							<br>
						@else
						<div style="padding-left:15px;padding-top: 15px">
							<form id="oform" class="form" action="{{route('order.store')}}" method="post">
								{{csrf_field()}}
								<label for="" style="line-height: 30px"><b>{{Auth::user()->name}} जी,
								  &nbsp;अर्डर को लागि कृपया सम्पर्क फोन नम्बर र  डेलिवरी स्थान भर्नुहोस् ।</b></label><br>
								  <input type="hidden" name="name" value="{{Auth::user()->name}}">
								<label for="">सम्पर्क फोन न. :-</label>
								<input type="text" class="form-control" name="phone" value=""><br>
								@if(Auth::user()->email == 'default@example.com')
									<label for="">ईमेल :-</label>
									<input type="text" class="form-control" name="user_email"><br>
								@else
									<input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
								@endif
								<label for="">डेलिवरी ठेगाना :-</label>
								<input type="text" class="form-control" name="address" value="">
								<input type="hidden" name="product_id" value="{{$product->id}}">
								<input type="hidden" name="user_id" value="{{$product->user->id}}">
								<br>
								<input id="order-submit" type="submit" class="btn btn-block btn-success" value="अर्डर गर्नुहोस्">

							</form>
						</div>
						@endguest
						<hr>
						<div class="col-md-12 delivery_charge text-center">
                  		@if($product->delivery_charge)

                      <p class="p1 mt-2">Delivery Charge:</p>
                      <p class="p2">
                      @if($product->delivery_charge == 'Charge')
                        {{$product->charge}}
                      @elseif($product->delivery_charge == 'Sastoshowroom')
                        Sastoshowroom Delivery
                      @else
                        {{$product->delivery_charge}} Delivery
                      @endif
                    </p>
                    @endif
                  	</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="container pt-4">
	<h4 class="text-center" style="border-bottom: 3px solid DodgerBlue;padding-bottom: 20px"><span>सम्बन्धित समानहरु</span></h4>
	<br>
	<div class="row">
		@if(!empty($productsOfCategory))
		@foreach ($productsOfCategory as $prod)
		<div class="col-md-3">

				<div class="offer-img">
					<div class="img-height-related">
						<a href="{{route('view.product', [$prod->slug])}}"><img class="offer-img-size" src="{{asset('uploads/products/'.$prod->featuredImage)}}" alt="image"></a>
						@if($prod->discountPercent)
						<span class="offA">
							{{ $prod->discountPercent }}
						</span>
						@endif
					</div>
					<hr>
					<div class="offer-disc">
						<h6><a href="{{route('view.product', [$prod->slug])}}">{{$prod->productName}}</a></h6>
						<p>NRS - {{$prod->rate}}/-</p>
					</div>
					<div class="best-but">
						<a role="button" href="{{ route('view.product', [$prod->slug]) }}" ><i class="fas fa-eye"></i> VIEW</a>
						<a href="" class="order-btn" data-product-id="{{$prod->id}}" data-user-id="{{$prod->user->id}}" data-product-slug="{{$prod->slug}}">Direct Order</a>
					</div>
				</div>

		</div>
		@endforeach
		@endif
	</div>
</div>
<hr>
<!-- <div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			@if($product->specification)
			<div class="row">
				<div class="col-md-4 offset-md-4 text-center">
					<p style="border: 1px solid grey;padding: 10px 30px;color: white;background-color: #a52537f7">MORE DETAILS</p>
				</div>
			</div>
			@endif
			@if($product->specification)
	          <div class="row">
	            <div class="col-md-12">
	              <div class="detail-product">
	                <div>
	                  {!! $product->specification !!}
	                </div>
	              </div>
	            </div>
	          </div>
	          @endif
		</div>
		<div class="col-md-1"></div>
	</div>
</div> -->
<div class="container">
	<div class="row">
		<div class="col-md-8">

			<div class="row" id="ratehere">
				<div class="col-md-12 offset-md-3 padding-review">

					<p>
						<span style="text-decoration: underline;font-weight: 500;color: chocolate">मन परे मूल्याङ्कन गर्नुहोस्</span>!
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
				<div class="col-md-12 offset-md-3" style="padding-left: 40px">
					<p style="font-weight: 500;">{{ $productReviews ?  count($productReviews) : '0'}} review(s)</p>
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
            zoomWindowHeight:350,
            zoomWindowPosition: 1, zoomWindowOffetx: 250
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


			$('#order-submit').click(function(e){
				$(this).prop('disabled', true);
				$('#oform').submit();
			});
</script>
@endsection
