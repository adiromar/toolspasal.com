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
	                <h5 class="card-title">Add Profile for featuring on the site:</h5>
	                @include('errors.errors')
	                <p class="card-text">
	                	<form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
	                		{{ csrf_field() }}
	                		<label for="">Brief Detail</label>
	                		<input type="text" name="detail" class="form-control" value="{{ old('detail') }}" placeholder="Not more than 50 words"> <br>
	                		<label for="">About Us</label>
	                		<textarea name="about_us" class="form-control" cols="30" rows="3">{{ old('about_us') }}</textarea><br>

											<div class="form-group">
													<div class="row">
															<div class="col-md-6">
																<label for="">Contact Email</label>
						                		<input type="email" name="email" class="form-control" value="{{old('email')}}"> <br>
															</div>
															<div class="col-md-6">
																		<label for="">Contact Number</label>
																		<input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
															</div>
													</div>
											</div>

	                		<label for="">Address</label>
	                		<input type="text" name="address" class="form-control" value="{{old('address')}}"> <br>
											<div class="form-group">
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="">Facebook Url:</label>
                                  <input type="url" class="form-control" name="facebook_link" value="{{old('facebook_link')}}">
                              </div>
                              <div class="col-md-6">
                                  <label for="">Skype:</label>
                                  <input type="text" name="skype" class="form-control" value="{{old('skype')}}">
                              </div>
                          </div>
                    	</div>
							<div class="form-group">
									<div class="row">
											<div class="col-md-6">
													<label for="">Viber:</label>
													<input type="text" class="form-control" name="viber" value="{{old('viber')}}">
											</div>
											<div class="col-md-6">
													<label for="">WeChat:</label>
													<input type="text" name="wechat" class="form-control" value="{{old('wechat')}}">
											</div>
									</div>
							</div>
	                		<div class="form-group">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="">Add Image:</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
														<hr>
                            <input type="submit" class="btn btn-success" value="Add +" style="width:200px">
                        </div>
	                	</form>
	                </p>
	              </div>
          		</div>
	        </div>
	    </div>
   	</div>

@endsection
