@extends('layouts.app')
@section('content')
<div class="container" style="padding: 25px 15px">
    <h4>Admin Panel</h4>
    <div class="row">
        <div class="col-md-3">
            @include('admin.sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                    <strong>Update Site Settings:</strong>
                    <small>Inputs with * are required.</small>
                </div>
                <hr>
                @include('errors.errors')
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form action="{{ route('sitesettings.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Site Name*:</label>
                                    <input type="text" name="siteName" value="{{ old('siteName') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Site Logo*:</label>
                                    <input type="file" name="siteLogo" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>About Us*:</label>
                                    <textarea name="aboutUs" rows="5" class="form-control">{{ old('aboutUs') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Copyright Section Text</label>
                                    <input type="text" name="copyrightText" value="{{ old('copyrightText') }}" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label><u>Social Profiles</u></label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Facebook:</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="url" name="facebookLink" value="{{ old('facebookLink') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-2">
                                            <label>Twitter:</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="url" name="twitterLink" value="{{ old('twitterLink') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-2">
                                            <label>Youtube:</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="url" name="youtubeLink" value="{{ old('youtubeLink') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group contacts">
                                    <label><u>Contacts</u></label>
                                    <div class="row">
                                        <div class="col-md-4"><label>Name:</label></div>
                                        <div class="col-md-4"><label>Contact No:</label></div>
                                        <div class="col-md-4"><label>Location (optional):</label></div>
                                    </div>
                                    <div class="row contact">
                                        <div class="col-md-4">
                                            <input type="text" name="name[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="contactNo[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="location[]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="appendhere"></div>
                                    <a href="" class="btn-addmore" id="btn-addmore"><i class="fa fa-plus"></i>&nbsp;More Contacts</a>
                                </div>

                                <div class="form-group">
                                    <label>Privacy Policy*:</label>
                                    <textarea name="privacyPolicy" id="specification" rows="10" class="form-control">{{old("privacyPolicy")}}</textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="create" value="Update Settings" class="btn btn-primary btn-lg">
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
