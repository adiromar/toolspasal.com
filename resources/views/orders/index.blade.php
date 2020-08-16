@extends('layouts.app')
@section('content')
<div class="container" style="padding: 25px 15px">
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
            <h5 class="card-title">Products</h5>
            <p class="card-text">
                <table class="table table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Phone No.</th>
                            <th>Delivery Address</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $o)
                        <tr>
                            <td>{{ $o->product->title }}</td>
                            <td>{{ $o->name }}</td>
                            <td>{{ $o->user_email }}</td>
                            <td>{{ $o->phone }}</td>
                            <td>{{ $o->address }}</td>
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
