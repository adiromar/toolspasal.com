@extends('layouts.app')
@section('content')
<div class="container" style="padding: 50px 0px">
    <div class="row">
    <div class="col-md-3">
        @include('partials.adminsidebar')
    </div>
    <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Messages</h5>
            <p class="card-text">
                <table class="table table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Review</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($reviews as $o)
                        <tr>
                            <td>{{$o->name}}</td>
                            <td>{{$o->email}}</td>
                            <td>{{$o->review}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </p>
          </div>
        </div>
    </div>
    </div>
</div>
@endsection
