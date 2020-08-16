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

							<h4 class="mb-3">Suspend/Block Users</h4>

              <form class="form" action="{{route('make.users.suspend')}}" method="post">
                {{csrf_field()}}
                <label><b>Suppliers:</b></label><br>

                <div class="row">
                @foreach($users as $user)
                  @if($user->profile)
                    <div class="col-md-4">
                      <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" {{ $user->suspend == 1 ? 'checked' : '' }}>
                       {{ $user->email }}
                    </div>
                  @endif
                @endforeach
                </div>
                <hr>
                <input type="submit" name="submit" value="Change" class="btn btn-warning">
              </form>

            </div>
          </div>
        </div>
  </div>
</div>

@endsection
