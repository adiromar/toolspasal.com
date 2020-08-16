@extends ('layouts.main')

@section('styles')
<style media="screen">
	.wrap{
		padding-top: 3rem;
	}
	.off{ position:absolute;top:14px;right:19px;background-color:#dc2727;color:white;padding-left:8px;padding-right:8px;padding-top: 2px;
    padding-bottom: 2px;font-size: 14px; }
	@media (max-width:567px) {
		.wrap{
			padding-top: 6rem;
		}
	}
</style>

@endsection

@section ('content')

<div class="container wrap pb-5">
	<h4>Search Results for:</h4>
	<p>"{{ $name }}" in "{{ $location }}"</p>
	<div class="row pt-5">
	@if(count($results) > 0)
		@foreach ($results as $product)
		<div class="col-12 col-sm-6 col-lg-3 col-md-3 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0s">
			<div class="best-cover">
				<div class="best-img">
					<a href="{{ route('view.product', [$product->slug]) }}"><img  src="{{ asset('uploads/products/'.$product->image) }}"></a>
					@if($product->discount)
					<span class="off">
						{{ $product->discount }} Off
					</span>
					@endif
				</div>
				<div class="best-info">
					<a href="{{ route('view.product', [$product->slug]) }}"><h5 style="font-size: 1rem;height: 40px;padding-top: 2px;">{{$product->title}}</h5></a>
					<p>NRs-{{ $product->price }} /-</p>
				</div>
				<div class="best-but">
					<div class="best-but">
						<a role="button" href="{{route('view.product', [$product->slug] )}}" >View</a>
						<a href="" class="order-btn" data-product-id="{{$product->id}}" data-user-id="{{$product->user_id}}" data-product-slug="{{$product->slug}}">Direct Order</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		@else
			<h6 class="pl-4">There are no such records in our database.</h6>
		@endif
	</div>
</div>

@endsection
