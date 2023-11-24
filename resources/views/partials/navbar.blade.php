<nav class="navbar navbar-expand-lg navbar-main border-bottom shadow" style="font-family: League Spartan">
    <!-- offcanvas -->
    <button class="btn rounded-circle ms-3 navbar-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <span class="bx bx-menu icon text-white" data-bs-target="#offcanvasExample"></span>
    </button>
    <!-- offcanvas -->
    <a class="navbar-brand text-white fw-bold col-md-3 col-lg-2 me-0 px-3" href="/reap/public/dashboard">
      <img src="img/reap-01.png" alt="Logo" class="brand-logo d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="navbar-toggler-icon"></i>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown me-2">
          <a class="btn rounded-circle text-white dropdown ms-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bx bxs-user icon"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item small" href="#"><i class="bx bx-user icon"></i> User Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/reap/public/logout" method="POST">
                @csrf
                <button class="dropdown-item small" type="submit"><i class="bx bx-log-out icon"></i> Log Out</button>
              </form>  
            </li>
          </ul>
        </li>
      </ul>
    </div>
</nav>