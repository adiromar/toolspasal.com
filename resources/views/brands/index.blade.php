@extends('layouts.app')
@section('content')

<div class="container" style="padding: 25px 15px">
      <div class="row">
      <div class="col col-md-3">
          @include('partials.adminsidebar')
      </div>
      <div class="col col-md-9">
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                    <strong>Brands:</strong>
                    <small>Inputs with * are required.</small>
                    <a href="{{ route('brands.create') }}" class="btn btn-info btn-sm">Add New <i class="fa fa-plus"></i></a>
                </div>
                <hr>
              <p class="card-text">

                <span class="table-responsive">
                  <table  id="example" class="table table-condensed">
                      <thead>
                          <tr>
                              <th></th>
                              <th>Brand Name</th>
                              <th>Status</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $k = 1; ?>
                      @foreach ($brands as $p)
                          <tr>
                            <td>{{ $k }}</td>
                            <td>{{ $p->brandName }}</td>
                        
                                <?php
                                if($p->status ==1){
                                    echo '<td>Active</td>';
                                }else{
                                    echo '<td>De Active</td>';
                                }
                                ?>
                            
                            <td>
                                <a href="{{ route('brands.edit', $p->brandId) }}" class="edit-btn">Edit</a>
                                    <form action="{{route('brands.destroy', $p->brandId)}}" onclick="event.preventDefault();
                                            var r=confirm('Are you sure you want to delete this item?');
                                            if(r== true){ this.submit(); }" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <input type="submit" class="delete-btn" value="Delete">
                                    </form>
                            </td>
                          </tr>
                          <?php $k++; ?>
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
