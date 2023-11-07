
@extends('web.layout.app')

@section('content')

    <section data-anim-wrap class="masthead -type-1 z-5">
      <div data-anim-child="fade" class="masthead__bg">
        <img src="#" alt="image" data-src="{{ asset('img/backgrounds/1.png') }}" class="js-lazy">
      </div>

      <div class="container">
        <div class="row justify-center">
          <div class="col-auto">
            <div class="text-center">
              <h1 data-anim-child="slide-up delay-4" class="text-60 lg:text-40 md:text-30 text-white">Find Next Place To
                Visit</h1>
              <p data-anim-child="slide-up delay-5" class="text-white mt-6 md:mt-10">Discover amzaing places at
                exclusive deals</p>
            </div>

            <div data-anim-child="slide-up delay-6" class="tabs -underline mt-60 js-tabs">


              <div class="tabs__content mt-30 md:mt-20 js-tabs-content">

                <div class="tabs__pane -tab-item-1 is-tab-el-active">

                  <div class="mainSearch -w-900 bg-white px-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 rounded-100">
                    <div class="button-grid items-center">

                      <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">

                        <div data-x-dd-click="searchMenu-loc">
                          <h4 class="text-15 fw-500 ls-2 lh-16">Destination</h4>

                          <div class="text-15 text-light-1 ls-2 lh-16">
                            <input autocomplete="off" type="search" placeholder="Where are you going?"
                              class="js-search js-dd-focus" />
                          </div>
                        </div>


                        <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc"
                          data-x-dd-toggle="-is-active">
                          <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
                            <div class="y-gap-5 js-results">

                              <div>
                                <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                  <div class="d-flex">
                                    <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                    <div class="ml-10">
                                      <div class="text-15 lh-12 fw-500 js-search-option-target">London</div>
                                      <div class="text-14 lh-12 text-light-1 mt-5">Greater London, United Kingdom</div>
                                    </div>
                                  </div>
                                </button>
                              </div>

                              <div>
                                <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                  <div class="d-flex">
                                    <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                    <div class="ml-10">
                                      <div class="text-15 lh-12 fw-500 js-search-option-target">New York</div>
                                      <div class="text-14 lh-12 text-light-1 mt-5">New York State, United States</div>
                                    </div>
                                  </div>
                                </button>
                              </div>

                              <div>
                                <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                  <div class="d-flex">
                                    <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                    <div class="ml-10">
                                      <div class="text-15 lh-12 fw-500 js-search-option-target">Paris</div>
                                      <div class="text-14 lh-12 text-light-1 mt-5">France</div>
                                    </div>
                                  </div>
                                </button>
                              </div>

                              <div>
                                <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                  <div class="d-flex">
                                    <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                    <div class="ml-10">
                                      <div class="text-15 lh-12 fw-500 js-search-option-target">Madrid</div>
                                      <div class="text-14 lh-12 text-light-1 mt-5">Spain</div>
                                    </div>
                                  </div>
                                </button>
                              </div>

                              <div>
                                <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                  <div class="d-flex">
                                    <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                    <div class="ml-10">
                                      <div class="text-15 lh-12 fw-500 js-search-option-target">Santorini</div>
                                      <div class="text-14 lh-12 text-light-1 mt-5">Greece</div>
                                    </div>
                                  </div>
                                </button>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="button-item">
                        <button
                          class="mainSearch__submit button -dark-1 h-60 px-35 col-12 rounded-100 bg-blue-1 text-white">
                          <i class="icon-search text-20 mr-10"></i>
                          Search
                        </button>
                      </div>
                    </div>
                  </div>
                </div>             

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="layout-pt-lg layout-pb-md">
      <div class="container">
        <div data-anim="slide-up delay-1" class="row y-gap-20 justify-between items-end">
          <div class="col-auto">
            <div class="sectionTitle -md">
              <h2 class="sectionTitle__title">Popular Destinations</h2>
              <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
            </div>
          </div>

          <div class="col-auto md:d-none">

            {{-- <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
              View All Destinations <div class="icon-arrow-top-right ml-15"></div>
            </a> --}}

          </div>
        </div>

        <div class="relative pt-40 sm:pt-20 js-section-slider" data-gap="30" data-scrollbar
          data-slider-cols="base-2 xl-4 lg-3 md-2 sm-2 base-1" data-anim="slide-up delay-2">
          <div class="swiper-wrapper">

            @foreach ($destinations as $destination)                            
              @if ($destination->getMedia()->count())                      
                <div class="swiper-slide">

                  <div class="citiesCard -type-1 d-block rounded-4 " style="cursor: default !important">
                      <div class="citiesCard__image ratio ratio-3:4">
                        <img src="#" data-src="{{ asset($destination->getMedia()->first()->getFullUrl()) }}" alt="image" class="js-lazy">
                      </div>                 
                    <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                      <div class="citiesCard__bg"></div>

                      <div class="citiesCard__top">
                        {{-- <div class="text-14 text-white">14 Hotel - 22 Cars - 18 Tours - 95 Activity</div> --}}
                      </div>

                      <div class="citiesCard__bottom">
                        <h4 class="text-26 md:text-20 lh-13 text-white mb-20">{{ $destination->name }}</h4>
                        {{-- <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">Discover</button> --}}
                      </div>
                    </div>
                  </div>

                </div>
              @endif
            @endforeach

          </div>


          <button
            class="section-slider-nav -prev flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-prev">
            <i class="icon icon-chevron-left text-12"></i>
          </button>

          <button
            class="section-slider-nav -next flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-next">
            <i class="icon icon-chevron-right text-12"></i>
          </button>


          <div class="slider-scrollbar bg-light-2 mt-40 sm:d-none js-scrollbar"></div>

          <div class="row pt-20 d-none md:d-block">
            <div class="col-auto">
              <div class="d-inline-block">

                <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
                  View All Destinations <div class="icon-arrow-top-right ml-15"></div>
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
      <div class="container">
        <div class="row y-gap-20">
          <div data-anim="slide-up" class="col-md-6">

            <div class="ctaCard -type-1 rounded-4 ">
              <div class="ctaCard__image ratio ratio-63:55">
                <img class="img-ratio js-lazy" src="#" data-src="{{ asset('img/backgrounds/1.png') }}" alt="image">
              </div>

              <div class="ctaCard__content py-70 px-70 lg:py-30 lg:px-30">


                <h4 class="text-40 lg:text-26 text-white">Things to do on<br> your trip</h4>

                <div class="d-inline-block mt-30">
                  <a href="#" class="button px-48 py-15 -blue-1 -min-180 bg-white text-dark-1">Experiences</a>
                </div>
              </div>
            </div>

          </div>

          <div data-anim="slide-up delay-1" class="col-md-6">

            <div class="ctaCard -type-1 rounded-4 ">
              <div class="ctaCard__image ratio ratio-63:55">
                <img class="img-ratio js-lazy" src="#" data-src="{{ asset('img/backgrounds/4.png') }}" alt="image">
              </div>

              <div class="ctaCard__content py-70 px-70 lg:py-30 lg:px-30">

                <div class="text-15 fw-500 text-white mb-10">Enjoy Summer Deals</div>


                <h4 class="text-40 lg:text-26 text-white">Up to 70% Discount!</h4>

                <div class="d-inline-block mt-30">
                  <a href="#" class="button px-48 py-15 -blue-1 -min-180 bg-white text-dark-1">Learn More</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
      <div data-anim="slide-up delay-1" class="container">
        <div class="row y-gap-10 justify-between items-end">
          <div class="col-auto">
            <div class="sectionTitle -md">
              <h2 class="sectionTitle__title">Recommended Trips</h2>
              <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames ac ante ipsum</p>
            </div>
          </div>


        </div>

        <div class="relative overflow-hidden pt-40 sm:pt-20 js-section-slider" data-gap="30" data-scrollbar
          data-slider-cols="xl-4 lg-3 md-2 sm-2 base-1" data-nav-prev="js-hotels-prev" data-pagination="js-hotels-pag"
          data-nav-next="js-hotels-next">
          <div class="swiper-wrapper">

            @foreach ($packages as $package)                
              <div class="swiper-slide">
                <a href="{{ route('package', ['slug' => $package->slug]) }}" class="hotelsCard -type-1 ">
                  <div class="hotelsCard__image">

                    <div class="cardImage ratio ratio-1:1">
                      @if ($package->getMedia()->count())                         
                        <div class="cardImage__content">
                          @if ($package->getMedia()->count() > 1) 
                          
                          <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                            <div class="swiper-wrapper">
                              
                              @foreach ($package->getMedia() as $media)
                                  
                                <div class="swiper-slide">
                                  <img class="col-12" src="{{ asset($media->getFullUrl()) }}" alt="image">
                                </div>

                              @endforeach                                  
    
                            </div>
    
                            <div class="cardImage-slider__pagination js-pagination"></div>
    
                            <div class="cardImage-slider__nav -prev">
                              <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-prev">
                                <i class="icon-chevron-left text-10"></i>
                              </button>
                            </div>
    
                            <div class="cardImage-slider__nav -next">
                              <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-next">
                                <i class="icon-chevron-right text-10"></i>
                              </button>
                            </div>
                          </div>
                          @else

                          <img class="rounded-4 col-12" src="{{ asset($package->getMedia()->first()->getFullUrl()) }}" alt="image">

                          @endif

                        </div>
                      @endif

                      <div class="cardImage__wishlist">
                        {{-- <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                          <i class="icon-heart text-12"></i>
                        </button> --}}
                      </div>

                      @if ($package->highlights->count())                          
                        <div class="cardImage__leftBadge">
                          <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-dark-1 text-white">
                            {{ $package->highlights->first()->highlight }}
                          </div>
                        </div>
                      @endif

                    </div>

                  </div>

                  <div class="hotelsCard__content mt-10">
                    <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                      <span>{{ $package->name }}</span>
                    </h4>

                    <p class="text-light-1 lh-14 text-14 mt-5">Westminster Borough, London</p>

                    <div class="d-flex items-center mt-20">
                      <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">4.8</div>
                      <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
                      <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
                    </div>

                    <div class="mt-5">
                      <div class="fw-500">
                        Adult <span class="text-blue-1">US$ {{ $package->price->adult_amount }}</span>
                        Children <span class="text-blue-1">US$ {{ $package->price->children_amount }}</span>
                      </div>
                      <span class="button py-10 -dark-1 text-blue-1 border-blue-1">View More</span>
                    </div>
                  </div>
                </a>
              </div>
          @endforeach

          </div>


          <div class="d-flex x-gap-15 items-center justify-center sm:justify-start pt-40 sm:pt-20">
            <div class="col-auto">
              <button class="d-flex items-center text-24 arrow-left-hover js-hotels-prev">
                <i class="icon icon-arrow-left"></i>
              </button>
            </div>

            <div class="col-auto">
              <div class="pagination -dots text-border js-hotels-pag"></div>
            </div>

            <div class="col-auto">
              <button class="d-flex items-center text-24 arrow-right-hover js-hotels-next">
                <i class="icon icon-arrow-right"></i>
              </button>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="layout-pt-lg layout-pb-lg bg-blue-2">
      <div data-anim-wrap class="container">
        <div class="row y-gap-40 justify-between">
          <div data-anim-child="slide-up delay-1" class="col-xl-5 col-lg-6">
            <h2 class="text-30">What our customers are<br> saying us?</h2>
            <p class="mt-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit
              amet tempor nibh finibus et. Aenean eu enim justo.</p>

            <div class="row y-gap-30 pt-60 lg:pt-40">
              <div class="col-sm-5 col-6">
                <div class="text-30 lh-15 fw-600">13m+</div>
                <div class="text-light-1 lh-15">Happy People</div>
              </div>

              <div class="col-sm-5 col-6">
                <div class="text-30 lh-15 fw-600">4.88</div>
                <div class="text-light-1 lh-15">Overall rating</div>

                <div class="d-flex x-gap-5 items-center pt-10">

                  <div class="icon-star text-blue-1 text-10"></div>

                  <div class="icon-star text-blue-1 text-10"></div>

                  <div class="icon-star text-blue-1 text-10"></div>

                  <div class="icon-star text-blue-1 text-10"></div>

                  <div class="icon-star text-blue-1 text-10"></div>

                </div>
              </div>
            </div>
          </div>

          <div data-anim-child="slide-up delay-2" class="col-lg-6">
            <div class="overflow-hidden js-testimonials-slider-3" data-scrollbar>
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="row items-center x-gap-30 y-gap-20">
                    <div class="col-auto">
                      <img src="#" data-src="{{ asset('img/avatars/1.png') }}" alt="image" class="js-lazy">
                    </div>

                    <div class="col-auto">
                      <h5 class="text-16 fw-500">Annette Black</h5>
                      <div class="text-15 text-light-1 lh-15">UX / UI Designer</div>
                    </div>
                  </div>

                  <p class="text-18 fw-500 text-dark-1 mt-30 sm:mt-20">The place is in a great location in Gumbet. The
                    area is safe and beautiful. The apartment was comfortable and the host was kind and responsive to
                    our requests.</p>
                </div>

                <div class="swiper-slide">
                  <div class="row items-center x-gap-30 y-gap-20">
                    <div class="col-auto">
                      <img src="#" data-src="{{ asset('img/avatars/1.png') }}" alt="image" class="js-lazy">
                    </div>

                    <div class="col-auto">
                      <h5 class="text-16 fw-500">Annette Black</h5>
                      <div class="text-15 text-light-1 lh-15">UX / UI Designer</div>
                    </div>
                  </div>

                  <p class="text-18 fw-500 text-dark-1 mt-30 sm:mt-20">The place is in a great location in Gumbet. The
                    area is safe and beautiful. The apartment was comfortable and the host was kind and responsive to
                    our requests.</p>
                </div>

                <div class="swiper-slide">
                  <div class="row items-center x-gap-30 y-gap-20">
                    <div class="col-auto">
                      <img src="#" data-src="{{ asset('img/avatars/1.png') }}" alt="image" class="js-lazy">
                    </div>

                    <div class="col-auto">
                      <h5 class="text-16 fw-500">Annette Black</h5>
                      <div class="text-15 text-light-1 lh-15">UX / UI Designer</div>
                    </div>
                  </div>

                  <p class="text-18 fw-500 text-dark-1 mt-30 sm:mt-20">The place is in a great location in Gumbet. The
                    area is safe and beautiful. The apartment was comfortable and the host was kind and responsive to
                    our requests.</p>
                </div>

              </div>

              <div class="d-flex items-center mt-60 sm:mt-20 js-testimonials-slider-pag">
                <div class="text-dark-1 fw-500 js-current">01</div>
                <div class="slider-scrollbar bg-border ml-20 mr-20 w-max-300 js-scrollbar"></div>
                <div class="text-dark-1 fw-500 js-all">05</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
      <div data-anim-wrap class="container">
        <div class="row y-gap-20 justify-between">

          <div data-anim-child="slide-up delay-1" class="col-lg-3 col-sm-6">

            <div class="featureIcon -type-1 ">
              <div class="d-flex justify-center">
                <img src="#" data-src="{{ asset('img/featureIcons/1/1.svg') }}" alt="image" class="js-lazy">
              </div>

              <div class="text-center mt-30">
                <h4 class="text-18 fw-500">Best Price Guarantee</h4>
                <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>

          </div>

          <div data-anim-child="slide-up delay-2" class="col-lg-3 col-sm-6">

            <div class="featureIcon -type-1 ">
              <div class="d-flex justify-center">
                <img src="#" data-src="{{ asset('img/featureIcons/1/2.svg') }}" alt="image" class="js-lazy">
              </div>

              <div class="text-center mt-30">
                <h4 class="text-18 fw-500">Easy & Quick Booking</h4>
                <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>

          </div>

          <div data-anim-child="slide-up delay-3" class="col-lg-3 col-sm-6">

            <div class="featureIcon -type-1 ">
              <div class="d-flex justify-center">
                <img src="#" data-src="{{ asset('img/featureIcons/1/3.svg') }}" alt="image" class="js-lazy">
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