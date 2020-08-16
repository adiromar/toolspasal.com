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
                    <strong>Create New Slider:</strong>
                </div>
                @include('errors.errors')
                <hr>
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            
                        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Main Text</label>
                                <textarea name="textMain" rows="3" class="form-control">{{ old('textMain') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Secondary Text</label>
                                <input type="text" name="textSecondary" class="form-control" value="{{ old('textSecondary') }}">
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Slider Image</label>
                                        <input type="file" name="sliderImage" id="file_slider" class="form-control">
                                        <p class="slider-error" style="color: blue;"></p>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Select Category</label>
                                        <select name="category" class="form-control">
                                        @foreach ( $categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Select Product</label>
                                        <select name="product_id" class="form-control" required>
                                            <?php $prod = App\Product::latest()->get(); ?>
                                        @foreach ( $prod as $p )
                                        <option value="{{ $p->id }}">{{ $p->productName }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                
                                <input type="submit" name="submit" value="Create Slider" class="btn btn-info">    
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

<script>
    $(document).ready(function(){
    // validation for slider image
    var _URL = window.URL || window.webkitURL;
                $("#file_slider").change(function (e) {
                    var file, img;
                    if ((file = this.files[0])) {
                        img = new Image();
                        var objectUrl = _URL.createObjectURL(file);
                        img.onload = function () {
                            // alert(this.width + " " + this.height);
                if(this.width >= 480 || this.height >= 440){
                  // alert('success');
                  $(':input[type="submit"]').prop('disabled', false);
                  $(".slider-error").empty();
                }else{
                  // alert('Failure');
                  $(".slider-error").text("Image Size Too Small. Please Upload Larger Image.");
                  $(':input[type="submit"]').prop('disabled', true);
                }
                            _URL.revokeObjectURL(objectUrl);
                        };
                        img.src = objectUrl;
                    }
                });
    });
    </script>
@endsection
