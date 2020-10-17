<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Fluidmeet Exercise</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('css/app.css')}}"><!--linked bootstrap-->

  <!-- Custom styles for this template -->
  <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a class="navbar-brand" href="{{route('home')}}">HOME</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          @if(Auth::check())
          
          @if (Auth::user()->userHasRole('Admin'))

          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">Admin Panel</a>
            </li>
              
          @else

          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">Dashboard</a>
            </li>
            
          @endif
          
        
        
          @else
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li>

          @endif

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        @yield('content')

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget Component-->
        <x-home.search-widget.search-company></x-home.search-widget.search-company>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  @yield('scripts')

</body>

</html>
