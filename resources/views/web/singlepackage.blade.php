
@extends('web.layout.app')

@section('content')
@php
  $json = array("name" => "Package name", "starRating" => 5, "highlights" => array("In London City Centre", "Airport transfer", "Front desk [24-hour]", "Premium TV channels"), "overview" => '<p>Description of this package</p>', "facilities" => array("Non-smoking rooms", "Free WiFi", "Parking", "Kitchen", "Living Area", "Safety & security"), "landmarks" => array(array('place' => 'Royal Pump Room Museum', 'distance' => '0.1 km'), array('place' => 'Royal Pump Room Museum', 'distance' => '0.1 km'), array('place' => 'Royal Pump Room Museum', 'distance' => '0.1 km'), array('place' => 'Royal Pump Room Museum', 'distance' => '0.1 km'), 'faqs' => array(array('que' => 'What do I need to hire a car?', 'ans' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.'), array('que' => 'What do I need to hire a car?', 'ans' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.'), array('que' => 'What do I need to hire a car?', 'ans' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.'))));
  
@endphp
  <div class="header-margin"></div>

  <section class="pt-40">
    <div class="container">
      <div class="row y-gap-20 justify-between items-end">
        <div class="col-auto">
          <div class="row x-gap-20  items-center">
            <div class="col-auto">
              <h1 class="text-30 sm:text-25 fw-600">{{ $package->name }}</h1>
            </div>

            <div class="col-auto">

              @for ($i=0; $i <$json['starRating']; $i++)
                <i class="icon-star text-10 text-yellow-1"></i>
              @endfor

            </div>
          </div>

          <div class="row x-gap-20 y-gap-20 items-center">
            <div class="col-auto">
              <div class="d-flex items-center text-15 text-light-1">
                <i class="icon-location-2 text-16 mr-5"></i>
                Moscow Road, Kensington and Chelsea, London, W2 4EL, United Kingdom
              </div>
            </div>           
          </div>
        </div>
      </div>

      @if ($package->getMedia()) 
        <div class="galleryGrid -type-1 pt-30">
          @foreach ($package->getMedia() as $media)
              
            <div class="galleryGrid__item {{ $loop->index%2==0?'relative d-flex':'' }}">
              <img src="{{ asset($package->getMedia()->first()->getFullUrl()) }}" alt="image" class="rounded-4">
              @if ($loop->first)
                <div class="absolute px-20 py-20 col-12 d-flex justify-end">
                  <button class="button -blue-1 size-40 rounded-full flex-center bg-white text-dark-1 dNone">
                    <i class="icon-heart text-16"></i>
                  </button>
                </div>
              @endif
            </div>

          @endforeach

          {{-- <div class="galleryGrid__item relative d-flex">
            <img src="img/gallery/1/5.png" alt="image" class="rounded-4">

            <div class="absolute px-10 py-10 col-12 h-full d-flex justify-end items-end">
              <a href="img/gallery/1/1.png" class="button -blue-1 px-24 py-15 bg-white text-dark-1 js-gallery"
                data-gallery="gallery2">
                See All 90 Photos
              </a>
              <a href="img/gallery/1/2.png" class="js-gallery" data-gallery="gallery2"></a>
              <a href="img/gallery/1/3.png" class="js-gallery" data-gallery="gallery2"></a>
              <a href="img/gallery/1/4.png" class="js-gallery" data-gallery="gallery2"></a>
              <a href="img/gallery/1/5.png" class="js-gallery" data-gallery="gallery2"></a>
            </div>
          </div> --}}

        </div>
      @endif

    </div>
  </section>

  <section class="pt-30">
    <div class="container">
      <div class="row y-gap-30">
        <div class="col-xl-8">
          <div class="row y-gap-40">           
            <div id="overview" class="col-12">
              <h3 class="text-22 fw-500 pt-40 border-top-light">Overview</h3>
              <p class="text-dark-1 text-15 mt-20">
                {{ $package->overview }}
              </p>
              <!-- <a href="#" class="d-block text-14 text-blue-1 fw-500 underline mt-10">Show More</a> -->
            </div>

            <div class="col-12">
              <h3 class="text-22 fw-500 pt-40 border-top-light">Most Popular Things</h3>
              <div class="row y-gap-10 pt-20">

                @foreach ($package->highlights as $highlight)
                  <div class="col-md-5">
                    <div class="d-flex x-gap-15 y-gap-15 items-center">
                      <i class="icon-check"></i>
                      <div class="text-15">{{ $highlight->highlight }}</div>
                    </div>
                  </div>
                @endforeach

              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4">
          <div class="ml-50 lg:ml-0">
            <div class="px-30 py-30 border-light rounded-4 shadow-4">
              <div class="row">
                <div class="col-12">
                  <div class="text-14 d-flex justify-between">
                    Adult
                    <span class="text-18 text-dark-1 fw-500">US$ {{ $package->price->adult_amount }}</span>
                  </div>
                  <div class="text-14 d-flex justify-between">
                    Children
                    <span class="text-18 text-dark-1 fw-500">US$ {{ $package->price->children_amount }}</span>
                  </div>
                </div>
                <hr>
                <div class="col">
                  <div class="d-flex justify-between">
                    <div class="text-14">
                      <div class="lh-15 fw-500">Exceptional</div>
                      <div class="lh-15 text-light-1">{{ count($package->reviews) }} reviews</div>
                    </div>
  
                    <div class="size-40 flex-center bg-blue-1 rounded-4">
                      <div class="text-14 fw-600 text-white">{{ number_format($package->ratings->avg('rating'), 1, '.', ',') }}</div>
                    </div>
                  </div>
                </div>
              </div>  

              <div class="row y-gap-20 mt-3">    
                <div class="col-12">
                  <a href="{{ route('package.booking',['slug' => $package->slug]) }}" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                    Book Package <div class="icon-arrow-top-right ml-15"></div>
                  </a>
                </div>
              </div>
            </div>     
          </div>
        </div>

        <div class="col-xl-12">
          <div id="detailed-description" class="col-12">
            <h3 class="text-22 fw-500 pt-40 border-top-light">All Details</h3>
            <p class="text-dark-1 text-15 mt-20">
              {!! $package->description !!}
            </p>
          </div>

          <section class="layout-pt-md layout-pb-md">
            <div class="">
              <div data-anim="slide-up delay-1" class="row y-gap-20 justify-between items-end">
                <div class="col-auto">
                  <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">Destinations</h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0">These destinations have a lot to offer</p>
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

                  @foreach ($package->destinations as $destination)                            
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
          
        </div>
      </div>
    </div>
  </section>

  <div id="reviews"></div>
  <section class="pt-40">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="text-22 fw-500">Guest reviews</h3>
        </div>
      </div>

      <div class="row y-gap-30 items-center pt-20">
        <div class="col-lg-2">
          <div class="flex-center rounded-4 bg-blue-1-05">
            <div class="text-center py-2">
              <div class="text-30 md:text-50 fw-600 text-blue-1">{{ number_format($package->ratings->avg('rating'), 1, '.', ',') }}</div>
              <div class="fw-500 lh-1">Exceptional</div>
              <div class="text-14 text-light-1 lh-1 mt-5">{{ count($package->reviews) }} reviews</div>
            </div>
          </div>
        </div>

        <div class="col-lg-10">
          <div class="px-24 py-20 rounded-4 bg-green-1">
            <div class="row x-gap-20 y-gap-20 items-center">
              <div class="col-auto">
                <div class="flex-center size-60 rounded-full bg-white">
                  <i class="icon-star text-yellow-1 text-30"></i>
                </div>
              </div>

              <div class="col-auto">
                <h4 class="text-18 lh-15 fw-500">This package is in high demand!</h4>
                <div class="text-15 lh-15">7 travelers have booked today.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pt-40">
    <div class="container">
      <div class="row y-gap-60">

        @foreach($package->reviews as $review)
          <div class="col-lg-6">
            <div class="row x-gap-20 y-gap-20 items-center">
              <div class="col-auto">             
                <div class="uppercase text-18 border-dark-1 p-2 text-green-2 me-1 bg-blue-1-05 -round-logo">tk</div>
              </div>
              <div class="col-auto">
                <div class="fw-500 lh-15">{{ $review->name }}</div>
                <div class="text-14 text-light-1 lh-15">March 2022</div>
              </div>
            </div>

            <h5 class="fw-500 text-blue-1 mt-20">5 {{ $review->title }}</h5>
            <p class="text-15 text-dark-1 mt-10">{{ $review->comment }}</p>
          </div>
        @endforeach

      </div>
    </div>
  </section>

  <section class="pt-40">
    <div class="container">
      @livewire('web.packages.review', ['package' => $package])
    </div>
  </section>



  <div id="facilities"></div>

  <section id="faq" class="pt-40 layout-pb-md">
    <div class="container">
      <div class="pt-40 border-top-light">
        <div class="row y-gap-20">
          <div class="col-lg-4">
            <h2 class="text-22 fw-500">FAQs about<br> {{ $package->name }}</h2>
          </div>

          <div class="col-lg-8">
            <div class="accordion -simple row y-gap-20 js-accordion">
              @foreach ($package->faqs as $faq)                
                <div class="col-12">
                  <div class="accordion__item px-20 py-20 border-light rounded-4">
                    <div class="accordion__button d-flex items-center">
                      <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                        <i class="icon-plus"></i>
                        <i class="icon-minus"></i>
                      </div>

                      <div class="button text-dark-1">{{ $faq->question }}?</div>
                    </div>

                    <div class="accordion__content">
                      <div class="pt-20 pl-60">
                        <p class="text-15">{{ $faq->answer }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="layout-pt-md layout-pb-lg">
    <div class="container">
      <div class="row justify-center text-center">
        <div class="col-auto">
          <div class="sectionTitle -md">
            <h2 class="sectionTitle__title">Popular properties similar to {{ $package->name }}</h2>
            <p class=" sectionTitle__text mt-5 sm:mt-0">Enjoy every moments.. </p>
          </div>
        </div>
      </div>

      <div class="row y-gap-30 pt-40 sm:pt-20">

        @foreach ($relatedPackages as $package)
            
          <div class="col-xl-3 col-lg-3 col-sm-6">

            <a href="{{ $package->slug }}" class="hotelsCard -type-1 ">
              <div class="hotelsCard__image">
                @if ($package->getMedia()->count())
                                    
                  <div class="cardImage ratio ratio-1:1">
                    <div class="cardImage__content">

                      <img class="rounded-4 col-12" src="{{ asset($package->getMedia()->first()->getFullUrl()) }}" alt="image">


                    </div>

                    <div class="cardImage__wishlist">
                      <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                        <i class="icon-heart text-12"></i>
                      </button>
                    </div>


                    <div class="cardImage__leftBadge">
                      <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-dark-1 text-white">
                        Breakfast included
                      </div>
                    </div>

                  </div>
                
                @endif

              </div>

              <div class="hotelsCard__content mt-10">
                <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                  <span> {{ $package->name }}</span>
                </h4>

                <p class="text-light-1 lh-14 text-14 mt-5">{{ Str::limit($package->overview, 150) }}</p>

                <div class="d-flex items-center mt-20">
                  <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">4.8</div>
                  <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
                  <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
                </div>

                <div class="mt-20">
                  <span class="button py-10 -dark-1 text-blue-1 border-blue-1">View More</span>
                </div>
              </div>
            </a>

          </div>

        @endforeach

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

@push('styles')
    <style>
      .-round-logo{
        display: inline-flex; border-radius: 50%; width: 30px; height: 30px; align-items: center;justify-content: center;
      }
    </style>
@endpush