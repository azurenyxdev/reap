<div class="offcanvas offcanvas-start bg-dark sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!--
                    <div class="small fw-bold text-uppercase">
                        <i class="bx bxs-dashboard icon"></i> Dashboard
                    </div>
                    -->
                    <a href="/reap/public/dashboard" class="nav-link small px-3 active">
                        <span class="me-2"><i class="bx bxs-dashboard icon"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a
                      class="nav-link small px-3 sidebar-link active {{ Str::contains($active, 'investor') ? 'fw-bold' : '' }}"
                      data-bs-toggle="collapse"
                      href="#investor" {{ Str::contains($active, 'investor') ? 'aria-expanded=true' : '' }}>
                      <span class="me-2"><i class="bx bxs-coin-stack icon"></i></span>
                         <span>Investor Management</span>
                      <span class="ms-auto">
                        <span class="right-icon">
                          <i class="bx bxs-chevron-right icon"></i>
                        </span>
                      </span>
                    </a>
                    <div class="collapse {{ Str::contains($active, 'investor') ? 'show' : '' }}" id="investor">
                      <ul class="navbar-nav ps-3">
                        <li>
                          <a href="/reap/public/investor_portofolio" class="nav-link small {{ ($active === 'investor-portofolio') ? 'active fw-bold' : '' }} px-3">
                            <span class="me-2"
                              ><i class="bx bxs-briefcase icon"></i
                            ></span>
                            <span>Investor Portofolio</span>
                          </a>
                        </li>
                        <li>
                            <a href="/reap/public/investor_profiles" class="nav-link small {{ ($active === 'investor-profiles') ? 'active fw-bold' : '' }} px-3">
                              <span class="me-2"
                                ><i class="bx bxs-user-detail icon"></i
                              ></span>
                              <span>Investor Profiles</span>
                            </a>
                          </li>
                      </ul>
                    </div>
                </li>
                <li>
                    <a
                      class="nav-link small px-3 sidebar-link active"
                      data-bs-toggle="collapse"
                      href="#supplier"
                    >
                      <span class="me-2"><i class="bx bxs-package icon"></i></span>
                         <span>Supplier Management</span>
                      <span class="ms-auto">
                        <span class="right-icon">
                          <i class="bx bxs-chevron-right icon"></i>
                        </span>
                      </span>
                    </a>
                    <div class="collapse" id="supplier">
                      <ul class="navbar-nav ps-3">
                        <li>
                          <a href="#" class="nav-link small px-3">
                            <span class="me-2"
                              ><i class="bx bxs-briefcase icon"></i
                            ></span>
                            <span>Supplier Portofolio</span>
                          </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link small px-3">
                              <span class="me-2"
                                ><i class="bx bxs-user-detail icon"></i
                              ></span>
                              <span>Supplier Profiles</span>
                            </a>
                          </li>
                      </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="sidebar-footer text-muted">
            <div class="">
                <span class="me-2 big">
                    <i class="bx bxs-user-circle icon"></i>
                </span>
                <span>Logged in as:</span>
                <span class="text-capitalize">{{ auth()->user()->name }}</span>
            </div>
        </div>
    </div>
</div>