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
	                <h5 class="card-title">Update your Profile:</h5>
	                @include('errors.errors')
	                <p class="card-text">
	                	<form action="{{ route('profile.update', $profile->profile->id) }}" method="post" enctype="multipart/form-data">
	                		{{csrf_field()}}
	                		{{ method_field('PUT') }}
	                		<label for="">Name of the SHOP:</label>
	                		<input type="text" name="detail" class="form-control" value="{{$profile->profile->detail}}" placeholder="Not more than 50 words"> <br>
	                		<label for="">Brief About Us:</label>
	                		<textarea name="about_us" class="form-control" cols="30" rows="3">{{ $profile->profile->about_us }}</textarea><br>
	                		<label for="">Contact Email:</label>
	                		<input type="email" name="email" class="form-control" value="{{ $profile->profile->email }}"> <br>
	                		<div class="form-group">
		                          <div class="row">
		                              <div class="col-md-6">
		                                  <label for="">Contact Number:</label>
		                                  <input type="number" class="form-control" name="phone" value="{{ $profile->profile->phone }}">
		                              </div>
		                              <div class="col-md-6">
		                                  <label for="">Address:</label>
		                                  <input type="text" name="address" class="form-control" value="{{ $profile->profile->address }}">
		                              </div>
		                          </div>
                    		</div>
											<div class="form-group">
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="">Facebook Url:</label>
                                  <input type="url" class="form-control" name="facebook_link" value="{{ $profile->profile->facebook_link }}">
                              </div>
                              <div class="col-md-6">
                                  <label for="">Skype:</label>
                                  <input type="text" name="skype" class="form-control" value="{{ $profile->profile->skype }}">
                              </div>
                          </div>
                    	</div>
											<div class="form-group">
													<div class="row">
															<div class="col-md-6">
																	<label for="">Viber:</label>
																	<input type="text" class="form-control" name="viber" value="{{ $profile->profile->viber }}">
															</div>
															<div class="col-md-6">
																	<label for="">WeChat:</label>
																	<input type="text" name="wechat" class="form-control" value="{{ $profile->profile->wechat }}">
															</div>
													</div>
											</div>
                        	<div class="row">
                        		<div class="col-md-6" style="padding-top: 15px">
	                                <label for="">Update Image:</label>
	                                <input type="file" name="image" class="form-control">
                            	</div>
	                            <div class="col-md-6">
	                            	<h5>Your Image:</h5>
	                            	<img src="{{ url('uploads/suppliers/'.$profile->profile->image ) }}" alt="" width="150" height="150">
	                            </div>
                        	</div>
                            <hr>
                        <input type="submit" class="btn btn-success" value="Update">
	                	</form>
	                </p>
	              </div>
          		</div>
	        </div>
	    </div>
   	</div>

@endsection
