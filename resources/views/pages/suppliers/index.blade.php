@extends ('layouts.main')

@section ('metas')
<title>Suppliers | Sastoshowroom</title>
<meta name="keywords" content="Sastoshowroom, Suppliers, Products">
<meta property="og:description" content="Suppliers those who are associated with Sastoshowroom.com">
<meta property="og:title" content="Suppliers | Sastoshowroom">
<meta property="og:type" content="website">
<meta property="og:url" content="{{'https://www.sastoshowroom.com/suppliers/'}}">
<meta property="og:image" content="{{asset('uploads/suppliers/1534401417302144.png')}}">
<meta property="og:image:width" content="800" />
<meta property="og:image:height" content="600" />
<meta property="og:image:alt" content="Suppliers" />
<link rel="canonical" href="https://www.sastoshworoom.com/index.php/suppliers/" />
@endsection

@section('styles')

<style>
	.supp-top{
		padding: 50px 20px;
	}
	@media (max-width: 567px) {
		.supp-top{
			padding-top: 100px;
		}
	}
</style>

@endsection

@section ('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 supp-top">
			<h3>Our Suppliers:</h3>
			<hr style="margin: 30px 0px 30px 0px;border:1px solid DodgerBlue;">
			<div class="row">
			@foreach ($users as $user)
				@if($user->supplier)
					@if(!empty($user->roles->first()) && $user->roles->first()->role != 'Admin' )
					<div class="col-md-3 mb-3">
						<div class="card">
						  <a href="{{ route('view.supplier', [$user->id, $user->name]) }}">
						  	<img class="card-img-top" style="height: 185px" src="{{ asset($user->supplier->image) }}" alt="Suppliers">
						  </a>
						  <div class="card-body">
						    <a href="{{ route('view.supplier', [$user->id, $user->name]) }}">
						    	<h5 class="card-title" style="height: 45px">{{ $user->supplier->detail }}</h5>
						    </a>
						    <a href="{{ route('view.supplier', [$user->id, $user->name]) }}" class="btn btn-success">View</a>
						  </div>
						</div>
					</div>
					@endif
				@endif
			@endforeach
			</div>

		</div>
	</div>
</div>

@endsection
