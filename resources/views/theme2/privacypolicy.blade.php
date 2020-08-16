@extends('theme2.layouts.main')

@section('menu')

	@include('theme2.layouts.headmenu')

@endsection

@section('content')


<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="">Privacy Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="shopping-cart section">
	<div class="container">
		<div class="row">
			<div class="col-12">
	
				{!! App\Setting::first() ? App\Setting::first()->privacyPolicy : '' !!}

			</div>
		</div>
	</div>
</div>


@endsection