@extends('layouts.app')

@section ('content')

<div class="container" style="padding: 25px 15px">
	<h4>Admin Panel</h4>
	<div class="row">
				<div class="col-md-3">
					@include('admin.sidebar')
				</div>
				<div class="col-md-9">
					<div class="card">
						<div class="card-body">
							<h4 class="mb-3">Client Theme Assign</h4>

							@php
							
							
								// dd($users1);
							@endphp	
							<table class="display table table-condensed table-bordered" id="example1" style="width: 100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Role</th>
										<th>Active/Suspended</th>
										<th>Assigned Theme</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($users as $user)
									<tr>
										<td>{{ $user->username }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->roles->first()->role }}</td>
										<td>{{ $user->suspend == 0 ? 'Active' : 'Suspended' }}</td>
										<td>{{ $user->assign_theme }}</td>
										<td>
											<form class="feat-class" action="{{route('make.theme_assign')}}" method="post">
											{{csrf_field()}}
												
											<select name="theme_assign" class="chk form-control" id="th_assign">
												<option value="">Choose Theme for Client</option>
												<option value="1">Theme 1</option>
												<option value="2">Theme 2</option>
												<option value="3">Theme 3</option>
												<option value="4">Theme 4</option>
												<option value="5">Theme 5</option>
												<option value="7">Theme 7</option>
												<option value="8">Theme 8</option>
											</select>
											<input type="hidden" name="user_id" value="{{ $user->id }}">
											<noscript><input type="submit"></noscript>
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
