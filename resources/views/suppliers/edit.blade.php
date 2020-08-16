@extends ('layouts.app')

@section ('content')

<div class="container" style="padding: 25px 15px">
    <div class="row">
        <div class="col-md-3">
            @include('partials.adminsidebar')
        </div>
        <div class="col-md-9">
        	<div class="card">
              <div class="card-body">
                <h5 class="card-title">Shop Profile:</h5>
                @include('errors.errors')

                <form action="{{ route('managesuppliers.update', $supplier->id) }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}				
					{{ method_field('PATCH') }}

					<div class="form-group">
						<label>Name of the SHOP:</label>
	                	<input type="text" name="shopname" class="form-control" value="{{ $supplier->detail }}">
					</div>

					<div class="form-group">
						<label for="">Brief About Us:</label>
	                	<textarea name="about_us" class="form-control" cols="30" rows="3">{{ $supplier->about_us }}</textarea>
					</div>

					<div class="form-group">
						<label for="">Contact Email:</label>
	                	<input type="email" name="contactEmail" class="form-control" value="{{ $supplier->email }}">
					</div>

					<div class="form-group">
						<div class="row">
						  <div class="col-md-6">
						      <label for="">Contact Number:</label>
						      <input type="number" class="form-control" name="phone" value="{{ $supplier->phone }}">
						  </div>
						  <div class="col-md-6">
						      <label for="">Display Address:</label>
						      <input type="text" name="address" class="form-control" value="{{ $supplier->address }}">
						  </div>
						</div>
            		</div>

            		<div class="form-group">
						<div class="row">
						  <div class="col-md-6">
						      <label for="">Facebook Url:</label>
						      <input type="url" class="form-control" name="facebook_link" value="{{ $supplier->facebook_link }}">
						  </div>
						  <div class="col-md-6">
						      <label for="">Skype:</label>
						      <input type="text" name="skype" class="form-control" value="{{ $supplier->skype }}">
						  </div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
									<label for="">Viber:</label>
									<input type="text" class="form-control" name="viber" value="{{ $supplier->viber }}">
							</div>
							<div class="col-md-6">
									<label for="">WeChat:</label>
									<input type="text" name="wechat" class="form-control" value="{{ $supplier->wechat }}">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
	                		<div class="col-md-6" style="padding-top: 15px">
	                            <label for="">New Featured Image:</label>
	                            <input type="file" name="featured_image" class="form-control">
	                    	</div>
	                    	<div class="col-md-4">
	                    		<img src="{{ asset( $supplier->image ) }}" width="140" height="140" style="object-fit: contain" alt="">
	                    	</div>
                    	</div>
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Update">
					</div>

                </form>

              </div>
            </div>
        </div>
    </div>
</div>

@endsection