@extends('super.layouts.main')

@section('content')

<!-- Section: Details -->
  <section class="section section-details grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12 m6">
                  <span class="card-title">Post Details</span>
                </div>
                <div class="col s12 m6 center">
                  <img src="img/person1.jpg" alt="" class="responsive-img circle" style="width: 40px;margin-left:10px;">
                  <p>Posted By John Doe</p>
                  <p>On Jan, 12, 2018</p>
                </div>
              </div>

              <form>
                <div class="input-field">
                  <input type="text" id="title" value="Post One">
                  <label for="title">Title</label>
                </div>
                <div class="input-field">
                  <select>
                    <option value="" disabled>Select option</option>
                    <option value="1" selected>Web Development</option>
                    <option value="2">Graphic Design</option>
                    <option value="3">Tech Gadgets</option>
                    <option value="4">Other</option>
                  </select>
                  <label>Category</label>
                </div>
                <div class="input-field">
                  <textarea name="body" id="body" class="materialize-textarea">
                      This is the content for post one
                    </textarea>
                </div>
              </form>

            </div>
            <div class="card-action">
              <button class="btn green">Save</button>
              <button class="btn red">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')

<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

  <script>
    // Hide Sections
    $('.section').hide();

    setTimeout(function () {
      $(document).ready(function () {
        // Show sections
        $('.section').fadeIn();

        // Hide preloader
        $('.loader').fadeOut();

        //Init Side nav
        $('.button-collapse').sideNav();

        // Init Modal
        $('.modal').modal();

        // Init Select
        $('select').material_select();

        CKEDITOR.replace('body');

      });
    }, 1000);
  </script>

@endsection