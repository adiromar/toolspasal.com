<ul class="list-group">
    <li class="list-group-item">
        <a href="{{ route('sitesettings.index') }}">Site Settings</a>
    </li>

    <li class="list-group-item">
        <a href="{{ route('products.index') }}">Manage Products</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('users.index') }}">Manage Users</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('categories.index') }}">Manage Categories</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('tags.index') }}">Manage Tags</a>
    </li>
    <li class="list-group-item">
      <a href="{{ route('featured.index') }}">Featured Products</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('sliders.index') }}">App Sliders</a>
    </li>
    {{-- <li class="list-group-item">
      <a href="{{ route('orders.showall') }}">See all Product Orders</a>
    </li> --}}
    {{-- <li class="list-group-item">
      <a href="{{ route('orders.boosted_orders') }}"><i class="fa fa-rocket" style="color: black" aria-hidden="true"></i> &nbsp;Orders</a>
    </li> --}}
    <li class="list-group-item">
      <a href="{{ route('users.suspend') }}">Suspend Users</a>
    </li>

</ul>
