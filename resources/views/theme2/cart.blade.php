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
						<li class="active"><a href="{{ url('theme2/show-cart') }}">Cart</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<!-- <th class="text-center">UNIT PRICE</th> -->
								<!-- <th class="text-center">QUANTITY</th> -->
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
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
								<!-- <td class="price" data-title="Price"><span>{{ $item->model->rate }}</span></td> -->
								<!-- Input Order 
								<td class="qty" data-title="Qty">
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="1">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
								End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>{{ $item->model->rate }}</span></td>
								<td class="action" data-title="Remove"><a href="#" onclick="event.preventDefault();document.getElementById('remove-item-{{$item->rowId}}').submit();"><i class="ti-trash remove-icon"></i></a>
									<form id="remove-item-{{$item->rowId}}" action="{{ route('cart.destroy', $item->rowId) }}" method="post">
									{{csrf_field()}}
									{{ method_field('delete') }}
								</form></td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+ NRs. 50)</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span>{{Cart::subtotal()}}</span></li>
										<li>Shipping<span>Free</span></li>
										<li>You Save<span>50/-</span></li>
										<li class="last">You Pay<span>NRs. {{Cart::subtotal()}}/-</span></li>
									</ul>
									<div class="button5">
										<a href="{{ route('checkout.view2') }}" class="btn">Checkout</a>
										<a href="{{ url('/theme2') }}" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->

	@include('theme2.layouts.services')

@endsection

@section('footer')

<script></script>

@endsection