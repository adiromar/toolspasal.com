@extends('layouts.app')
@section('content')
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
                <div class="card-header">
                    <strong>Manage Categories:</strong>
                    <a href="{{ route('categories.create') }}" class="btn btn-info btn-sm">Add New <i class="fa fa-plus"></i></a>
                </div>
                <hr>
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example" class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Is Parent?</th>
                                        <th>Parent Category</th>
                                        <th>#</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $cat)
                                    <tr>
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->slug }}</td>
                                        <td>
                                            {!! $cat->parent ? '<i class="fa fa-check" aria-hidden="true"></i>' : '-' !!}
                                        </td>
                                        <td>{{ $cat->parentID }}</td>
                                        <td>{{ $cat->products()->count() }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-danger">Edit</a>
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
        </div>
    </div>
</div>
@endsection
