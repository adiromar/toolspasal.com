<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Title Tag  -->
    <title>Toolspasal.com - Online Store.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('themes/2/images/favicon.png') }}">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('themes/2/css/bootstrap.css') }}">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('themes/2/css/magnific-popup.min.css') }}">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('themes/2/css/font-awesome.css') }}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{ asset('themes/2/css/jquery.fancybox.min.css') }}">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('themes/2/css/themify-icons.css') }}">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('themes/2/css/niceselect.css') }}">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('themes/2/css/animate.css') }}">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('themes/2/css/flex-slider.min.css') }}">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('themes/2/css/owl-carousel.css') }}">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('themes/2/css/slicknav.min.css') }}">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{ asset('themes/2/css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('themes/2/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/2/css/responsive.css') }}">
	
	@yield('head')

	<style>
		.pagination li{
			display: inline-block;
		    padding: 3px 12px;
		    border: 1px solid;
		}
		.pagination .active{
			background-color: #495057;
			color:white;
			font-weight: 500
		}
		.search-bar-wrapper{
			text-align: center;
			margin-top: 10px;
		}
		.search-bar-wrapper input{
			width: 420px;
		    padding: 12px 10px 12px 10px;
		    border-right: none;
		}
		.search-bar-wrapper .btnn i{
			background-color: #333333;
		    font-weight: 600;
		    color: white;
		    padding: 16px 19px 19px 20px;
		    font-size: 15px;
		    border-top-right-radius: 3px;
		    border-bottom-right-radius: 3px;
		    margin-left: -4px;
		}
	</style>
	
</head>
<body class="js">
	
	@yield('menu')

	@yield('breadcrumbs')

	@yield('content')

	@yield('sliders')

	

	{{-- @yield('categorysection') --}}
	
	

	

	@yield('all')

	@yield('popularsection')

	@yield('productssection')	

	@yield('threecolumns')

	@yield('modals')
	
	<!-- Modal -->
    @include('theme2.layouts.modal')
    <!-- Modal end -->
	
	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="{{ url('theme2') }}"><img src="{{ asset('themes/2/images/logo2.png') }}" alt="#"></a>
							</div>
							<p class="text"><i class="fa fa-map-marker"></i> Sundhara, Taha Galli </p>
							<p class="call">Got Question? Call us 24/7
								<span>
									<a href="tel:9860104285"><i class="fa fa-mobile"></i> 9860104285 </a>
								</span>
								<span>
									<a href="tel:9851107305"><i class="fa fa-mobile"></i> 9851107305 </a>
								</span>
							</p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
								<li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Latest Categories</h4>
							<ul>
							@foreach( App\Category::latest()->get()->take(5) as $category )
								<li><a href="{{ route('category.product.new2', $category->slug) }}">{{ $category->name }}</a></li>
							@endforeach
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Touch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>Contacts Here</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020 <a href="http://encoderslab.com" target="_blank">Encoderslab</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="images/payments.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="{{ asset('themes/2/js/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/2/js/jquery-migrate-3.0.0.js') }}"></script>
	<script src="{{ asset('themes/2/js/jquery-ui.min.js') }}"></script>
	<!-- Popper JS -->
	<script src="{{ asset('themes/2/js/popper.min.js') }}"></script>
	<!-- Bootstrap JS -->
	<script src="{{ asset('themes/2/js/bootstrap.min.js') }}"></script>
	<!-- Color JS -->
	<script src="{{ asset('themes/2/js/colors.js') }}"></script>
	<!-- Slicknav JS -->
	<script src="{{ asset('themes/2/js/slicknav.min.js') }}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{ asset('themes/2/js/owl-carousel.js') }}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{ asset('themes/2/js/magnific-popup.js') }}"></script>
	<!-- Waypoints JS -->
	<script src="{{ asset('themes/2/js/waypoints.min.js') }}"></script>
	<!-- Countdown JS -->
	<script src="{{ asset('themes/2/js/finalcountdown.min.js') }}"></script>
	<!-- Nice Select JS -->
	<script src="{{ asset('themes/2/js/nicesellect.js') }}"></script>
	<!-- Flex Slider JS -->
	<script src="{{ asset('themes/2/js/flex-slider.js') }}"></script>
	<!-- ScrollUp JS -->
	<script src="{{ asset('themes/2/js/scrollup.js') }}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{ asset('themes/2/js/onepage-nav.min.js') }}"></script>
	<!-- Easing JS -->
	<script src="{{ asset('themes/2/js/easing.js') }}"></script>
	<!-- Active JS -->
	<script src="{{ asset('themes/2/js/active.js') }}"></script>
	<!-- Sweet Alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	@yield('footer')

	<script>
		$(document).ready(function(){
	        $('.show-modal').click(function(e){
				e.preventDefault();
				$('#featured_modal').modal('show');
			});

			$('.show-modal_2').click(function(e){
				e.preventDefault();
				$('#product_modal').modal('show');
			});

			$('.show-modal-tag').click(function(e){
				e.preventDefault();
				tag = $(this).data("tagid");
				tagname = $(this).data("tagname");
				$('#tag_modal').modal('show');
				$('#tag_id').val(tag);
				$('#tag_name').html(tagname);
			});

			$('.show-slider').click(function(e){
				e.preventDefault();
				$('#slider_modal').modal('show');
			});

	        // Add to Cart 
			$('.add-to-cart').click(function(e){
				e.preventDefault();

				let productId = $(this).data('productid');
				let productName = $(this).data('product');
				let rate = $(this).data('rate');

				$.ajaxSetup({
				  headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  }
				});

				$.ajax({
	               type:'POST',
	               url:'{{ url("cart/ajax") }}',
	               data: { productId, productName, rate },
	               success:function(data) {
	               		if ( data.status == 200 ) {
	               			
	               			let count = $('.total-count').text();
	               			let cartcount = parseInt(count) + 1;
	               			$('.total-count').text(cartcount);
	               			$('.cart-count').text(cartcount + ' Item(s)');

	               			Swal.fire({
							  title: 'Success!',
							  text: 'Item added to your cart.',
							  icon: 'success',
							  confirmButtonText: 'Ok'
							})

	               		}else{
	               			
	               			Swal.fire({
							  text: 'Item already on your cart.',
							  icon: 'error',
							  confirmButtonText: 'Exit'
							})
	               		}
	               }
	            });

			});

			// Add to Wish List
			$('.add-to-wishlist').click(function(e){
				e.preventDefault();

				let productId = $(this).data('product');

				$.ajaxSetup({
				  headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  }
				});

				$.ajax({
					type:'POST',
					url:'{{ url("wishlist/ajax") }}',
					data: { productId },
					success:function(data) {
						
						if ( data.status == 200 ) {
	               			
	               			Swal.fire({
							  title: 'Success!',
							  text: data.message,
							  icon: 'success',
							  confirmButtonText: 'Ok'
							})

	               		}else{
	               			
	               			Swal.fire({
							  text: 'Please login to add this item in the wish list.',
							  icon: 'error',
							  confirmButtonText: 'Exit'
							})
	               		}

					}
	            });

			});

			// Sort Product
			$('.sort-product').change(function(){

				window.location = `?sort=` + $(this).val();

			});

			// validation for slider image
			var _URL = window.URL || window.webkitURL;
			$("#file_slider").change(function (e) {
				var file, img;
				if ((file = this.files[0])) {
					img = new Image();
					var objectUrl = _URL.createObjectURL(file);
					img.onload = function () {
						// alert(this.width + " " + this.height);
            if(this.width >= 520 || this.height >= 460){
              // alert('success');
              $(':input[type="submit"]').prop('disabled', false);
              $(".slider-error").empty();
            }else{
              // alert('Failure');
              $(".slider-error").text("Image Size Too Small. Please Upload Larger Image.");
              $(':input[type="submit"]').prop('disabled', true);
            }
						_URL.revokeObjectURL(objectUrl);
					};
					img.src = objectUrl;
				}
			});

			// validation for featured image
			$("#featured_file").change(function (e) {
				var file, img;
				if ((file = this.files[0])) {
					img = new Image();
					var objectUrl = _URL.createObjectURL(file);
					img.onload = function () {
						// alert(this.width + " " + this.height);
            if(this.width >= 520 || this.height >= 460){
              // alert('success');
              $(':input[type="submit"]').prop('disabled', false);
              $(".featured-error").empty();
            }else{
              // alert('Failure');
              $(".featured-error").text("Image Size Too Small. Please Upload Larger Image.");
              $(':input[type="submit"]').prop('disabled', true);
            }
						_URL.revokeObjectURL(objectUrl);
					};
					img.src = objectUrl;
				}
			});

			// validation for product image
			$("#product_file").change(function (e) {
				var file, img;
				if ((file = this.files[0])) {
					img = new Image();
					var objectUrl = _URL.createObjectURL(file);
					img.onload = function () {
						// alert(this.width + " " + this.height);
            if(this.width >= 520 || this.height >= 460){
              // alert('success');
              $(':input[type="submit"]').prop('disabled', false);
              $(".product-error").empty();
            }else{
              // alert('Failure');
              $(".product-error").text("Image Size Too Small. Please Upload Larger Image.");
              $(':input[type="submit"]').prop('disabled', true);
            }
						_URL.revokeObjectURL(objectUrl);
					};
					img.src = objectUrl;
				}
			});

			// validation for tag image
			$("#tag_file").change(function (e) {
				var file, img;
				if ((file = this.files[0])) {
					img = new Image();
					var objectUrl = _URL.createObjectURL(file);
					img.onload = function () {
						// alert(this.width + " " + this.height);
            if(this.width >= 520 || this.height >= 460){
              // alert('success');
              $(':input[type="submit"]').prop('disabled', false);
              $(".tag-error").empty();
            }else{
              // alert('Failure');
              $(".tag-error").text("Image Size Too Small. Please Upload Larger Image.");
              $(':input[type="submit"]').prop('disabled', true);
            }
						_URL.revokeObjectURL(objectUrl);
					};
					img.src = objectUrl;
				}
			});

			$('.submit-form').change(function(e){
                e.preventDefault();
                // alert("hello");
		        $(this).submit();
	        });
			

		});
	</script>
	
</body>
</html>