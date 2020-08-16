@extends('super.layouts.main')

@section('content')

<!-- Section: Categories -->
  <section class="section section-categories grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Client Theme Assign</span>

              @php
                  dd($user_rec);die;
              @endphp
              <table class="striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Client UserName</th>
                    <th>Email</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                @foreach( $categories as $category )
                  <tr>
                    <td>{{ $category->categoryName }}</td>
                    <td>
                      @foreach($category->childCategories as $child)
                        <li>{{ $child->categoryName }}</li>
                      @endforeach
                    </td>
                    <td>{{ $category->featured ? 'Yes' : 'No' }}</td>
                    <td>
                      <a href="{{ url('superadmin/category/'. $category->categoryId) }}" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            @if( count($categories) > 4 )
            <div class="card-action">
              <ul class="pagination">
                <li class="disabled">
                  <a href="#!" class="blue-text">
                    <i class="material-icons">chevron_left</i>
                  </a>
                </li>
                <li class="active blue lighten-2">
                  <a href="#!" class="white-text">1</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">2</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">3</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">4</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">5</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">
                    <i class="material-icons">chevron_right</i>
                  </a>
                </li>
              </ul>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection