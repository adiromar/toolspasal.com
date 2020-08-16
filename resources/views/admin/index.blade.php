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
							<h4 class="mb-3">Manage Users</h4>
							<table id="example" class="table table-condensed table-bordered">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Role</th>
										<th>Active/Suspended</th>
									</tr>
								</thead>
								<tbody>
								@foreach ($users as $user)
									<tr>
										<td>{{ $user->username }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->roles->first()->role }}</td>
										<td>{{ $user->suspend == 0 ? 'Active' : 'Suspended' }}</td>
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
