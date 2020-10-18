<ul class="list-group">
    <li class="list-group-item"><a href="{{ route('dashboard') }}"><h4>Dashboard</h4></a></li>
    @php
        $uid = Auth::user();
    @endphp
    @if (!$uid->supplier)
        <li class="list-group-item">
            <a href="{{ route('managesuppliers.create') }}"><i class="fa fa-pencil"></i> Add Profile Details</a><br>
            <small style="color: darkred">Please Add your Profile to feature in the site.</small>
        </li>
    @else
        <li class="list-group-item">
            <a href="{{ route('managesuppliers.edit', $uid->id) }}">Update Profile</a>
        </li>
    @endif
    <li class="list-group-item">
        <a href="{{ route('sliders.index') }}">App Sliders</a>
    </li>
    
    <li class="list-group-item">
        <a href="{{ route('categories.index') }}"><i class="fa fa-list-ul"></i> Manage Categories</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('categories.create') }}"><i class="fa fa-plus"></i> Add a Category</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('products.create') }}"><i class="fa fa-plus"></i> Add a Product</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('products.index') }}"><i class="fa fa-list"></i> Manage Products</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('brands.index') }}"><i class="fab fa-amazon"></i> Manage Brands</a>
    </li>
   <!--  <li class="list-group-item">
        <a href="{{ route('videos.index') }}">Manage Your Videos</a>
    </li> -->
    

    {{-- <li class="list-group-item">
        <a href="{{ route('orders.showall') }}">See all Product Orders</a>
      </li> --}}
      
    {{-- <li class="list-group-item">
        <a href="{{ route('orders.index') }}">User Orders</a>
    </li> --}}
    @auth
        @if(Auth::user()->roles()->first()->role == 'Supplier') 
            
            <li  class="list-group-item"><a href="{{ url('previewEdit') }}"><i class="fa fa-plus"></i> Add/Edit Product</a></li>
                
        @endif
    @endauth
</ul>
