@extends('theme2.layouts.main')

@section('menu')

	@include('theme2.layouts.headmenu')

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
						<li class="active"><a href="">Checkout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Checkout -->
<section class="shop checkout section">
	<div class="container">

		<form class="form" method="post" action="{{ route('checkout.theme2') }}">
			{{ csrf_field() }}

		<div class="row"> 
			

			<div class="col-lg-6 col-12">
				<div class="checkout-form">
					<h2>Make Your Checkout Here</h2>
					<p>Please register in order to checkout more quickly</p>
					<!-- Form -->
				
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Full Name<span>*</span></label>
									<input type="text" name="full_name" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Email Address<span>*</span></label>
									<input type="email" name="user_email" placeholder="For Ex. abc@gmail.com" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Phone Number<span>*</span></label>
									<input type="text" name="number" placeholder="" required="required">
								</div>
							</div>
							{{-- <div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Country<span>*</span></label>
									<input type="text" name="country">
								</div>
							</div> --}}
							{{-- <div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>State<span>*</span></label>
									<input type="text" name="state">
								</div>
							</div> --}}
							{{-- <div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Address<span>*</span></label>
									<input type="text" name="address" placeholder="" required="required">
								</div>
							</div> --}}
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Address<span>*</span></label>
									<input type="text" name="delivery_address" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Postal Code</label>
									<input type="text" name="post" placeholder="">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group create-account">
									<input id="cbox" type="checkbox">
									<label>Create an account?</label>
								</div>
							</div>
						</div>
					{{-- </form> --}}
					<!--/ End Form -->
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="order-details">
					<!-- Order Widget -->
					<div class="cart-widget">
						<table class="table shopping-summery">
							<thead>
								<tr class="main-hading">
									<th>PRODUCT</th>
									<th>NAME</th>
									<th class="text-center">TOTAL</th> 
								</tr>
							</thead>
							<tbody>
							@foreach (Cart::content() as $item)
								<tr>
									<td class="image" data-title="PRODUCT"><img src="{{asset('uploads/products/thumbnails/'.$item->model->featuredImage)}}" alt="#"></td>
									<td class="product-des" data-title="Description">
										<p class="product-name"><a href="{{ route('view.product.new2', $item->model->slug) }}">{{ $item->model->productName }}</a></p>
										<p class="product-des">{{ $item->model->categoryName }}</p>
									</td>
									<td class="total-amount" data-title="Total"><span>{{ $item->model->rate }}</span></td>
								<input type="hidden" name="product_id[]" value="{{ $item->model->id }}">
								<input type="hidden" name="supplier_id[]" value="{{ $item->model->user_id }}">
								<input type="hidden" name="username" value="{{ Auth::user()->username }}">

								<input type="hidden" name="theme_no" value="2">
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					<div class="single-widget">
						<h2>CART  TOTALS</h2>
						<div class="content">
							<ul>
								<li>Sub Total<span>{{Cart::subtotal()}}/-</span></li>
								<li>(+) Shipping<span>Free</span></li>
								<li class="last">Total<span>NRs. {{Cart::subtotal()}}/-</span></li>
							</ul>
						</div>
					</div>
					<!--/ End Order Widget -->
					<!-- Order Widget -->
					<div class="single-widget">
						<h2>Payments</h2>
						<div class="content">
							<div class="checkbox">
								<label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label>
								<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash On Delivery</label>
								<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label>
							</div>
						</div>
					</div>
					<!--/ End Order Widget -->
					<!-- Payment Method Widget -->
					<div class="single-widget payement">
						<div class="content">
							<img src="{{ asset('themes/2/images/payment-method.png') }}" alt="#">
						</div>
					</div>
					<!--/ End Payment Method Widget -->
					<!-- Button Widget -->
					<div class="single-widget get-button">
						<div class="content">
							<div class="button">
								<button class="btn"><input type="hidden" name="btnsubmit" class="btn" value="Proceed">Proceed</button>
								{{-- <a href="#" class="btn">proceed to checkout</a> --}}
							</div>
						</div>
					</div>
					<!--/ End Button Widget -->
				</div>
			</div>

		</div>
		</form>
	</div>
</section>
<!--/ End Checkout -->

	@include('theme2.layouts.services')

@endsection

@section('footer')

<script></script>

@endsection