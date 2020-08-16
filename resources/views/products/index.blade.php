@extends('layouts.app')
@section('content')

<div class="container" style="padding: 25px 15px">
      <div class="row">
      <div class="col col-md-3">
        @if(Auth::user()->hasRoles('admin')){
          @include('admin.sidebar')
      @else
          @include('partials.adminsidebar')
      @endif
      </div>
      <div class="col col-md-9">
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                    <strong>Your Products:</strong>
                    <small>Inputs with * are required.</small>
                </div>
                <hr>
              <p class="card-text">

                <span class="table-responsive">
                  <table  id="example" class="table table-condensed">
                      <thead>
                          <tr>
                              <th></th>
                              <th>Title</th>
                              <th>Category</th>
                              <th>Actual Rate</th>
                              <th>Discount</th>
                              <th>Selling Price</th>
                              <th>Featured</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach ($products as $p)
                          <tr>
                              <td>
                                @foreach( $p->images as $img )
                                  <a href="{{asset('uploads/products/thumbnails/'.$img->image)}}" target="_blank">
                                    <img src="{{asset('uploads/products/thumbnails/'.$img->image)}}" alt="Image" height="40" width="40" style="object-fit: contain;">
                                  </a>
                                @endforeach
                              </td>
                              <td>{{ $p->productName }}</td>
                              <td>{{ $p->category->name }}</td>
                              <td>{{ $p->actualRate }}</td>
                              <td>{{ $p->discountPercent }}</td>
                              <td>{{ $p->rate }}</td>
                              <td>{!! $p->featured ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}</td>
                              <td>
                                  <a href="{{ route('products.edit', $p->id) }}" class="edit-btn">Edit</a>
                                    <form action="{{route('products.destroy', $p->id)}}" onclick="event.preventDefault();
                                              var r=confirm('Are you sure you want to delete this item?');
                                              if(r== true){ this.submit(); }" method="post">
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <input type="submit" class="delete-btn" value="Delete">
                                    </form>
                              </td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
                </span>
                  
              </p>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
