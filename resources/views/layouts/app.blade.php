<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		@yield('metas')
		<meta name="viewport" content="width=device-width, initial-scale=1" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <title>Toolspasal.com | Admin Section</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <style>
      label { font-weight: 500; }
      small{ display: block;color: brown;font-weight: 500;margin-top: 5px;}
      .alert-danger { padding: 10px 0px 0px 0px; }
      .edit-btn, .edit-btn:hover{ padding: 1px 10px;background-color:#28a745;color:white; }
      .delete-btn{ font-size: 14px;margin-top: 5px;border:none; }
      .fa-trash{ color: darkred; }
      .btn-addmore, .btn-addmore:hover{ background-color: #31485d; color: white; padding: 2px 4px 2px 4px; font-size: 14px; }
      .contacts .contact{ margin-bottom: 10px; }
    </style>
  </head>
  <body style="background:whitesmoke">
    <nav>
      <div id="show-top" class="container-fluid" style="border-bottom: 1px solid lightgrey;">
				<div  class="row">
					<div class="col-sm-3 col-md-2 col-lg-2 logo-cover">
						<img class="logo-size" src="{{ asset('image/39554.svg') }}">
					</div>
					<div class="col-sm-9 col-md-7 col-lg-6 nav-cover">
						<ul class="nav ">
							<li class="nav-item nav-effect">
								<a class="nav-link active link-color" href="{{url('/')}}">Home</a>
							</li>
              @auth
                @if(Auth::user()->roles()->first()->role == 'Admin') 
                <li class="nav-item nav-effect">
                  <a class="nav-link link-color" href="{{url('suppliers')}}">Suppliers</a>
                </li>
                @endif
                
              @else
              @endauth 
						</ul>
					</div>
					@guest
					<div class="col-sm-12 col-md-3 col-lg-4 pr-3 but-login">
						<a href="{{ route('cart.index') }}">Cart<span class="badge badge-light ml-1">{{Cart::instance('default')->count()}}</span></a>
						<a href="{{ route('login') }}" role="button">Login</a>
						<a href="{{ route('login') }}" role="button">SignUp</a>
					</div>
					@else
					<div class="col-sm-12 col-md-3 col-lg-4 pr-3 but-login">
						{{-- <a href="{{ route('cart.index') }}">Cart<span class="badge badge-light ml-1">{{Cart::instance('default')->count()}}</span></a> --}}

						@if(Auth::user()->roles()->first()->role == 'Guest')
						@else
              {{-- <a href="{{ url('admin') }}" role="button">Dashboard</a> --}}
              
              <a href="{{ url('admin/showorders_new') }}" role="button">Orders</a>
              <a href="{{ url('admin/paid-orders') }}" role="button">Paid Orders</a>
						@endif

						<a href="{{ route('logout') }}" role="button" class="log-out"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </div>
					@endguest
				</div>
			</div>
    </nav>

    @yield('content')
    
    <div class="row">
      <div class="col-lg-12 col-sm-12 col-md-12" style="padding-top: 100px">
        <div class="footer-copyright wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
          {{-- <p>CopyRight ©2017 Sasto Showroom Pvt Ltd . To report complaints, please contact us.</p> --}}
          <div class="footer__copyright__text" style="text-align: center;"><p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://encoderslab.com" target="_blank">Encoderslab.com</a>
           </p></div>
        </div>
      </div>
    </div>

  	<script async type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  	<script async src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script async type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  	<script async src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.10.0/basic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    
  	<script>

      @if (Session::has('success'))
          toastr.success('{{ Session::get("success") }}');
      @endif
      @if (Session::has('info'))
          toastr.info('{{ Session::get("info") }}');
      @endif

  		$(document).ready(function() {
  		    $('#example').DataTable();
          // CKEDITOR.replace( 'specification' );
  		} );

      $(document).ready(function() {
  		    // $('#example1').DataTable();
          // CKEDITOR.replace( 'specification' );
          $('#order_tbl').DataTable();
  		} );

      $(document).ready(function() {
        $('#paidorder_tbl').DataTable();
  		} );

      $(document).ready(function() {
  		    $('#example2').DataTable();
          // CKEDITOR.replace( 'specification' );
  		} );

      $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
      });
      
      $(document).ready(function() {
        $('.add-btn').click(function(e){
          e.preventDefault();
          $('#to_append').append("<div class='col-md-3 col-sm-4'>\
                                    <input type='text' name='keywords[]' class='form-control'>\
                                  </div>");
        });

        $('#delivery_charge').change(function(){
          $('#to_append_charge').empty();
          var a = $(this).val();
          if (a == 'Charge') {
            $('#to_append_charge').append('<label>Charge Information:</label><textarea class="form-control" name="charge"></textarea>');
          }
        });

        
        $('#product-submit').click(function(){
            $(this).prop('disabled', true);
            $('#product-form').submit();
        });

        $('.chk').change(function(){
          $(this).closest("form").submit();
        });
        $('.fa-window-close').change(function(){
          $(this).closest("form").submit();
        });

        $('#btn-addmore').click(function(e){
          e.preventDefault();

          $(this).closest('.contacts').find('.appendhere').append(`
            <div class="row contact">
              <div class="col-md-4">
                  <input type="text" name="name[]" class="form-control">
              </div>
              <div class="col-md-4">
                  <input type="text" name="contactNo[]" class="form-control">
              </div>
              <div class="col-md-4">
                  <input type="text" name="location[]" class="form-control">
              </div>
            </div>
          `);

        });

      });

    </script>
  </body>
</html>
