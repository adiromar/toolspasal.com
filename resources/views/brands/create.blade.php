@extends('layouts.app')
@section('content')
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
                    <strong>Create a Brand:</strong>
                    <small>Inputs with * are required.</small>
                </div>
                <hr>
                @include('errors.errors')
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Brand Name*:</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="0">Deactive</option>
                                                <option value="1" selected>Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <input type="submit" name="create" value="Create" class="btn btn-primary">
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
              </div>
        </div>
        </div>
    </div>
</div>
@endsection
