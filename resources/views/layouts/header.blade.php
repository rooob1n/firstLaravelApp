
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">First Laravel App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
        </ul>


        @if (Auth::check())
          
          <div class="d-flex">
            <h2 style="color:white;">{{ Auth::user()->name }}</h2>
            <a href="/Logout" style="margin-left:20px;" class="btn btn-danger">Logout</a>
          </div>
            
        @elseif(empty($status))
           
          <a href="/Login" style="margin-left:20px;" class="btn btn-danger">Login</a>

        @endif

      </div>
    </div>
  </nav>