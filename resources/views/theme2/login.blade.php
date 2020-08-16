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
						<li><a href="{{ url('theme2') }}">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="">Login / Register</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="shopping-cart section" style="border-top: 1px solid lightgrey">
	<div class="container">
		<div class="row">
			<div class="col-12">
	
				@include('theme2.layouts.login-form')

			</div>
		</div>
	</div>
</div>

@endsection

@section('head')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<style>
.terms{
	border: 1px solid lightgrey;
    height: 500px;
    overflow-y: scroll;
    padding: 30px;
    background-color: white;
    width: 68%;
    font-size: 13px;
}	
@media (max-width: 560px) {
	.terms{
		height: 350px;
		width: 100%;
		font-size: 12px;
	}
}
</style>

@endsection

@section('footer')

<script async type="text/javascript" src="{{ asset('js/main.js') }}"></script>

@endsection