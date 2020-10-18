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

<style>
    .total_count{
        position: absolute;
        top: -9px;
        left: 26px;
        display: block;
        width: 16px;
        height: 16px;
        font-size: 10px;
        line-height: 14px !important;
        background: #f7941e;
        color: #fff !important;
        text-align: center;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }
    .single-link{
        /* display: block; */
        padding: .5rem 1rem;
        font-size: 18px;
    }

    .single-link i{
        font-size: 24px;
    }
    .single-link span{
        font-size: 16px;
    }
</style>

<!-- Header -->
<header class="header shop">
   
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('themes/2/images/tools_web.png') }}" alt="logo"></a>
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
                {{-- <div class="col-lg-8 col-md-7 col-12">
                    
                </div> --}}
                <div class="col-lg-10 col-md-10 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        @auth
                        <div class="sinlge-bar">
                            <a href="{{ route('wish2', Auth::id()) }}" class="single-icon single-link"><i class="fa fa-heart-o" aria-hidden="true"></i> <span>Wishlist</span></a>
                        </div>
                        @endauth
                        <div class="sinlge-bar shopping">
                            @if(Auth::user())
                            <a href="" class="single-icon"><i class="ti ti-shopping-cart"></i> <span class="total-count">{{ Cart::instance('default')->count() }}</span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span class="cart-count">{{ Cart::instance('default')->count() }} Item(s)</span>
                                    <a href="{{ route('cart.view2') }}">View Cart</a>
                                </div>
                            </div>

                            @else
                            <a href="{{ route('cart.view2') }}" class="single-link">
                                <i class="ti ti-shopping-cart"></i>
                                <span class="total_count">{{ Cart::instance('default')->count() }}</span>
                                <span>Cart</span>
                            </a>
                            <a href="">
                                <i class="hp-track-order"></i>
                                <span>Track Order</span>
                            </a>
                            
                            @endif
                            <!--/ End Shopping Item -->
                        </div>

                        <div class="sinlge-bar">
                            <a href="#" onclick="myFunction()" class="dropbtn" class="single-icon single-link"><i class="ti ti-user" aria-hidden="true"></i> <span>Account</span></a>
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
                            <span></span>
                            <ul class="main-category" style="">
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
                                            <li><a href="{{ url('show-cart') }}">Cart</a></li>
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