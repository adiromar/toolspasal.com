@extends('theme2.layouts.main')

{{-- @section('head')
    @include('theme5.layouts.head')
@endsection --}}

<style>
    @media only screen and (max-width: 768px) {
  /* For mobile phones: */
  .404_image img{
      height: 200px;
  }
}
</style>
@section('content')
    

<div class="container text-center pb-4">
    <div class="logo-404">
        <a href="{{ url('/') }}"><img src="{{ asset('themes/5/images/home/logo.png') }}" alt="" /></a>
    </div>
    <div class="content-404">
        <img src="{{ asset('themes/5/images/404/404.png') }}" class="img-responsive" alt="" />
        <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
        <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
        <h2><a href="{{ url('/') }}">Bring me back Home</a></h2>
    </div>
</div>
@endsection



