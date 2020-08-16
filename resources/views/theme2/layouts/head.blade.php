<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> + Phone No</li>
								<li><i class="ti-email"></i> support@shophub.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-location-pin"></i> Store location</li>
							@auth
								<li><i class="ti-user"></i> <a href="{{ route('wish2', Auth::id()) }}">Wish List</a></li>
							@endauth
							@guest
								<li><i class="ti-power-off"></i><a href="{{ route('login.new2') }}">Login</a></li>
							@else
								<li><i class="ti-power-off"></i>
									<a href="{{ route('logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">Logout
									</a>
								</li>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{csrf_field()}}
								</form>
							@endguest
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="{{ url('theme2') }}"><img src="{{ asset('themes/2/images/logo.png') }}" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form" action="{{ route('search.product2') }}" method="post">
									{{ csrf_field() }}
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar-wrapper">
								<form action="{{ route('search.product2') }}" method="post">
									{{ csrf_field() }}
									<input name="search" placeholder="Search Products Here....." type="text">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							@auth
							<div class="sinlge-bar">
								<a href="{{ route('wish2', Auth::id()) }}" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							@endauth
							<div class="sinlge-bar shopping">
								@if(Auth::user())
								<a href="" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ Cart::instance('default')->count() }}</span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span class="cart-count">{{ Cart::instance('default')->count() }} Item(s)</span>
										<a href="{{ route('cart.view2') }}">View Cart</a>
									</div>
								</div>
								@else
								<a href="" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ Cart::instance('default')->count() }}</span></a>
								@endif
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							<div class="all-category">
								<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
								<ul class="main-category">
									@foreach( App\Category::orderBy('name')->where('parentId', 0)->get() as $category )
									<li>
										<a href="{{ route('category.product.new2', $category->slug) }}">{{ $category->name }} <i class="fa fa-angle-right" aria-hidden="true"></i></a>
										@if( $category->children() )
										<ul class="sub-category">
										@foreach( $category->children() as $child)
											<li><a href="{{ route('category.product.new2', $child->slug) }}">{{ $child->name }}</a></li>
										@endforeach
										</ul>
										@endif
									</li>
									@endforeach
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
												<li class="active"><a href="{{ url('/') }}">Home</a></li>
												<li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
												<li><a href="#">About Us</a></li>									
												<li><a href="{{ url('contact-us') }}">Contact Us</a></li>
											</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->