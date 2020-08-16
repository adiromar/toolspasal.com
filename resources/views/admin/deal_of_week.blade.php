@extends('layouts.app')

@section ('content')

<div class="container" style="padding: 25px 15px">
	<h4>Admin Panel</h4>
	<div class="row">
				<div class="col-md-3">
					@if(Auth::user()->hasRoles('admin')){
						@include('admin.sidebar')
						@php
							$user_theme = 0;
							$deals_week = App\Product::orderBy('id','desc')->get();
						@endphp
					@else
						@include('partials.adminsidebar')
						@php
							$user_theme = Auth::user()->assign_theme;
							$deals_week = App\Product::where('theme_no', 'like', '%'.$user_theme.'%')->orderBy('id','desc')->get();
						@endphp
					@endif
				</div>
				<div class="col-md-9">
					<div class="card">
						<div class="card-body">
							<h4 class="mb-3">Manage Deal Of the Week</h4>
							<table class="display table table-condensed table-bordered" id="example1" style="width: 100%">
								<thead>
									<tr>
										
										<th></th>
										<th>Title</th>
										<th>Category</th>
                    					
										<th>Offer Ending Time / Enable Offer</th>
										<th>Offer Ends in</th>
										<th>Disable Offer</th>
										{{-- <th>Created</th> --}}
									</tr>
								</thead>
								<tbody>
								@foreach ($deals_week as $p)
									<tr>
										
										<td>
											<img src="{{asset('uploads/products/thumbnails/'.$p->featuredImage)}}" alt="Image" height="50" width="80">
										</td>
										<td>{{ $p->productName }}</td>
										<td>{{ $p->categoryName }}</td>

										

										<td>
											<form class="feat-class" action="{{route('make.deal_of_week')}}" method="post">
											{{csrf_field()}}
											<input type="datetime-local" name="offer_time" value="{{ $p->dow_datetime }}">	
											<input class="chk" type="checkbox" name="deal_of_week" value="{{$p->id}}" {{$p->deal_of_week==1 ? 'checked' : ''}}>
											
											<noscript><input type="submit"></noscript>
											</form>
										</td>
										<td>{{ $p->dow_datetime }}</td>
										<td>
											<form action="{{route('unmake.deal_of_week')}}" method="put">
											{{csrf_field()}}
											<input type="hidden" name="not_deal" value="{{$p->id}}" >
											
											<input type="submit" value="x" 
											style="border: none;color: white;background: #ff0000d1;cursor: pointer;height: 25px;padding: 0px 8px;">
											</form>
										</td>
										@php  $d = strtotime($p->updated_at); @endphp
										{{-- <td>{{ date( 'Y-M-d' , $d) }}</td> --}}
									</tr>
								@endforeach
								</tbody>
							</table>

						</div>
					</div>
				</div>
	</div>
</div>


@endsection
