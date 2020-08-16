@extends('layouts.app')

@section ('content')

<div class="container" style="padding: 50px 0px">
	<h4>Admin Panel</h4>
	<div class="row">
		<div class="col-md-3">
			@include('admin.sidebar')
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-3"><i class="fa fa-rocket" style="color: black" aria-hidden="true"></i> &nbsp;Orders:</h4>
					<table id="example" class="table table-condensed table-bordered">
						<thead>
							<tr>
								<th>Name:</th>
								<th>Mobile:</th>
								<th>Address:</th>
								<th>Message:</th>
								<th>Created at:</th>	
							</tr>
						</thead>
						<tbody>
							@foreach ($orders as $o)
							<tr>
								<td> {{ $o->name }} </td>
								<td> {{ $o->phone }} </td>
								<td> {{ $o->address }} </td>
								<td> {{ $o->message }} </td>
								<td> {{ $o->created_at }} </td>						
							</tr>
							@endforeach() 
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection