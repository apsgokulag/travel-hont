
@extends('web.layout.app')

@section('content')

  <section class="layout-pt-md layout-pb-lg mt-60">
    <div class="container">
      <div class="row x-gap-80 y-gap-20 justify-between">
        <div class="col-12">
          <div class="text-30 sm:text-24 fw-600">Contact Us</div>
        </div>
        <div class="row">          
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-6 mb-30">
                <div class="text-14 text-light-1">Address</div>
                <div class="text-18 fw-500 mt-10">328 Queensberry Street, North Melbourne VIC 3051, Australia.</div>
              </div>
      
              <div class="col-lg-6 mb-30">
                <div class="text-14 text-light-1">Toll Free Customer Care</div>
                <div class="text-18 fw-500 mt-10">+(1) 123 456 7890</div>
              </div>
      
              <div class="col-lg-6 mb-30">
                <div class="text-14 text-light-1">Need live support?</div>
                <div class="text-18 fw-500 mt-10">hi@gotrip.com</div>
              </div>
      
              <div class="col-lg-6 mb-30">
                <div class="text-14 text-light-1">Follow us on social media</div>
                <div class="d-flex x-gap-20 items-center mt-10">
                  <a href="#"><i class="icon-facebook text-14"></i></a>
                  <a href="#"><i class="icon-twitter text-14"></i></a>
                  <a href="#"><i class="icon-instagram text-14"></i></a>
                  <a href="#"><i class="icon-linkedin text-14"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div>
              @livewire('web.contact')
            </div>
          </div>
        </div>         
      </div>
    </div>
  </section>

  <section class="layout-pt-lg layout-pb-lg bg-blue-2">
    <div class="container">
      <div class="row justify-center text-center">
        <div class="col-auto">
          <div class="sectionTitle -md">
            <h2 class="sectionTitle__title">Why Choose Us</h2>
            <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
          </div>
        </div>
      </div>

      <div class="row y-gap-40 justify-between pt-50">

        <div class="col-lg-3 col-sm-6">

          <div class="featureIcon -type-1 ">
            <div class="d-flex justify-center">
              <img src="#" data-src="{{ asset('assets/images/featureIcons/1/1.svg') }}" alt="image" class="js-lazy">
            </div>

            <div class="text-center mt-30">
              <h4 class="text-18 fw-500">Best Price Guarantee</h4>
              <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>

        </div>

        <div class="col-lg-3 col-sm-6">

          <div class="featureIcon -type-1 ">
            <div class="d-flex justify-center">
              <img src="#" data-src="{{ asset('assets/images/featureIcons/1/2.svg') }}" alt="image" class="js-lazy">
            </div>

            <div class="text-center mt-30">
              <h4 class="text-18 fw-500">Easy & Quick Booking</h4>
              <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>

        </div>

        <div class="col-lg-3 col-sm-6">

          <div class="featureIcon -type-1 ">
            <div class="d-flex justify-center">
              <img src="#" data-src="{{ asset('assets/images/featureIcons/1/3.svg') }}" alt="image" class="js-lazy">
            </div>

            <div class="text-center mt-30">
              <h4 class="text-18 fw-500">Customer Care 24/7</h4>
              <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

  <section class="layout-pt-md layout-pb-md bg-dark-2">
    <div class="container">
      <div class="row y-gap-30 justify-between items-center">
        <div class="col-auto">
          <div class="row y-gap-20  flex-wrap items-center">
            <div class="col-auto">
              <div class="icon-newsletter text-60 sm:text-40 text-white"></div>
            </div>

            <div class="col-auto">
              <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here</h4>
              <div class="text-white">Sign up and we'll send the best deals to you</div>
            </div>
          </div>
        </div>

        <div class="col-auto">
          <div class="single-field -w-410 d-flex x-gap-10 y-gap-20">
            <div>
              <input class="bg-white h-60" type="text" placeholder="Your Email">
            </div>

            <div>
              <button class="button -md h-60 bg-blue-1 text-white">Subscribe</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection