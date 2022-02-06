<nav class="navbar navbar-expand-lg navbar-light bg-white container col-md-12">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Dashbord</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link m-2 color-white btn btn-outline-primary" aria-current="page" href="{{ route('admin.works.index') }}">Works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link m-2 color-white btn btn-outline-primary" aria-current="page" href="{{ route('admin.stills.index') }}">Stills</a>
        </li><li class="nav-item">
          <a class="nav-link m-2 color-white btn btn-outline-primary" aria-current="page" href="{{ route('admin.barbers.index') }}">Barbers</a>
        </li>
    </div>
  </div>
</nav>

