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

							<div class="card-header">
                                <strong>All Due Bill:</strong>
                                <a href="" class="btn btn-info btn-sm">Add New <i class="fa fa-plus"></i></a>
                            </div>
                            <hr>
							<table class="display table table-condensed table-bordered" id="example1" style="width: 100%">
								<thead>
									<tr>
										
										<th></th>
										<th>Month</th>
										<th>Due Amount</th>
                    					
										<th>Status</th>
										<th>Created at</th>
									</tr>
								</thead>
								<tbody>
								@foreach ($bill as $p)
									<tr>

										<td>{{ $p->month }}</td>
										<td>{{ $p->due_amount }}</td>
                                        <td>{{ $p->status }}</td>
                                        <td>{{ $p->created_at }}</td>
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
