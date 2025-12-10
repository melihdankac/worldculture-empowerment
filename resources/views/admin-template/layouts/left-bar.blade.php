  <!-- leftbar-tab-menu -->
  <div class="startbar d-print-none">
      <!--start brand-->
      <div class="brand">
          <a href="{{ route('wcepanel.dashboard') }}" class="logo">
              <span>
                  <img src="{{ asset('frontend/assets/style/images/logo_wct_white.png') }}" alt="logo-small"
                      class="logo-sm">
              </span>
              <span class="">
                  <img src="{{ asset('frontend/assets/style/images/logo_wct_white.png') }}" alt="logo-large"
                      class="logo-lg logo-light">
                  <img src="{{ asset('frontend/assets/style/images/logo_wct_white.png') }}" alt="logo-large"
                      class="logo-lg logo-dark">
              </span>
          </a>
      </div>
      <!--end brand-->

      <!--start startbar-menu-->
      <div class="startbar-menu">
          <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
              <div class="d-flex align-items-start flex-column w-100">
                  <!-- Navigation -->
                  <ul class="navbar-nav mb-auto w-100">
                      <li class="menu-label mt-2">
                          <span>Main</span>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('wcepanel.dashboard') }}">
                              <i class="iconoir-report-columns menu-icon"></i>
                              <span>Dashboard</span>
                              <span class="badge text-bg-info ms-auto">New</span>
                          </a>
                      </li><!--end nav-item-->

                  </ul><!--end navbar-nav--->

              </div>
          </div><!--end startbar-collapse-->
      </div><!--end startbar-menu-->
  </div><!--end startbar-->
  <div class="startbar-overlay d-print-none"></div>
  <!-- end leftbar-tab-menu-->
