@extends('layouts.app')

@section('styles')

<style media="screen">
  iframe{
    width: 90%;
  }
</style>
@endsection

@section ('content')

<div class="container" style="padding: 50px 0px">
    <div class="row">
        <div class="col-md-3">
            @include('partials.adminsidebar')
        </div>
        <div class="col-md-9">
        	<div class="card">
              <div class="card-body">
                @include('errors.errors')
                <form class="form" action="{{route('videos.store')}}" method="post">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-8">
                      <label for="" style="font-weight:600">Add correct youtube URL.</label><br>
                      <label for="">Title (optional)</label>
                      <input type="text" name="title" value="" class="form-control"><br>
                      <label for="">URL:</label>
                      <input type="url" name="url" class="form-control" placeholder="Eg. https://www.youtube.com/watch?8M7eHdfrny4">
                      <label for="">&nbsp;</label><br>
                      <button type="submit" class="btn btn-info" name="submit">Add Video</button>
                    </div>
                  </div>
                </form>

                <hr>

                <h5>Your videos</h5>
                <hr style="border: 1px solid blue;">
                <p class="card-text">
                	@if (count($videos) > 0)
                        <div class="row">
                            @foreach ($videos as $p)
                            <div class="col-md-4">
                              {!! $p->url !!}
                                <p>{{$p->title}}</p>
                                <form action="{{ route('videos.destroy', $p->id) }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <input type="submit" class="btn btn-sm btn-warning delete-btn" value="Delete">
                                </form>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <h6>No videos at the moment. Upload new.</h6>
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
