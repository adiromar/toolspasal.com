@extends('layouts.app')

@section ('content')

<div class="container" style="padding: 25px 15px">
	<h4>Admin Panel</h4>
	<div class="row">
				<div class="col-md-3">
					@if(Auth::user()->hasRoles('admin')){
						@include('admin.sidebar')
					@else
						@include('partials.adminsidebar')
					@endif
				</div>
				<div class="col-md-9">
					<div class="card">
						<div class="card-body">
							<h4 class="mb-3">Manage Products</h4>
							<table class="display table table-condensed table-bordered" style="width: 100%">
								<thead>
									<tr>
										<th>Title</th>
										<th>Supplier</th>
                    					<th>Created</th>
										<th>Feature</th>
										<th>Unfeature</th>
									</tr>
								</thead>
								<tbody>
								@foreach (App\Product::orderBy('id','desc')->get() as $p)
									<tr>
										<td>{{ $p->title }}</td>
										<td>{{ $p->user->name }}</td>
										@php  $d = strtotime($p->updated_at); @endphp
										<td>{{ date( 'Y-M-d' , $d) }}</td>

										<td>
											<form class="feat-class" action="{{route('make.featured')}}" method="post">
											{{csrf_field()}}
											<input class="chk" type="checkbox" name="featured" value="{{$p->id}}" {{$p->featured==1 ? 'checked' : ''}}>
											
											<noscript><input type="submit"></noscript>
											</form>
										</td>

										<td>
											<form action="{{route('unmake.featured')}}" method="post">
											{{csrf_field()}}
											<input type="hidden" name="notfeatured" value="{{$p->id}}" >
											
											<input type="submit" value="x" 
											style="border: none;color: white;background: #ff0000d1;cursor: pointer;height: 25px;padding: 0px 8px;">
											</form>
										</td>
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
