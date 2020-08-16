<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">
	<head>
		<meta charset="utf-8">
		<link rel="alternate" href="https://sastoshowroom.com" hreflang="en-us" />
		@yield('metas')
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123957231-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-123957231-1');
		</script>
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta property="fb:app_id" content="212011796147563">
		
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<link rel="icon" href="{{ asset('image/favicon.jpg') }}" alt="SS">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.css') }}">
		<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}"> -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">

		@yield('styles')
		<style media="screen">
		.dialogbox{border: 1px solid grey;box-shadow: 1px 1px #888888;transition-duration: 1s;display:none;padding: 30px;background: white;position: absolute;}
		.dialog-btn{border: 2px solid white;padding: 5px 10px !important;color: white;background: #3b5998;cursor: pointer;}
		#dialog-close{padding-left: 40px;color: #f44336;cursor:pointer;font-size:19px;float:right;}
		.dialogbox h5{font-family: fantasy;float: left;color: sienna;font-size: 28px;}
		.dialog-wrapper{position: absolute;width: 420px;height: auto;z-index: 15;top: 50%;  left: 50%;   margin: -100px 0 0 -221px;}
		/* The Modal (background) */
		.modal {display: none; /* Hidden by default */position: fixed; /* Stay in place */z-index: 1; /* Sit on top */left: 0;top: 0;width: 100%; /* Full width */
		height: 100%; /* Full height */overflow: auto; /* Enable scroll if needed */background-color: rgb(0,0,0); /* Fallback color */background-color: rgba(0,0,0,0.4); /* Black w/ opacity */}
		/* Modal Content/Box */
		.modal-content {background-color: #fefefe;margin: 15% auto; /* 15% from the top and centered */padding: 20px;border: 1px solid #888;width: 50%; /* Could be more or less, depending on screen size */}
		/* The Close Button */.close {color: #aaa;float: right;font-size: 28px;font-weight: bold;}
		.close:hover,.close:focus {color: black;text-decoration: none;cursor: pointer;}
		.review-btn{border: 1px solid grey;background-color: #4267b2;padding: 5px 10px;font-size: 14px;cursor: pointer;color: white;}
		.offer-disc h6{height: 45px;}
		.order-btn{background-color: DodgerBlue !important;}
		.footer-social p{color: white}
		.footer-social .p2{color: lawngreen}
		@media (max-width: 575px) {
			.modal-content{width: 90%;}
		  .dialog-wrapper{width: 90% !important;margin: -100px 0 0 -162px;}
		.our-contacts{padding-top: 20px;padding-left: 10px;}
		}
		.diff,.diff:hover{ background-color: #4267b2;   padding: 6px 10px;   color: white; font-weight: 500; }
		.sub-list{
			position: absolute;
		    z-index: 1;
		    padding: 10px 20px;
		    background: #f8f9fa;
		    margin-top: 1px;
		    border-radius: 2px;
		    box-shadow: 0px 0px 0px 2px #ccc;
		    right: 0px;
		    top: 0px;
		}
		.top-section .sub-list{ left: 285px; }
		.cat-wrapper .sub-list{ left: 275px; }
		.list-product ul li a:hover{
			color: dodgerblue;
		}
		.hide{ display: none; }
		</style>
	</head>
	<body>

<!-- Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content container-fluid">
  	<div class="row">
  		<div class="col-md-12">
  			@guest
  			<p class="float-left">कृपया डीरेक्ट अर्डर को लागि फेसबुक लगइन गर्नुहोस् ।</p>
  			@else
  			@endguest
  			<span class="close float-right">&times;</span>
  		</div>
  		@guest
  		<div class="col-md-12 text-center pt-4">
  			<a href="https://www.sastoshowroom.com/login/facebook"><button class="review-btn">Login with FACEBOOK</button></a>
  		</div>
  		@else
		<div class="col-md-12">
  			<div class="order">
				<div style="padding-left:15px">
					<form class="form order_form" action="{{route('order.store')}}" method="post">
						{{csrf_field()}}
						<label for="" style="line-height: 30px"><b>{{Auth::user()->name}}</b>  जी,
						  &nbsp;&nbsp;<b>डिरेक्ट अर्डर</b> को लागि कृपया तल सम्पर्क फोन न. र ठेगाना भर्नुहोस् ,हामी हजुरलाई सामान घरमै ल्याइदिने छौ |</label><br>
						  <input type="hidden" name="name" value="{{Auth::user()->name}}">
						<label for="">सम्पर्क फोन न. :-</label>
						<input type="text" class="form-control" name="phone" value=""><br>
						@if(Auth::user()->email == 'default@example.com')
							<label for="">ईमेल :-</label> 
							<input type="text" class="form-control" name="user_email"><br>
						@else
							<input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
						@endif
						<label for="">तपाईंको  ठेगाना :-</label>
						<input type="text" class="form-control" name="address" value=""><br>
						<input type="hidden" name="product_id" value="">
						<input type="hidden" name="user_id" value="">
						<input type="submit" class="btn btn-block btn-success order_submit" name="submit" value="अर्डर गर्नुहोस्">
					</form>
				</div>
			</div>
  		</div>
  		@endguest

  	</div>

  </div>

</div>
<!-- End Modal -->


		<div class="container">
			<div class="row dialog-wrapper" style="">
			<div class="dialogbox col-xs-12 col-md-12">
				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<h5></h5>
						<p id="dialog-close"><b>x</b></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<p>नमस्कार ! <br><br>तपाईंको व्यापारका सामान हरु लाई निसुल्क अनलाईनमा राखी फाइदा कमाउनु होस् ।<br>जिरो खर्चमा अनलाईन बाट कमाउनका लागि Register गर्न यहाँ जान सक्नुहुनेछ ।</p>
					</div>
				</div>
				<br>
				<a href="{{route('login')}}">
					<button type="button" name="button" class="dialog-btn">Sign Up Here</button>
				</a>
			</div>
		</div>
		</div>
		<header >
			<div id="show-top" class="container-fluid">
				<div  class="row">
					<div class="col-sm-3 col-md-2 col-lg-2 logo-cover" style="text-align: center;">
						<a href="{{url('/')}}">
							<!-- <span style="padding-top: 10px;font-family: serif; color: tomato;font-size:30px;font-weight:bold;letter-spacing:0px">
								Sastoshowroom
							</span> -->
							<img src="{{ asset('image/logoname.png') }}" class="mt-2" alt="Sastoshowroom.com" height="28">
						</a>
					</div>
					<div class="col-sm-9 col-md-4 col-lg-6 nav-cover">
						<ul class="nav ">
							<li class="nav-item nav-effect">
								<a class="nav-link active link-color" href="{{url('/')}}">Home</a>
							</li>
							@auth
								@if(Auth::user()->roles()->first()->role == 'Admin') 
								<li class="nav-item nav-effect">
									<a class="nav-link link-color" href="{{url('suppliers')}}">Suppliers</a>
								</li>
								@endif
							@else
							@endauth 
							<li class="nav-item nav-effect">
								<a class="nav-link link-color" href="{{url('privacy_policy')}}">Privacy Policy</a>
							</li>
							<li>
								<a class="nav-link link-color diff" target="_blank" href="{{ url('/theme1') }}">Theme1</a>
							</li>
							<li>
								<a class="nav-link link-color diff" target="_blank" href="{{ url('/theme2') }}">Theme2</a>
							</li>
							<li>
								<a class="nav-link link-color diff" target="_blank" href="{{ url('/theme3') }}">Theme3</a>
							</li>

							<li>
								<a class="nav-link link-color diff" target="_blank" href="{{ url('/theme7') }}">Theme7</a>
							</li>
						</ul>
					</div>
					@guest
					<div class="col-sm-12 col-md-4 col-lg-4 pr-3 but-login">
						<a href="{{ route('cart.index') }}">Cart<span class="badge badge-light ml-1">{{Cart::instance('default')->count()}}</span></a>
						<a href="{{ route('login') }}" role="button">Login</a>
						<a href="{{ route('login') }}" role="button">पसल खोल्नुहोस्</a>
					</div>
					@else
					<div class="col-sm-12 col-md-4 col-lg-4 pr-3 but-login">
						<a href="{{ route('cart.index') }}">Cart<span class="badge badge-light ml-1">{{Cart::instance('default')->count()}}</span></a>
						@if(Auth::user()->roles()->first()->role == 'Guest')
						@else
						<a href="{{ url('admin') }}" role="button">Dashboard</a>
						@endif
						<a href="{{ route('logout') }}" role="button" class="log-out"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{csrf_field()}}
						</form>
					</div>
					@endguest
				</div>
			</div>
			@include('pages.partials.head')
		</header>