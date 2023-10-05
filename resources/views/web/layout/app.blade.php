<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&amp;display=swap" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('css/vendors.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  <title>{{ env('APP_NAME') }}</title>

</head>

<body>
  
    <x-web.preloader/>

    <main>


        <header data-add-bg="bg-dark-1" class="header bg-green js-header" data-x="header" data-x-toggle="is-menu-opened">
        <div data-anim="fade" class="header__container px-30 sm:px-20">
            <div class="row justify-between items-center">

            <div class="col-auto">
                <div class="d-flex items-center">
                <a href="{{ route('home') }}" class="header-logo mr-20" data-x="header-logo" data-x-toggle="is-logo-dark">
                    <img src="{{ asset('img/general/logo-light.svg') }}" alt="logo icon">
                    <img src="{{ asset('img/general/logo-dark.svg') }}" alt="logo icon">
                </a>


                <div class="header-menu " data-x="mobile-menu" data-x-toggle="is-menu-active">
                    <div class="mobile-overlay"></div>

                    <div class="header-menu__content">
                    <div class="mobile-bg js-mobile-bg"></div>

                    <div class="menu js-navList">
                        <ul class="menu__nav text-white -is-active">



                        <li>
                            <a href="{{ route('home') }}">
                            Home
                            </a>
                        </li>                       
                        </ul>
                    </div>

                    <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                    </div>
                    </div>
                </div>

                </div>
            </div>


            <div class="col-auto">
                <div class="d-flex items-center">




                <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
                
                    <a href=""
                    class="button px-30 fw-400 text-14 border-white -outline-white h-50 text-white ml-20">Sign In /
                    Register</a>
                </div>

                <div class="d-none xl:d-flex x-gap-20 items-center pl-30 text-white" data-x="header-mobile-icons"
                    data-x-toggle="text-white">
                    <div><a href="login.html" class="d-flex items-center icon-user text-inherit text-22"></a></div>
                    <div><button class="d-flex items-center icon-menu text-inherit text-20"
                        data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button></div>
                </div>
                </div>
            </div>

            </div>
        </div>
        </header>

        @yield('content')

        <footer class="footer -type-1">
            <div class="container">
            <div class="pt-60 pb-60">
                <div class="row y-gap-40 justify-between xl:justify-start">
                <div class="col-xl-2 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Contact Us</h5>
    
                    <div class="mt-30">
                    <div class="text-14 mt-30">Toll Free Customer Care</div>
                    <a href="#" class="text-18 fw-500 text-blue-1 mt-5">+(1) 123 456 7890</a>
                    </div>
    
                    <div class="mt-35">
                    <div class="text-14 mt-30">Need live support?</div>
                    <a href="#" class="text-18 fw-500 text-blue-1 mt-5">hi@gotrip.com</a>
                    </div>
                </div>
    
                <div class="col-xl-2 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Company</h5>
                    <div class="d-flex y-gap-10 flex-column">
                    <a href="#">About Us</a>
                    <a href="#">Careers</a>
                    <a href="#">Blog</a>
                    <a href="#">Press</a>
                    <a href="#">Gift Cards</a>
                    <a href="#">Magazine</a>
                    </div>
                </div>
    
                <div class="col-xl-2 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Support</h5>
                    <div class="d-flex y-gap-10 flex-column">
                    <a href="#">Contact</a>
                    <a href="#">Legal Notice</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms and Conditions</a>
                    <a href="#">Sitemap</a>
                    </div>
                </div>
    
                <div class="col-xl-2 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Other Services</h5>
                    <div class="d-flex y-gap-10 flex-column">
                    <a href="#">Car hire</a>
                    <a href="#">Activity Finder</a>
                    <a href="#">Tour List</a>
                    <a href="#">Flight finder</a>
                    <a href="#">Cruise Ticket</a>
                    <a href="#">Holiday Rental</a>
                    <a href="#">Travel Agents</a>
                    </div>
                </div>
    
                <div class="col-xl-2 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Mobile</h5>
    
                    <div class="d-flex items-center px-20 py-10 rounded-4 border-light">
                    <div class="icon-apple text-24"></div>
                    <div class="ml-20">
                        <div class="text-14 text-light-1">Download on the</div>
                        <div class="text-15 lh-1 fw-500">Apple Store</div>
                    </div>
                    </div>
    
                    <div class="d-flex items-center px-20 py-10 rounded-4 border-light mt-20">
                    <div class="icon-play-market text-24"></div>
                    <div class="ml-20">
                        <div class="text-14 text-light-1">Get in on</div>
                        <div class="text-15 lh-1 fw-500">Google Play</div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
    
            <div class="py-20 border-top-light">
                <div class="row justify-between items-center y-gap-10">
                <div class="col-auto">
                    <div class="row x-gap-30 y-gap-10">
                    <div class="col-auto">
                        <div class="d-flex items-center">
                        © {{ date('Y') }} GoTrip LLC All rights reserved.
                        </div>
                    </div>
    
                    <div class="col-auto">
                        <div class="d-flex x-gap-15">
                        <a href="#">Privacy</a>
                        <a href="#">Terms</a>
                        <a href="#">Site Map</a>
                        </div>
                    </div>
                    </div>
                </div>
    
                <div class="col-auto">
                    <div class="row y-gap-10 items-center">
                    <div class="col-auto">
                        <div class="d-flex items-center">                           
                            <button class="d-flex items-center text-14 fw-500 text-dark-1">
                                <span class="icon-inr text-16 mr-10">₹</span>
                                <span class="underline">INR</span>
                            </button>
                        </div>
                    </div>
    
                    <div class="col-auto">
                        <div class="d-flex x-gap-20 items-center">
                        <a href="#"><i class="icon-facebook text-14"></i></a>
                        <a href="#"><i class="icon-twitter text-14"></i></a>
                        <a href="#"><i class="icon-instagram text-14"></i></a>
                        <a href="#"><i class="icon-linkedin text-14"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </footer>
  
    </main>
    
    <script src="{{ asset('js/vendors.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
  
  
  
  </html>