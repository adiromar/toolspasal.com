<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>iPasal App - App Landing Page</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('themes/1/landing_page/img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->
    <link href="{{ asset('themes/1/landing_page/style.css') }}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('themes/1/landing_page/css/responsive.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->
    {{-- <div id="preloader">
        <div class="colorlib-load"></div>
    </div> --}}

    <!-- ***** Header Area Start ***** -->
    <header class="header_area animated">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Menu Area Start -->
                <div class="col-12 col-lg-10">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Logo -->
                            <a class="navbar-brand" href="#">iPasal</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#themes">Themes</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                </ul>
                                <div class="sing-up-button d-lg-none">
                                    <a href="#">Sign Up Free</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Signup btn -->
                <div class="col-12 col-lg-2">
                    <div class="sing-up-button d-none d-lg-block">
                        <a href="#">Sign Up Free</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Wellcome Area Start ***** -->
    <section class="wellcome_area clearfix" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-6 col-md">
                    <div class="wellcome-heading">
                        <h2>iPasal</h2>
                        <h3>i</h3>
                        <p>Everything You Need. To Start Selling Online Beautifully</p>
                    </div>
                    <div class="get-start-area">
                        <!-- Form Start -->
                        <button class="submit">Try Themes For Free</button>
                        {{-- <form action="#" method="post" class="form-inline">
                            <input type="email" class="form-control email" placeholder="name@company.com">
                            <input type="submit" class="submit" value="Get Started">
                        </form> --}}
                        <!-- Form End -->
                    </div>
                </div>

                <div class="col-6 col-md">
                    <div class="welcome-thumb-up wow fadeInDown" data-wow-delay="0.5s">
                        <img src="{{ asset('themes/1/landing_page/img/bg-img/welcome-img.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome thumb -->
        {{-- <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
            <img src="{{ asset('themes/1/landing_page/img/bg-img/welcome-img.png') }}" alt="">
        </div> --}}
    </section>
    <!-- ***** Wellcome Area End ***** -->

    <!-- ***** Special Area Start ***** -->
    <section class="special-area bg-white section_padding_100" id="themes">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Select Design</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Special Area -->
                <?php $lists = App\ThemesList::orderBy('themeId', 'asc')->get();?>
                
                @foreach ($lists as $v)
                <div class="col-12 col-md-4">
                    <div class="single-special-alt text-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="single-icon">
                            {{-- <i class="ti-mobile" aria-hidden="true"></i> --}}
                        <a href="{{ url('/theme'.$v->themeNumber.'')  }}" target="_blank"><img src="{{ asset('uploads/themesList/'.$v->themeImage)}}" alt="Little Closet"></a>
                        </div>
                        <h4>{{ $v->themeName }}</h4>
                    </div>
                </div>
                @endforeach
                


                {{-- <div class="col-12 col-md-4">
                    <div class="single-special-alt text-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="single-icon">
                            
                        <a href="{{ url('/theme1') }}" target="_blank"><img src="{{ asset('themes/1/landing_page/featured_img/theme_1.JPG') }}" alt="Little Closet"></a>
                        </div>
                        <h4>Little Closet</h4>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="single-special-alt text-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="single-icon">
                            
                        <a href="{{ url('/theme2') }}" target="_blank"><img src="{{ asset('themes/1/landing_page/featured_img/theme_2.JPG') }}" alt="E-Shop"></a>
                        </div>
                        <h4>E-Shop</h4>
                    </div>
                </div>
                
                <div class="col-12 col-md-4">
                    <div class="single-special-alt text-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="single-icon">
                            <a href="{{ url('/theme3') }}" target="_blank"><img src="{{ asset('themes/1/landing_page/featured_img/theme_3.JPG') }}" alt="Daily Shop"></a>
                       
                        </div>
                        <h4>Daily Shop</h4>
                    </div>
                </div>
               
                <div class="col-12 col-md-4">
                    <div class="single-special-alt text-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="single-icon">
                            <a href="{{ url('/theme4') }}" target="_blank"><img src="{{ asset('themes/1/landing_page/featured_img/theme_4.JPG') }}" alt="Thewayshop"></a>
                       
                        </div>
                        <h4>TheWayShop</h4>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="single-special-alt text-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="single-icon">
                            <a href="{{ url('/theme5') }}" target="_blank"><img src="{{ asset('themes/1/landing_page/featured_img/theme_5.JPG') }}" alt="E shopper"></a>
                       
                        </div>
                        <h4>E-Shopper</h4>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="single-special-alt text-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="single-icon">
                            <a href="{{ url('/theme6') }}" target="_blank"><img src="{{ asset('themes/1/landing_page/featured_img/theme_6.JPG') }}" alt="Pizza Restaurant"></a>
                       
                        </div>
                        <h4>Pizza Restaurant</h4>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="single-special-alt text-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="single-icon">
                            <a href="{{ url('/theme7') }}" target="_blank"><img src="{{ asset('themes/1/landing_page/featured_img/theme_7.JPG') }}" alt="The One Shop"></a>
                       
                        </div>
                        <h4>The Oneshop</h4>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="single-special-alt text-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="single-icon">
                            <a href="{{ url('/theme8') }}" target="_blank"><img src="{{ asset('themes/1/landing_page/featured_img/theme_8.JPG') }}" alt="Big Bazaar"></a>
                       
                        </div>
                        <h4>Big Bazaar</h4>
                    </div>
                </div> --}}
            </div>



            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Why Is It Special</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="single-icon">
                            <i class="ti-mobile" aria-hidden="true"></i>
                        </div>
                        <h4>Easy to use</h4>
                        <p>We create web apps focusing our clients and simplicity in using our system to end users.</p>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="single-icon">
                            <i class="ti-ruler-pencil" aria-hidden="true"></i>
                        </div>
                        <h4>Powerful Design</h4>
                        <p>Get more from our powerful designs for both mobile and web.</p>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="single-icon">
                            <i class="ti-settings" aria-hidden="true"></i>
                        </div>
                        <h4>Customizability</h4>
                        <p>Customize pages to your interests by adding own products/items.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Special Description Area -->
        <div class="special_description_area mt-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="special_description_img">
                            <img src="{{ asset('themes/1/landing_page/img/bg-img/special.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5 ml-xl-auto">
                        <div class="special_description_content">
                            <h2>A Powerful eCommerce Suite</h2>
                            <p>Promote your business with our advanced ecommerce tools.</p>
                            {{-- <p>From advanced search engine optimization tools to running promotions, our sites are built to give you a suite of powerful tools. create landing pages, and drive revenue to your eCommerce website.</p> --}}
                            <div class="app-download-area">
                                <div class="app-download-btn wow fadeInUp" data-wow-delay="0.2s">
                                    <!-- Google Store Btn -->
                                    <a href="#">
                                        <i class="fa fa-android"></i>
                                        <p class="mb-0"><span>soon available on</span> Google Store</p>
                                    </a>
                                </div>
                                <div class="app-download-btn wow fadeInDown" data-wow-delay="0.4s">
                                    <!-- Apple Store Btn -->
                                    {{-- <a href="#">
                                        <i class="fa fa-apple"></i>
                                        <p class="mb-0"><span>available on</span> Apple Store</p>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Special Area End ***** -->

    <!-- ***** Awesome Features Start ***** -->
    <section class="awesome-feature-area bg-white section_padding_0_50 clearfix" id="features">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Heading Text -->
                    <div class="section-heading text-center">
                        <h2>Features</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-user" aria-hidden="true"></i>
                        <h5>From Homepage to Checkout, Fast!</h5>
                        <p>Developed using the latest technology and standards, you'll have a blazing fast website that allows customers to go from browsing to checkout in seconds!</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-pulse" aria-hidden="true"></i>
                        <h5>Fast and Simple</h5>
                        <p>Enjoy flawless apps/projects with fast & simple user experience.</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-dashboard" aria-hidden="true"></i>
                        <h5>Robust Product Features & Capabilities</h5>
                        <p>From basic eCommerce functionality to sophisticated product options, attributes, and filters, we've got you covered. </p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-palette" aria-hidden="true"></i>
                        <h5>Perfect Design</h5>
                        <p>Industry Standard design & features.</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-crown" aria-hidden="true"></i>
                        <h5>Easily Manage Your Content & Scale</h5>
                        <p>Manage your content easily and without hassle.</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-headphone" aria-hidden="true"></i>
                        <h5>24/7 Online Support</h5>
                        <p>Websites edits are a breeze via a user-friendly content management system (CMS), requiring no technical skills or</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ***** Awesome Features End ***** -->

    <!-- ***** Video Area Start ***** -->
    {{-- <div class="video-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Video Area Start -->
                    <div class="video-area" style="background-image: url({{ asset('themes/1/landing_page/img/bg-img/video.jpg') }});">
                        <div class="video-play-btn">
                            <a href="https://www.youtube.com/watch?v=f5BBJ4ySgpo" class="video_btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ***** Video Area End ***** -->

    <!-- ***** Cool Facts Area Start ***** -->
    {{-- <section class="cool_facts_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="counter-area">
                            <h3><span class="counter">90</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-arrow-down-a"></i>
                            <p>APP <br> DOWNLOADS</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="counter-area">
                            <h3><span class="counter">120</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-happy-outline"></i>
                            <p>Happy <br> Clients</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="counter-area">
                            <h3><span class="counter">40</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-person"></i>
                            <p>ACTIVE <br>ACCOUNTS</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.8s">
                        <div class="counter-area">
                            <h3><span class="counter">10</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-ios-star-outline"></i>
                            <p>TOTAL <br>APP RATES</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ***** Cool Facts Area End ***** -->


    <!-- ***** Pricing Plane Area Start *****==== -->
    <section class="pricing-plane-area section_padding_100_70 clearfix" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Heading Text  -->
                    <div class="section-heading text-center">
                        <h2>Pricing Plan</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Bronze Plan</h5>
                            <div class="ca-price d-flex justify-content-center">
                                <span>NRS.</span>
                                <h4>1000</h4>
                                <span> /Month</span>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>Unlimited Product Adding</p>
                            <p>5 GB Storage</p>
                            <p>Unlimited Bandwidth</p>
                            <p>Standard Support</p>
                            <p>Custom Domain Name</p>
                            <p>Google Analytics</p>

                            <p>Basic SEO</p>
                            <p>Data & Server Backup Plan - None</p>
                            <p>Android & Web Platform</p>
                            <p>1 Staff Login</p>
                            <p>Full Responsive</p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#">Select Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Silver Plan</h5>
                            <div class="ca-price d-flex justify-content-center">
                                <span>NRS.</span>
                                <h4>2000</h4>
                                <span> /Month</span>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>Unlimited Product Adding</p>
                            <p>10 GB Storage</p>
                            <p>Unlimited Bandwidth</p>
                            <p>Standard Support</p>
                            <p>Custom Domain Name</p>
                            <p>Google Analytics</p>

                            <p>Basic SEO</p>
                            <p>Data & Server Backup Plan - Once/Month</p>
                            <p>Android & Web Platform</p>
                            <p>5 Staff Login</p>
                            <p>Full Responsive</p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#">Select Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Package Price  -->
                    <div class="single-price-plan active text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Gold Plan</h5>
                            <div class="ca-price d-flex justify-content-center">
                                <span>NRS.</span>
                                <h4>3000</h4>
                                <span> /Month</span>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>Unlimited Product Adding</p>
                            <p>20 GB Storage</p>
                            <p>Unlimited Bandwidth</p>
                            <p>Priority Support</p>
                            <p>Custom Domain Name</p>
                            <p>Google Analytics</p>

                            <p>Standard SEO</p>
                            <p>Data & Server Backup Plan - Once/Week</p>
                            <p>Android & Web Platform</p>
                            <p>Unlimited Staff Login & User Privilege</p>
                            <p>Full Responsive</p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#">Select Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Platinum Plan</h5>
                            <div class="ca-price d-flex justify-content-center">
                                <span>NRS.</span>
                                <h4>4000</h4>
                                <span> /Month</span>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>Unlimited Product Adding</p>
                            <p>Unlimited Storage</p>
                            <p>Unlimited Bandwidth</p>
                            <p>Highest Support</p>
                            <p>Custom Domain Name</p>
                            <p>Google Analytics</p>

                            <p>SEO Once in a Week</p>
                            <p>Data & Server Backup Plan - Daily</p>
                            <p>Android & Web Platform</p>
                            <p>Unlimited Staff Login & User Privilege</p>
                            <p>Full Responsive</p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#">Select Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Pricing Plane Area End ***** -->

    <!-- ***** Client Feedback Area Start ***** -->
    {{-- <section class="clients-feedback-area bg-white section_padding_100 clearfix" id="testimonials">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="slider slider-for">
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting. ”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Aigars Silkalns</h5>
                                <p>Ceo Colorlib</p>
                            </div>
                        </div>
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting. ”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Jennifer</h5>
                                <p>Developer</p>
                            </div>
                        </div>
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job.”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Helen</h5>
                                <p>Marketer</p>
                            </div>
                        </div>
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting. ”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Henry smith</h5>
                                <p>Developer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Client Thumbnail Area -->
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="slider slider-nav">
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-3.jpg" alt="">
                        </div>
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-2.jpg" alt="">
                        </div>
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-1.jpg" alt="">
                        </div>
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ***** Client Feedback Area End ***** -->

    <!-- ***** CTA Area Start ***** -->
    <section class="our-monthly-membership section_padding_50 clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="membership-description">
                        <h2>Join our Monthly Membership</h2>
                        <p>Find the perfect plan for you — 100% satisfaction guaranteed.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
                        <a href="#">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** CTA Area End ***** -->

    <!-- ***** Our Team Area Start ***** -->
    {{-- <section class="our-Team-area bg-white section_padding_100_50 clearfix" id="team">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Our Team</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="img/team-img/team-1.jpg" alt="">
                            <div class="team-hover-effects">
                                <div class="team-social-icon">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="member-text">
                            <h4>Jackson Nash</h4>
                            <p>Tax Advice</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="img/team-img/team-2.jpg" alt="">
                            <div class="team-hover-effects">
                                <div class="team-social-icon">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="member-text">
                            <h4>Alex Manning</h4>
                            <p>CEO-Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="img/team-img/team-3.jpg" alt="">
                            <div class="team-hover-effects">
                                <div class="team-social-icon">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="member-text">
                            <h4>Ollie Schneider</h4>
                            <p>Business Planner</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="img/team-img/team-4.jpg" alt="">
                            <div class="team-hover-effects">
                                <div class="team-social-icon">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="member-text">
                            <h4>Roger West</h4>
                            <p>Financer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ***** Our Team Area End ***** -->

    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Get in touch with us!</h2>
                        <div class="line-shape"></div>
                    </div>
                    <div class="footer-text">
                        <p>We'll send you epic weekly blogs, whitepapers and things to make your app startup thrive, all FREE!</p>
                    </div>
                    <div class="address-text">
                        <p><span>Address:</span> Kathmandu, Nepal</p>
                    </div>
                    <div class="phone-text">
                        <p><span>Phone:</span> </p>
                    </div>
                    <div class="email-text">
                        <p><span>Email:</span> encoderslab@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Form Start-->
                    <div class="contact_from">
                        <form action="#" method="post">
                            <!-- Message Input Area Start -->
                            <div class="contact_input_area">
                                <div class="row">
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your E-mail" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Your Message *" required></textarea>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <button type="submit" class="btn submit-btn">Send Now</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Message Input Area End -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-social-icon text-center section_padding_70 clearfix">
        <!-- footer logo -->
        <div class="footer-text">
            <h2>Social Links</h2>
        </div>
        <!-- social icon-->
        <div class="footer-social-icon">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="active fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        </div>
        <div class="footer-menu">
            <nav>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- Foooter Text-->
        <div class="copyright-text">
            <!-- ***** Removing this text is now allowed! This template is licensed under CC BY 3.0 ***** -->
            <p>Copyright ©2017 iPasal. Designed by <a href="https://encoderslab.com" target="_blank">Encoderslab</a></p>
        </div>
    </footer>
    <!-- ***** Footer Area Start ***** -->

    <!-- Jquery-2.2.4 JS -->
    <script src="{{ asset('themes/1/landing_page/js/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('themes/1/landing_page/js/popper.min.js') }}"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="{{ asset('themes/1/landing_page/js/bootstrap.min.js') }}"></script>
    <!-- All Plugins JS -->
    <script src="{{ asset('themes/1/landing_page/js/plugins.js') }}"></script>
    <!-- Slick Slider Js-->
    <script src="{{ asset('themes/1/landing_page/js/slick.min.js') }}"></script>
    <!-- Footer Reveal JS -->
    <script src="{{ asset('themes/1/landing_page/js/footer-reveal.min.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('themes/1/landing_page/js/active.js') }}"></script>
</body>

</html>
