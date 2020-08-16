@extends('layouts.main')

@section('metas')

<title>Checkout | Sastoshowroom</title>

@endsection

@section('styles')

<style>
	.checkout hr{
		width: 120px;
		border: 1px solid grey;
		margin-left: 0;
	}
	.myerror{
		color: red;
	}
	.checkout-wrapper{
		padding: 3rem;
	}
</style>
@endsection

@section ('content')

<section class="checkout-wrapper">
	<div class="container pl-5 pr-5">
		<div class="row">
			<div class="col-md-12 checkout">
				<hr>
				<h5>CHECKOUT</h5>
				<hr>
				@if($errors)
					@foreach ($errors->all() as $e)
						<small class="myerror">{{$e}}</small><br>
					@endforeach
				@endif
			</div>
		</div>
		<div class="row pt-3">
			@guest
			<div class="col-md-6">
				<div style="border:1px solid lightgrey; padding: 20px;text-align:center;margin-top:50px;">
					<p class="order-now">कृपया <b>अर्डर</b> को लागि फेसबुक लगइन गर्नुहोस्</p>
					<div class="text-center pt-4">
						<button class="review-btn"><a href="{{ route('facebook.login') }}">Login with FACEBOOK</a></button>
					</div>
				</div>
			</div>
			@else
			<div class="col-md-6">
				<!-- <p style="padding: 0px;font-weight: 600"><i>Delivery Details</i></p><br> -->
				<form id="chkform" action="{{ route('checkout.store') }}" method="post">
					{{csrf_field()}}
					<label for="" style="line-height: 30px"><b>{{Auth::user()->name}} जी,
						&nbsp;अर्डर को लागि कृपया सम्पर्क फोन नम्बर र  डेलिवरी स्थान भर्नुहोस् ।</b></label><br>
						<div class="row">
							<div class="col-md-12 pt-3">
								<label for="">सम्पर्क फोन न. :-</label>
								<input type="text" name="number" class="form-control">
							</div>
						</div><br>
						@if(Auth::user()->email == 'default@example.com')
							<label for="">ईमेल :-</label>
							<input type="text" class="form-control" name="user_email"><br>
						@else
							<input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
						@endif
						<label for="">डेलिवरी ठेगाना :-</label>
						<input type="text" name="delivery_address" class="form-control"><br>
						<input type="hidden" name="username" value="{{ Auth::user()->name }}">
					@foreach (Cart::content() as $item)
						<input type="hidden" name="product_id[]" value="{{$item->model->id}}">
						<input type="hidden" name="supplier_id[]" value="{{ $item->model->user_id }}">
					@endforeach
					<input type="submit" id="order-submit" value="Get Order" class="btn btn-block btn-sm btn-primary">
				</form>
			</div>
			@endguest

			<div class="col-md-5 offset-md-1">
				<p style="padding: 0px;font-weight: 600"><i>Your Order</i></p><br>
				<ul class="list-group list-group-flush">
				@foreach (Cart::content() as $item)
					<li class="list-group-item" style="border-top: 2px solid lightgrey;">
						<div class="row">
							<div class="col-md-2"><img src="{{url('uploads/products/thumbnails/'.$item->model->image)}}" alt="Image" width="60" height="60"></div>
							<div class="col-md-4">
								<a href="{{ route('view.product', [$item->model->slug]) }}"><p><b>{{$item->name}}</b></p></a>
								<!-- <small class="pl-2">{{$item->model->detail}}</small> -->
							</div>
							<div class="col-md-2">
							<p style="border: 1px solid lightgrey;text-align: center;">{{ $item->qty }}</p>
							</div>
							<div class="col-md-4">
								<p class="float-right">NRs. <b>{{$item->subtotal}}/-</b></p>
							</div>
						</div>
					</li>
				@endforeach
				</ul>
				<div class="row p-3">
					<div class="col-md-12" style="background-color: #8080805c;padding: 20px">
						<div class="row">
							<div class="col-md-6">
								<p class="float-left"><b>Total</b></p>
							</div>
							<div class="col-md-6">
								<p class="float-right">NRs. <b>{{ Cart::subtotal() }}/-</b></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section ('scripts')

<script>
	$('#order-submit').click(function(e){
		$(this).prop('disabled', true);
		$('#chkform').submit();
	});
</script>

@endsection
