<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<head>

  <title>{{ ucfirst(Route::currentRouteName()); }}</title>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/lightbox/simpleLightbox.css') }}">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('css/vendors.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  <style>
    .text-capitalize{
      text-transform: capitalize;
    }
  </style>

  @stack('styles')

</head>

<body data-barba="wrapper">
  
    <x-web.preloader/>

    <div class="header-margin"></div>
    <header data-add-bg="" class="header -dashboard bg-white js-header" data-x="header" data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container px-30 sm:px-20">
        <div class="-left-side">
            <a href="{{ route('admin.dashboard') }}" class="header-logo mr-20" data-x="header-logo" data-x-toggle="is-logo-dark">
                <img src="{{ asset('img/general/logo-dark.svg') }}" alt="logo icon">
                <img src="{{ asset('img/general/logo-dark.svg') }}" alt="logo icon">
            </a>
        </div>

        <div class="row justify-between items-center pl-60 lg:pl-20">
        <div class="col-auto">
            <div class="d-flex items-center">
                <button data-x-click="dashboard">
                    <i class="icon-menu-2 text-20"></i>
                </button>         
            </div>
        </div>

        <div class="col-auto">
            <div class="d-flex items-center">
                <div class="row items-center x-gap-5 y-gap-20 pl-20 lg:d-none">
                    <div class="col-auto">
                    <button class="button -blue-1-05 size-50 rounded-22 flex-center">
                        <i class="icon-email-2 text-20"></i>
                    </button>
                    </div>

                    <div class="col-auto">
                    <button class="button -blue-1-05 size-50 rounded-22 flex-center">
                        <i class="icon-notification text-20"></i>
                    </button>
                    </div>
                </div>
                <div class="pl-15">
                    <img src="{{ asset('img/avatars/3.png') }}" alt="image" class="size-50 rounded-22 object-cover">
                </div>
            </div>
        </div>
        </div>
    </div>
    </header>
    <div class="dashboard" data-x="dashboard" data-x-toggle="-is-sidebar-open">
        <div class="dashboard__sidebar bg-white scroll-bar-1">
    
    
          <div class="sidebar -dashboard">
    
            <div class="sidebar__item">
              <div class="sidebar__button {{ request()->routeIs('admin.dashboard')?'-is-active':'' }}">
                <a href="{{ route('admin.dashboard') }}" class="d-flex items-center text-15 lh-1 fw-500">
                  <img src="{{ asset('img/dashboard/sidebar/compass.svg') }}" alt="image" class="mr-15">
                  Dashboard
                </a>
              </div>
            </div>
            <div class="sidebar__item">
              <div class="sidebar__button {{ request()->routeIs('admin.packages.list') || request()->routeIs('admin.packages.create')?'-is-active':'' }}">
                <a href="{{ route('admin.packages.list') }}" class="d-flex items-center text-15 lh-1 fw-500">
                  <img src="{{ asset('img/dashboard/sidebar/compass.svg') }}" alt="image" class="mr-15">
                  Packages
                </a>
              </div>
            </div>
            <div class="sidebar__item">
              <div class="sidebar__button {{ request()->routeIs('admin.bookings')?'-is-active':'' }}">
                <a href="{{ route('admin.bookings') }}" class="d-flex items-center text-15 lh-1 fw-500">
                  <img src="{{ asset('img/dashboard/sidebar/compass.svg') }}" alt="image" class="mr-15">
                  Booking History
                </a>
              </div>
            </div>
            <div class="sidebar__item">
              <div class="sidebar__button {{ request()->routeIs('admin.settings')?'-is-active':'' }}>
                <a href="{{ route('admin.settings') }}" class="d-flex items-center text-15 lh-1 fw-500">
                  <img src="{{ asset('img/dashboard/sidebar/compass.svg') }}" alt="image" class="mr-15">
                  Settings
                </a>
              </div>
            </div>
            <div class="sidebar__item">
              <div class="sidebar__button ">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-flex items-center text-15 lh-1 fw-500">
                  <img src="{{ asset('img/dashboard/sidebar/log-out.svg') }}" alt="image" class="mr-15">
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
              </div>
            </div>
    
          </div>
    
    
        </div>
        <div class="dashboard__main">
            <div class="dashboard__content bg-light-2">

                @yield('content')

              <footer class="footer -dashboard mt-60">
                <div class="footer__row row y-gap-10 items-center justify-between">
                  <div class="col-auto">
                    <div class="row y-gap-20 items-center">
                      <div class="col-auto">
                        <div class="text-14 lh-14 mr-30">© {{ date('Y') }} GoTrip LLC All rights reserved.</div>
                      </div>

                      <div class="col-auto">
                        <div class="row x-gap-20 y-gap-10 items-center text-14">
                          <div class="col-auto">
                            <a href="#" class="text-13 lh-1">Privacy</a>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="text-13 lh-1">Terms</a>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="text-13 lh-1">Site Map</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>               
                </div>
              </footer>
            </div>
        </div>
    </div>    
    <script src="{{ asset('js/vendors.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('assets/lightbox/simpleLightbox.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      });
      window.addEventListener('swal:notification',function(e){ 
        Toast.fire({
            icon: e.detail[0].icon,
            title: e.detail[0].title
        });
      }); 
      window.addEventListener('swal:block-notification',function(e){ 
        Swal.fire({
            icon: e.detail[0].icon,
            title: e.detail[0].title,
            timer: 2000,
            timerProgressBar: true,
        });
      });
    </script>
    
    @stack('scripts')

  </body>
  
  
  
  </html>