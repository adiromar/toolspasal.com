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
						<li class="active"><a href="{{ url('theme2/show-cart') }}">{{ $title }}</a></li>
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
								<th class="">PRODUCT IMAGE</th>
								<th class="float-left">PRODUCT NAME</th>
								<th class="text-center">Rate</th>
								
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center">Payment</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($data as $val)
							@foreach ($val as $item)
							<tr>
								<td class="image" data-title="PRODUCT"><img src="" alt=""></td>
								<td class="product-des" data-title="Description" style="padding: unset !important;">
									<p class="product-name"><a href="">{{ $item['productName'] }}</a></p>
									<p class="product-des">{{ $item['categoryName'] }}</p>
								</td>
								<td class="price" data-title="Price"><span>{{ $item['rate'] }}</span></td> 
								<td>
									<span>{{ $item['quantity'] }}</span>
								</td>
								<td class="total-amount" data-title="Total"><span>{{ $item['rate'] * $item['quantity'] }}</span></td>
								<td class="action" data-title="Remove">
								
								</td>
							</tr>

							@endforeach
						@endforeach
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
		
		</div>
	</div>
	<!--/ End Shopping Cart -->


@endsection

@section('footer')

<script></script>

@endsection