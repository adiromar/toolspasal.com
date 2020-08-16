@extends('layouts.main')
@section ('styles')

<style media="screen">
	.off{ position:absolute;top:14px;right:19px;background-color:#dc2727;color:white;padding-left:8px;padding-right:8px;padding-top: 2px;
    padding-bottom: 2px;font-size: 14px; }
</style>

@endsection
@section('content')

<div class="container" style="padding-top: 50px">
	<div class="row">
		<div class="col-md-12" style="border-bottom: 3px solid DodgerBlue ">
			<h4 style="font-family: Roboto;">MORE PRODUCTS</h4>
		</div>
	</div>

	<div class="row pt-4">
		@foreach ($products as $p)
			<div class="col-12 col-sm-6 col-lg-3 col-md-3 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0s">
				<div class="best-cover">
					<div class="best-img">
						<a href="{{ route('view.product', [$p->slug]) }}"><img  src="{{asset('uploads/products/thumbnails/'.$p->image)}}"></a>
						@if($p->discount)
						<span class="off">
							{{ $p->discount }} Off
						</span>
						@endif
					</div>
					<div class="best-info">
						<a href="{{ route('view.product', [$p->slug]) }}"><h6>{{$p->title}}</h6></a>
						<p>NRS - {{$p->price}}/-</p>
					</div>
						<div class="best-but">
							<a role="button" href="{{ route('view.product', [$p->slug]) }}" ><i class="fas fa-eye"></i> VIEW</a>
							<a href="" class="order-btn" data-product-id="{{$p->id}}" data-user-id="{{$p->user->id}}" data-product-slug="{{$p->slug}}">Direct Order</a>
						</div>
				</div>
			</div>
		@endforeach
	</div>
</div>



@endsection
