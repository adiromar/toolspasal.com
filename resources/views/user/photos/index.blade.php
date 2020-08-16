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
                		<div class="col-md-8">Photo Gallery</div>
                		<div class="col-md-4 pull-right">
							<a href="{{ route('photos.create') }}" class="btn btn-success">Add New +</a>
                		</div>
                	</div>
                </h5>
                @include('errors.errors')
                <hr>
                <p class="card-text">
                	@if (count($photos) > 0)
                        <div class="row">
                            @foreach ($photos as $p)
                            <div class="col-md-4">
                                <img src="{{ asset($p->image) }}" alt="" height="150" width="200">
                                <form action="{{ route('photos.destroy', $p->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-sm btn-warning delete-btn" value="Delete">
                                </form>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <h6>No photos at the moment. Upload new.</h6>
                    @endif
                </p>
              </div>
        	</div>
    	</div>
	</div>
</div>	

@endsection

@section ('scripts')
<script>
    $('.delete-btn').click(function(e){
        if (!window.confirm('Are you sure you want to delete?')) {
            e.preventDefault();
        }
    });    
</script>


@endsection