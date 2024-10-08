<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        {{-- <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> --}}
        <span class="ms-1 font-weight-bold text-white">FunRun Purwokerto</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->type == 'admin')
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('peserta') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <span class="nav-link-text ms-1">Peserta</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('undian-doorprize') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-trophy"></i>
                  </div>
                  <span class="nav-link-text ms-1">Undian</span>
                </a>
              </li>
            <li class="nav-item mt-3">
              <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="{{ route('profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('scan') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">assignment</i>
                  </div>
                  <span class="nav-link-text ms-1">Scan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('admin-logout') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">logout</i>
                  </div>
                  <span class="nav-link-text ms-1">Logout</span>
                </a>
              </li>
          @endif
          @if(Auth::check() && Auth::user()->type === 'participant')
            <li class="nav-item">
              <a class="nav-link text-white " href="{{ route('logout') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">logout</i>
                </div>
                <span class="nav-link-text ms-1">Logout</span>
              </a>
            </li>
          @endif
      </ul>
    </div>
  </aside>
