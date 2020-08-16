<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12 py-5 login-back">
			<div class="wrapper-login">
				@if ($errors->has('email') || $errors->has('password'))
						<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
						</span>
				@endif
				@if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('name') }}</strong>
						</span>
				@endif
				@if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('email') }}</strong>
						</span>
				@endif
				<div class="but-user">
					<div id="logins" class="wow bounceIn"
						data-wow-duration="1s" data-wow-delay="0s">
						<button class=""  id="login">Login</button>
					</div>
					<div id="registers" class="wow bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
						<button class="" id="register">Register</button>
					</div>
				</div >
				<div class="row">
					<div class="col-xs-12 col-md-8 offset-md-2">
						<div class="tran-back">
							<div class="login-form wow fadeIn" id="login-form"
								data-wow-duration="2s" data-wow-delay="0s">
								<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
									{{csrf_field()}}
									<input type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email"><br>
									
			                        <br>
									<input type="password" name="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password"><br>
									
		                            <br>
									<input type="submit" name="login" value="LOGIN">
								</form>
								<div class="regi">
									<a href="{{ route('password.request') }}">
										<button href="" role="button" id="login-link">Forget Password?</button>
									</a>
									<p>No Account?</p>
									<button href="" role="button" id="register-link">Register</button>
								</div>
							</div>
							<div class="signin-form wow fadeIn" id="signin-form" data-wow-delay="0s">
								<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
									{{csrf_field()}}
									
									@include('errors.errors')
									<br>
									<input type="text" class="{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" placeholder="First Name" value="{{ old('firstName') }}">

									<input type="text" name="middleName" placeholder="Middle Name" value="{{ old('middleName') }}">

									<input type="text" class="{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" placeholder="Last Name" value="{{ old('lastName') }}">

									<input type="text" class="{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="Username" value="{{ old('username') }}">
									
									<input type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password"><br>
									
									<input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password"><br>

									<input type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" value="{{ old('email') }}"><br>
									
									<input type="text" class="{{ $errors->has('streetAddress') ? ' is-invalid' : '' }}" name="streetAddress" placeholder="Street Address" value="{{ old('streetAddress') }}">

									<input type="text" class="{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" placeholder="City" value="{{ old('city') }}">

									<input type="text" class="{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" name="phoneNumber" placeholder="Phone Number" value="{{ old('phoneNumber') }}">

									<div class="form-group">
										<div class="row" style="padding: 20px;">
											<div class="col-md-8 col-sm-12 offset-md-2 terms">
												@component('components.terms')
                                        		@endcomponent
											</div>
										</div>
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" name="terms" required>&nbsp;&nbsp;I accept the above Terms and Conditions<br>
                                    </div>
									
									<div class="form-group">
										<input type="checkbox" name="supplier" value="1">&nbsp;I am a Whole Seller<br>
										<small>Check this only if you are the whole-seller personnel.</small>
									</div>
									

									<input type="submit" name="login" value="Register">
								</form>
								
							</div>
						</div>
						<!-- End of trans-back -->
					</div>
				</div>

			</div>
		</div>
	</div>
</div>