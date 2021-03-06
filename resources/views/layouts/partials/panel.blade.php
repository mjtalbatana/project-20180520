<header class="navbar navbar-expand-lg navbar-light bg-light">
  <figure class="navbar-brand">
    <a href="/">
      @if(str_contains(url()->current(), ['127.0.0.1', 'localhost']))
        <img class="img-fluid" style="width:30px; height:30px" src="dev-assets/selection/mjta.png" >
        @else
        <img class="img-fluid" style="width:30px; height:30px" src="https://raw.githubusercontent.com/mjtalbatana/dev-assets/master/selection/mjta.png" >
      @endif
    </a>
  </figure>

  <h1 class="navbar-brand">Inventory Tracking Web Application</h1>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <nav class="collapse navbar-collapse" id="navbarNav" >
    <div class="navbar-nav mr-auto">

      @if(Auth::check())
        @if($role == 'staff')
        <button class="btn btn-default"><a class="nav-link" href="authcheck">Log-off</a></button>
        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-checkout"><a class="nav-link">Check-Out Item</a></button>
        @elseif($role == 'manager')
        <button class="btn btn-default"><a class="nav-link" href="authcheck">Log-off</a></button>
          @if($webheader !== 'user-management')
          <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-checkout"><a class="nav-link">Check-Out Item</a></button>
          <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-checkin"><a class="nav-link">Check-In Item</a></button>
          <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-newitem"><a class="nav-link">New Item</a></button>
          @endif
        @elseif($role == 'admin')
        <button class="btn btn-default"><a class="nav-link" href="authcheck">Log-off</a></button>
        <button class="btn btn-default"><a class="nav-link" href="accounts">Account Management</a></button>

        @else
          @if(Route::current()->uri !== 'auth')
          <button class="btn btn-default"><a class="nav-link" href="auth">Sign-In</a></button>
          @endif
        @endif
      @else
        @if(Route::current()->uri !== 'auth')
        <button class="btn btn-default"><a class="nav-link" href="auth">Sign-In</a></button>
        @endif
      @endif
    </div>

    {{-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Enter product name" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> --}}
  </nav>
</header>