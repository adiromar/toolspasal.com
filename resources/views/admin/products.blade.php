@extends('layouts.app')

@section ('content')

<div class="container" style="padding: 25px 15px">
	<h4>Admin Panel</h4>
	<div class="row">
				<div class="col-md-3">
					{{-- @include('admin.sidebar') --}}
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
							<table id="example" class="display table table-condensed table-bordered" style="width: 100%">
								<thead>
									<tr>
										<th></th>
										<th>Title</th>
										<th>Supplier</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
								@foreach (App\Product::orderBy('id','desc')->get() as $p)
									<tr>
										<td>
											<img src="{{asset('uploads/products/thumbnails/'.$p->featuredImage)}}" alt="Image" height="50" width="80">
										</td>
										<td>{{ $p->productName }}</td>
										<td>{!! $p->user->supplier ? $p->user->supplier->detail : '<p style="color:red">Profile Not added</p>' !!}</td>
										@php  $d = strtotime($p->updated_at); @endphp
										<!-- <td>{{ date( 'Y-M-d' , $d) }}</td> -->
										<td>
											<form action="{{route('products.destroy', $p->id)}}" method="post">
												{{ csrf_field() }}
												{{ method_field('delete') }}
												<input type="submit" class="delete-btn" value="Delete">
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
