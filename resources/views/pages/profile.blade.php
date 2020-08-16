@extends ('layouts.main')

@section ('metas')

<meta name="keywords" content="Sasto, Sastoshowroom, showroom, online, online shopping, Nepal, suppliers, cheap">
<meta property="og:description" content="{{ $user->profile->about_us }}">
<meta property="og:title" content="{{ $user->profile->detail }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{'https://www.sastoshowroom.com/supplier/'.$user->id.'/'.$user->name }}">
<meta property="og:image" content="{{asset('uploads/suppliers/' . $user->profile->image)}}">
<meta property="og:image:width" content="1024" />
<meta property="og:image:height" content="1024" />
<meta property="og:image:alt" content="{{ $user->profile->detail }}" />
@endsection

@section('styles')

<style>
.toggle-tab > a{
	border: 1px solid grey;
	padding: 10px 30px;
	color: white;
}
.profile-left > .tabs{
	padding-top: 50px;
}
.review-submit{
	background: cadetblue;
    border: navajowhite;
    margin-top: 20px;
    color: floralwhite;
    padding: 5px 10px; cursor: pointer;
}
.profile-header{
	background-color: #9acd32b3;
}
.address{
	padding-top: 25px;
}
iframe{
	width: 90%;
height: 300px;
}
.offer-img-profile{
	margin: 30px 0px;
	border:1px solid lightgray;
	padding-bottom: 10px;
	text-align: center;
	height: 375px;
}
@media (max-width: 575px) {

	.profile-header{
			margin-top: 80px;
	}
	.address{
		padding-top: 20px !important;
		padding-left: 30px !important;
	}

}
</style>

@endsection

@section ('content')
<section class="profile-header">
<div class="container">
	<div class="row">
		<div class="col-md-3" style="padding: 5px; border: 1px solid #f5d9d982;">
			<img src="{{ url('uploads/suppliers/'.$user->profile->image) }}" alt="" width="100%" height="180" style="object-fit: cover;min-height: 240px;">
		</div>
		<div class="col-md-6" style="padding: 20px 30px 20px 30px;">
			<h3 style="color: black">{{$user->profile->detail}}</h3> <br>
			<p>{{$user->profile->about_us}}</p>
			<p><strong>Email:</strong>&nbsp;&nbsp;&nbsp;{{ $user->profile->email }}</p>
			<p><strong>Phone:</strong>&nbsp;&nbsp;&nbsp;{{ $user->profile->phone }}</p>
			<p><strong>Viber:</strong>&nbsp;&nbsp;&nbsp;{{ $user->profile->viber }}</p>
			<p><strong>WeChat:</strong>&nbsp;&nbsp;&nbsp;{{ $user->profile->wechat }}</p>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12 pl-3 address">
					<p><h5>ADDRESS:</h5>{{ $user->profile->address }}</p>
					<p><strong>Facebook:</strong>
						<a href="{{ $user->profile->facebook_link }}" style="color: #0a3182" target="_blank">{{ $user->profile->detail }}</a>
					</p><br>
					<p><strong>Skype:</strong>
						{{ $user->profile->skype }}
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<div class="div">&nbsp;</div>

<div class="container">
	<div class="row pt-5 pr-3">
		<div class="col-md-12 profile-left">
			<div class="row">
				<div class="col-md-12 text-center toggle-tab">
					<a href="#tab1" id="toggle1" class="active-tab" style="background-color: #a52537f7;">Our Products</a>
					<!-- <a href="#tab2" id="toggle2" style="background-color: #009688;">Contact Us</a>
					<a href="#tab3" id="toggle3" style="background-color: #6056b7;">Videos</a> -->
				</div>
			</div>
			<div class="row tabs" id="tab1">
				@foreach ($user->products()->take(9)->latest()->get() as $product)
					<div class=" col-12 col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
						<div class="offer-img-profile">
							<div class="img-height">
									<a href="{{ route('view.product', [$product->slug]) }}"><img class="offer-img-size" src="{{asset('uploads/products/'.$product->image)}}"></a>
							</div>
							<div class="offer-disc">
									<h6><a href="{{ route('view.product', [$product->slug]) }}">{{$product->title}}</a></h6>
									<p>NRS - {{$product->price}}/-</p>
							</div>
							<div class="order-but">
									<a role="button" href="{{ route('view.product', [$product->slug]) }}" ><i class="fas fa-eye"></i>VIEW</a>
									<a href="" class="order-btn" data-product-id="{{$product->id}}" data-user-id="{{$product->user->id}}" data-product-slug="{{$product->slug}}">Direct Order</a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row tabs" id="tab2" style="display: none;">
				<div class="col-md-12 pt-5">

					<h5>Write a Message:</h5>
					<form action="{{ route('add.review') }}" method="post">
						{{csrf_field()}}
						<textarea name="review" class="form-control" cols="30" rows="3"></textarea>
						<div class="row pt-2">
							<div class="col-md-6">
								<input type="text" class="form-control" name="fullname" placeholder="Full Name">
							</div>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" placeholder="Valid Email Address">
							</div>
						</div>
						<input type="hidden" name="supplier_id" value="{{$user->id}}">
						<input type="submit" class="review-submit" name="submit" value="Submit">
					</form>
					<!-- //Reviews -->
					@guest
					@else
					@endguest
				</div>
			</div>
			<div class="row tabs" id="tab3" style="display: none;">
				<div class="col-md-12 text-center pt-5">
				<h4 style="font-family:Roboto;">Videos</h4>
				<hr style="border:2px solid Dodgerblue;">
					<div class="row">
						@if(!empty($videos))
							@foreach($videos as $vid)
							<div class="col-sm-12 col-md-6">
								<h5>{{ $vid->title }}</h5>
								{!! $vid->url !!}
							</div>
							@endforeach
						@else
						<div class="col-md-12">
							<p class="pl-4" style="font-weight:500">There are no videos uploaded at the moment. Thanks for checking out.</p>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection
@section('footer-info')

<p>{{$user->profile->about_us}}</p>

@endsection
@section('scripts')

<script>
	$('#toggle1').click(function(e){
		e.preventDefault();
		$(this).addClass('active-tab');
		$('#toggle2').removeClass('active-tab');
		$('#toggle3').removeClass('active-tab');
		$('#tab2').hide();
		$('#tab3').hide();
		$('#tab1').show(500);

	});
	$('#toggle2').click(function(e){
		e.preventDefault();
		$(this).addClass('active-tab');
		$('#toggle1').removeClass('active-tab');
		$('#toggle3').removeClass('active-tab');
		$('#tab1').hide();
		$('#tab3').hide();
		$('#tab2').show(500);
	});
	$('#toggle3').click(function(e){
		e.preventDefault();
		$(this).addClass('active-tab');
		$('#toggle1').removeClass('active-tab');
		$('#toggle2').removeClass('active-tab');
		$('#tab1').hide();
		$('#tab2').hide();
		$('#tab3').show(500);
	});
</script>


@endsection
