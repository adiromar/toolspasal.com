@extends ('layouts.main')

@section('metas')
  <title>{{ ucfirst($catname->name) }} | Sastoshowroom.com</title>
  <meta name="description" content="Category: {{ ucfirst($catname->name) }} | Sastoshowroom.com">
  <meta name="keywords" content="Category,{{ ucfirst($catname->name) }}">
  <meta name="author" content="Sastoshowroom.com">
  <meta property="og:url" content="https://www.sastoshowroom.com/category/{{$catname->slug}}" />
  <meta property="og:title" content="Sastoshowroom" />
  <meta property="og:image" content="https://sastoshowroom.com/image/logoname.png" />
  <meta property="og:description" content="Category: {{ ucfirst($catname->name) }} | SASTOSHOWROOM" />
  <link rel="canonical" href="https://www.sastoshowroom.com/category/{{$catname->slug}}" />

@endsection

@section('styles')
<style>
.filter a{color: brown;font-weight: 600;}
.active-category{color: black;font-weight: 500;}
.pagination li{border: 1px solid lightgrey;padding: 3px 10px;font-size: 19px;}
.pagination .active{background-color: DodgerBlue;color: white;}
.cat-bar{padding-top: 12px !important;color: black;	}
.cat-bar li{border-radius: 0px;border-top-left-radius: 0px;border-top-right-radius: 0px;border-left: 0px;border-right: 0px;}
.cat-bar a{color: grey;	font-size: 17px;}
.cat-wrapper{ padding: 3rem 3rem;}
#from-location select{ padding:5px 20px; width: 100%;}
.off{ position:absolute;top:14px;right:19px;background-color:#dc2727;color:white;padding-left:8px;padding-right:8px;padding-top: 2px;
  padding-bottom: 2px;font-size: 14px; }
@media (max-width:567px) { .cat-wrapper{padding-top: 6rem; }.prod{display: none;}.filter{padding: 10px 0px 0px 30px;}#from-location select{ margin-top: 15px;margin-right: 5px;} }
</style>


@endsection

@section ('content')

<header>
	<div class="container-fluid cat-wrapper">
		<div class="row">
			
			@include( 'pages.partials.front-sidebar' )

			<div class="col-sm-12 col-md-9 col-lg-9">
				<div class="best-selling wow fadeIn">
					<div class="row">
						<div class="col-md-12"><h5>{{$catname->name}}</h5></div><br>
						<br>
						<div class="col-md-4 filter">
							<span><i>Price: </i></span>&nbsp;
							<a href="{{ route('category.product', [$catname->slug, 'sort' => 'low_high']) }}">Low to High</a> |
							<a href="{{ route('category.product', [$catname->slug, 'sort' => 'high_low']) }}">High to Low</a>
						</div>
						<div class="col-md-4 filter">
							<span><i>Rating: </i></span>&nbsp;
							<a href="{{ route('category.product', [$catname->slug, 'rating' => 'high_low']) }}">High to Low</a> |
							<a href="{{ route('category.product', [$catname->slug, 'rating' => 'low_high']) }}">Low to High</a>
						</div>
						<div class="col-md-4">
							<form id="from-location" action="{{route('product.location')}}" method="post">
								{{ csrf_field() }}
								<select name="location" style="padding:5px 20px; width: 100%">
									<option value=""><i>Location :-</i></option>
									@foreach(DB::table('zones')->get() as $d)
									   <option value="{{$d->district}}">{{ucfirst($d->district)}}</option>
                 		 			@endforeach
								</select>
								<input type="hidden" name="cat_id" value="{{ $catname->id }}">
								<noscript><input type="submit" name="submit" value="submit"></noscript>
							</form>
						</div>
					</div>

					<div class="row pt-3">
					@if(count($products) > 0)
						@foreach ($products as $product)
						@if($product->user->suspend == 0)
							<div class="col-12 col-sm-6 col-lg-4 col-md-6 wow fadeInRight">
								<div class="best-cover">
									<div class="best-img">
										<a href="{{route('view.product', [$product->slug])}}"><img  src="{{asset('uploads/products/'.$product->featuredImage)}}"></a>
										@if($product->discountPercent)
		        						<span class="off">
		        							{{ $product->discountPercent }} Off
		        						</span>
		        						@endif
									</div>
									<div class="best-info">
										<a href="{{route('view.product', [$product->slug])}}">
											<h6 style="height: 40px;">{{$product->productName}}</h6>
										</a>
										<p><b>NRS - {{ $product->rate }}/-</b></p>
									</div>
									<div class="best-but">
										<div class="best-but">
											<a role="button" href="{{route('view.product', [$product->slug])}}" ><i class="fas fa-eye"></i> View</a>
											<a href="" class="order-btn" data-product-id="{{$product->id}}" data-user-id="{{$product->user->id}}" data-product-slug="{{$product->slug}}">Direct Order</a>
										</div>
									</div>
								</div>
							</div>
							@endif
						@endforeach
					@else
						<p style="font-size: 15px" class="p-5">There are no items related to this category at the moment.</p>
					@endif
					</div>
					<div class="row">
						<div class="col-md-12">
							{{ $products->links() }}
						</div>

					</div>
				</div>
			</div>
		</div>
	</header>

@endsection

@section('scripts')

<script type="text/javascript">

		$('#from-location').change(function(e){
			e.preventDefault();
			$(this).submit();
		});

</script>

@endsection
