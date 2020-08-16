@extends('layouts.app')
@section('content')
<div class="container" style="padding: 25px 15px">
    <div class="row">
    <div class="col-md-3">
        @include('partials.adminsidebar')
    </div>
    <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Products</h5>
            <p class="card-text">
                <table class="table table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Supplier</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $p)
                        <tr>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->user->name }}</td>
                            <td>NRs. {{ $p->price }}</td>
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
