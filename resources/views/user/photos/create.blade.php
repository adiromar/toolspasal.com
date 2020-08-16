@extends('layouts.main')

@section ('content')

<div class="container" style="padding: 50px 0px">
    <div class="row">
        <div class="col-md-3">
            @include('partials.adminsidebar')
        </div>
        <div class="col-md-9">
        	<div class="card">
              <div class="card-body">
                <h5 class="card-title">
                	<div class="row">
                		<div class="col-md-8">Add Photo</div>
                		<div class="col-md-4 pull-right">
							<a href="{{ route('photos.index') }}" class="btn btn-info">Go to Gallery</a>
                		</div>
                	</div>
                </h5>
                @include('errors.errors')
                <hr>
                <p class="card-text">
                	<form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label for="">Caption:</label>
                        <input type="text" name="title" class="form-control"> <br>
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control"> <br>
                        <input type="submit" name="submit" value="Add +" class="btn btn-danger">
                    </form>
                </p>
              </div>
        	</div>
    	</div>
	</div>
</div>	

@endsection