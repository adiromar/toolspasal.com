<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="{{ asset('madmin/css/materialize.min.css') }}" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="{{ asset('madmin/css/main.css') }}" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SITES CONTROL</title>
</head>

<body class="grey lighten-4">
  <nav class="blue darken-2">
    <div class="container">
      <div class="nav-wrapper">
        <a href="{{ route('superadmin') }}" class="brand-logo">Superadmin</a>
        <a href="#" data-activates="side-nav" class="button-collapse show-on-large right">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li class="active">
            <a href="{{ route('superadmin') }}">Dashboard</a>
          </li>
          <li class="">
            <a href="{{ route('superadmin.categories') }}">Categories</a>
          </li>
          <li>
            <a href="">Comments</a>
          </li>
          <li>
            <a href="">Users</a>
          </li>
        </ul>
        <!-- Side nav -->
        <ul id="side-nav" class="side-nav">
          <li>
            <div class="user-view">
              <div class="background">
                <img src="{{ asset('madmin/img/ocean.jpg') }}" alt="">
              </div>
              <a href="#">
                <img src="{{ asset('madmin/img/person1.jpg') }}" alt="" class="circle">
              </a>
              <a href="#">
                <span class="name white-text">John Doe</span>
              </a>
              <a href="#">
                <span class="email white-text">jdoe@gmail.com</span>
              </a>
            </div>
          </li>
          <li>
            <a href="{{ route('superadmin') }}">
              <i class="material-icons">dashboard</i> Dashboard</a>
          </li>
          <li>
            <a href="posts.html">Posts</a>
          </li>
          <li>
            <a href="{{ route('superadmin.categories') }}">Categories</a>
          </li>
          <li>
            <a href="comments.html">Comments</a>
          </li>
          <li>
            <a href="users.html">Users</a>
          </li>
          <li>
            <div class="divider"></div>
          </li>
          <li>
            <a class="subheader">Account Controls</a>
          </li>
          <li>
            <a href="login.html" class="waves-effect">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  <!-- Footer -->
  <footer class="section blue darken-2 white-text center">
    <p>Madmin Panel Copyright &copy; 2018</p>
  </footer>

  <!-- Fixed Action Button -->
  <div class="fixed-action-btn">
    <a href="#category-modal" class="modal-trigger btn-floating btn-large red">
      <i class="material-icons">add</i>
    </a>
  </div>

  <!-- Add Category Modal -->
  <div id="category-modal" class="modal">
    <div class="modal-content">
      <h4>Add Category</h4>
      <form>
        <div class="input-field">
          <input type="text" id="title">
          <label for="title">Title</label>
        </div>
      </form>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close btn blue white-text">Submit</a>
      </div>
    </div>
  </div>

  <!-- Preloader -->
  <div class="loader preloader-wrapper big active">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div>
      <div class="gap-patch">
        <div class="circle"></div>
      </div>
      <div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="{{ asset('madmin/js/materialize.min.js') }}"></script>

  @yield('scripts')
</body>

</html>