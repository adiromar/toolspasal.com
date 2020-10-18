@extends('theme2.layouts.main')

@section('menu')

	@include('theme2.layouts.headmenu')

@endsection

@section('breadcrumbs')


<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="{{ url('/') }}">Order Success</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

@endsection

@section('content')

<!-- Start Contact -->
<section id="contact-us" class="contact-us section">
	<div class="container">
			<div class="contact-head">
				<div class="row">
					@if (Session::has('info'))
                            <div class="col-md-12 col-sm-12 text-center">
                                <img src="{{ asset('themes/2/cart-check.png') }}" height="200" width="" style="height: 200px;">
                            </div>
                            
                            <div class="col-12 col-md-12 text-center mt-4">
                                <strong>{{ Session::get("info") }}</strong>
                                <p>Continue Shopping <a href="{{ url('/') }}">Here</a></p>
                            </div>

                            @endif
				</div>
			</div>
		</div>
</section>
<!--/ End Contact -->

@endsection
