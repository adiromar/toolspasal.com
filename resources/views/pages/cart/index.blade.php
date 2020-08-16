@extends('layouts.main')

@section('metas')

<title>Cart | Sastoshowroom</title>

@endsection

@section ('styles')

<style>
	.cart-btn1{
		border: 1px solid lightslategrey;
	    background: #bb1c1c;
	    padding: 5px 20px;
	    font-family: initial;
	    cursor: pointer;color: white;
	}
	.cart-btn2{
		border: none;
	    padding: 5px 20px;
	    background-color: mediumaquamarine;
	    font-family: serif;
	    cursor: pointer;
	}
</style>

@endsection

@section ('content')

<section class="p-5">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<b>{{Cart::count()}} item in your Cart</b>
				<br><br>
				<ul class="list-group list-group-flush">
				@foreach (Cart::content() as $item)
					<li class="list-group-item" style="border-top: 2px solid lightgrey;">
						<div class="row">
							<div class="col-md-2"><img src="{{asset('uploads/products/thumbnails/'.$item->model->image)}}" alt="Image" width="110" height="100"></div>
							<div class="col-md-4">
								<a href="{{ route('view.product', [$item->model->slug]) }}"><p><b>{{$item->name}}</b></p></a>
								<!-- <small class="pl-2">{{$item->model->detail}}</small> -->
								@if($item->model->delivery_charge)
									<small class="pl-2">
										@if($item->model->delivery_charge == 'Charge')
											{{$item->model->charge}}
										@elseif($item->model->delivery_charge == 'Sastoshowroom')
											Sastosowroom Delivery
										@else
											<b>Delivery:</b>
											{{$item->model->delivery_charge}}
										@endif
									</small>
								@endif
							</div>
							<div class="col-md-2">
							<form action="{{ route('cart.update', $item->rowId) }}" method="post" class="submit-form" >
								{{csrf_field()}}
								{{ method_field('PUT') }}
								<select name="item_count" class="form-control" style="display:none;">
									<?php for ($i=1; $i <= 10; $i++) { ?>
										<option value="{{$i}}" {{ $item->qty == $i ? 'selected' : '' }}>{{$i}}</option>
									<?php } ?>
								</select>
								<noscript><input type="submit" name="submit"></noscript>
							</form>

							</div>
							<div class="col-md-4">
								<form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
									{{csrf_field()}}
									{{ method_field('delete') }}
									<button type="submit" style="border: none;background: #ff450069;font-size: 13px;cursor: pointer;">Remove</button>
								</form>
								<p class="float-right">NRs. {{$item->subtotal}}/-</p>
							</div>
						</div>
					</li>
				@endforeach
				</ul>
				<div class="row p-3">
					<div class="col-md-12" style="background-color: #8080805c;padding: 20px">
						<div class="row">
							<div class="col-md-8">
								<p class="float-left">Delivery charge depending on  <br> product and suppliers.</p>
							</div>
							<div class="col-md-4">
								<p class="float-left"><b>Total</b></p>
								<p class="float-right">NRs. {{ Cart::subtotal() }}/-</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<a href="{{ url('/') }}"><button class="cart-btn1 float-left">Continue Shopping</button></a>
						<a href="{{ route('checkout.index') }}"><button class="cart-btn2 float-right">Proceed to Checkout</button></a>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</section>


@endsection

@section('scripts')

<script>
	$('.submit-form').change(function(){
		$(this).submit();
	});
</script>

@endsection
