
@extends('web.layout.app')

@section('content')

  <div class="header-margin"></div>
  <section class="layout-pt-md layout-pb-lg">
    <div class="container">
      <div class="row y-gap-30">
        <div class="col-xl-3 col-lg-4 lg:d-none">
          <aside class="sidebar y-gap-40">     
            <form action="{{ route('web.filter.package') }}" method="GET"> 
              @csrf  
              <div class="sidebar__item -no-border">
                <h5 class="text-18 fw-500 mb-10">Search by package name</h5>
                <div class="single-field relative d-flex items-center py-10">
                  <input class="pl-50 border-light text-dark-1 h-50 rounded-8" type="text"
                    placeholder="e.g. Paris" name="package" @if(isset($destText)) value="{{ $destText }}" @endif>
                  <button class="absolute d-flex items-center h-full">
                    <i class="icon-search text-20 px-15 text-dark-1"></i>
                  </button>
                </div>
              </div>

              <div class="sidebar__item pb-30">
                <h5 class="text-18 fw-500 mb-10">Price</h5>
                <div class="row x-gap-10 y-gap-30">
                  <div class="col-12">
                    <div class="js-price-rangeSlider">
                      <div class="text-14 fw-500"></div>

                      <div class="d-flex justify-between mb-20">
                        <div class="text-15 text-dark-1">
                          <span class="js-lower"></span>
                          -
                          <span class="js-upper"></span>
                        </div>
                      </div>

                      <div class="px-5">
                        <div class="js-slider"></div>
                      </div>
                    </div>
                    <div id="price-range-div">
                      <input type="hidden" name="minval" id="minval" value="0"/>
                      <input type="hidden" name="maxval" id="maxval" value="2000" />
                    </div>
                  </div>
                </div>
              </div>

              <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Star Rating</h5>
                <div class="row x-gap-10 y-gap-10 pt-10 pb-10">

                  <div class="col-auto" style="position: relative;">
                    <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">1</a>
                    <input type="checkbox" style="position: absolute; top: 0; opacity: 0; z-index: -1;" name="check[]" value="1">
                  </div>

                  <div class="col-auto" style="position: relative;">
                    <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">2</a>
                    <input type="checkbox" style="position: absolute; top: 0; opacity: 0; z-index: -1;" name="check[]" value="2">
                  </div>

                  <div class="col-auto" style="position: relative;">
                    <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">3</a>
                    <input type="checkbox" style="position: absolute; top: 0; opacity: 0; z-index: -1;" name="check[]" value="3">
                  </div>

                  <div class="col-auto" style="position: relative;">
                    <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">4</a>
                    <input type="checkbox" style="position: absolute; top: 0; opacity: 0; z-index: -1;" name="check[]" value="4">
                  </div>

                  <div class="col-auto" style="position: relative;">
                    <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">5</a>
                    <input type="checkbox" style="position: absolute; top: 0; opacity: 0; z-index: -1;" name="check[]" value="5">
                  </div>

                </div>
              </div>

              <div class="sidebar__item dNone">
                <h5 class="text-18 fw-500 mb-10">Guest Rating</h5>
                <div class="sidebar-checkbox">

                  <div class="row y-gap-10 items-center justify-between">
                    <div class="col-auto">

                      <div class="form-radio d-flex items-center ">
                        <div class="radio">
                          <input type="radio" name="name">
                          <div class="radio__mark">
                            <div class="radio__icon"></div>
                          </div>
                        </div>
                        <div class="ml-10">Any</div>
                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">92</div>
                    </div>
                  </div>

                  <div class="row y-gap-10 items-center justify-between">
                    <div class="col-auto">

                      <div class="form-radio d-flex items-center ">
                        <div class="radio">
                          <input type="radio" name="name">
                          <div class="radio__mark">
                            <div class="radio__icon"></div>
                          </div>
                        </div>
                        <div class="ml-10">Wonderful 4.5+</div>
                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">45</div>
                    </div>
                  </div>

                  <div class="row y-gap-10 items-center justify-between">
                    <div class="col-auto">

                      <div class="form-radio d-flex items-center ">
                        <div class="radio">
                          <input type="radio" name="name">
                          <div class="radio__mark">
                            <div class="radio__icon"></div>
                          </div>
                        </div>
                        <div class="ml-10">Very good 4+</div>
                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">21</div>
                    </div>
                  </div>

                  <div class="row y-gap-10 items-center justify-between">
                    <div class="col-auto">

                      <div class="form-radio d-flex items-center ">
                        <div class="radio">
                          <input type="radio" name="name">
                          <div class="radio__mark">
                            <div class="radio__icon"></div>
                          </div>
                        </div>
                        <div class="ml-10">Good 3.5+ </div>
                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">78</div>
                    </div>
                  </div>

                </div>
              </div>

              <button type="submit" class="button -md -dark-1 bg-blue-1 text-white mt-24">
                Apply filter <div class="icon-arrow-top-right ml-15"></div>
              </button>

            </form>
          </aside>
        </div>

        <div class="col-xl-9 col-lg-8">
          <div class="row y-gap-10 items-center justify-between">
            <div class="col-auto">
              <div class="text-18"><span class="fw-500">{{ $packagesCount }} packages</span> </div>
            </div>

            <div class="col-auto">
              <div class="row x-gap-20 y-gap-20">                

                <div class="col-auto d-none lg:d-block">
                  <button data-x-click="filterPopup"
                    class="button -blue-1 h-40 px-20 rounded-100 bg-blue-1-05 text-15 text-blue-1">
                    <i class="icon-up-down text-14 mr-10"></i>
                    Filter
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="filterPopup bg-white" data-x="filterPopup" data-x-toggle="-is-active">
            <aside class="sidebar -mobile-filter">
              <div data-x-click="filterPopup" class="-icon-close">
                <i class="icon-close"></i>
              </div>             

              <form action="{{ route('web.filter.package') }}" method="get"> 
                @csrf  
                <div class="sidebar__item -no-border">
                  <h5 class="text-18 fw-500 mb-10">Search by package name</h5>
                  <div class="single-field relative d-flex items-center py-10">
                    <input class="pl-50 border-light text-dark-1 h-50 rounded-8" type="text"
                      placeholder="e.g. Paris" name="package" @if(isset($destText)) value="{{ $destText }}" @endif>
                    <button class="absolute d-flex items-center h-full">
                      <i class="icon-search text-20 px-15 text-dark-1"></i>
                    </button>
                  </div>
                </div>
  
                <div class="sidebar__item pb-30">
                  <h5 class="text-18 fw-500 mb-10">Price</h5>
                  <div class="row x-gap-10 y-gap-30">
                    <div class="col-12">
                      <div class="js-price-rangeSlider">
                        <div class="text-14 fw-500"></div>
  
                        <div class="d-flex justify-between mb-20">
                          <div class="text-15 text-dark-1">
                            <span class="js-lower"></span>
                            -
                            <span class="js-upper"></span>
                          </div>
                        </div>
  
                        <div class="px-5">
                          <div class="js-slider"></div>
                        </div>
                      </div>
                      <div id="price-range-div-mobile">
                        <input type="hidden" name="minval" id="minvalmobile" value="0"/>
                        <input type="hidden" name="maxval" id="maxvalmobile" value="2000" />
                      </div>
                    </div>
                  </div>
                </div>
  
                <div class="sidebar__item">
                  <h5 class="text-18 fw-500 mb-10">Star Rating</h5>
                  <div class="row x-gap-10 y-gap-10 pt-10 pb-10">
  
                    <div class="col-auto" style="position: relative;">
                      <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">1</a>
                      <input type="checkbox" style="position: absolute; top: 0; opacity: 0; z-index: -1;" name="check[]" value="1">
                    </div>
  
                    <div class="col-auto" style="position: relative;">
                      <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">2</a>
                      <input type="checkbox" style="position: absolute; top: 0; opacity: 0; z-index: -1;" name="check[]" value="2">
                    </div>
  
                    <div class="col-auto" style="position: relative;">
                      <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">3</a>
                      <input type="checkbox" style="position: absolute; top: 0; opacity: 0; z-index: -1;" name="check[]" value="3">
                    </div>
  
                    <div class="col-auto" style="position: relative;">
                      <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">4</a>
                      <input type="checkbox" style="position: absolute; top: 0; opacity: 0; z-index: -1;" name="check[]" value="4">
                    </div>
  
                    <div class="col-auto" style="position: relative;">
                      <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">5</a>
                      <input type="checkbox" style="position: absolute; top: 0; opacity: 0; z-index: -1;" name="check[]" value="5">
                    </div>
  
                  </div>
                </div>
  
                <div class="sidebar__item dNone">
                  <h5 class="text-18 fw-500 mb-10">Guest Rating</h5>
                  <div class="sidebar-checkbox">
  
                    <div class="row y-gap-10 items-center justify-between">
                      <div class="col-auto">
  
                        <div class="form-radio d-flex items-center ">
                          <div class="radio">
                            <input type="radio" name="name">
                            <div class="radio__mark">
                              <div class="radio__icon"></div>
                            </div>
                          </div>
                          <div class="ml-10">Any</div>
                        </div>
  
                      </div>
  
                      <div class="col-auto">
                        <div class="text-15 text-light-1">92</div>
                      </div>
                    </div>
  
                    <div class="row y-gap-10 items-center justify-between">
                      <div class="col-auto">
  
                        <div class="form-radio d-flex items-center ">
                          <div class="radio">
                            <input type="radio" name="name">
                            <div class="radio__mark">
                              <div class="radio__icon"></div>
                            </div>
                          </div>
                          <div class="ml-10">Wonderful 4.5+</div>
                        </div>
  
                      </div>
  
                      <div class="col-auto">
                        <div class="text-15 text-light-1">45</div>
                      </div>
                    </div>
  
                    <div class="row y-gap-10 items-center justify-between">
                      <div class="col-auto">
  
                        <div class="form-radio d-flex items-center ">
                          <div class="radio">
                            <input type="radio" name="name">
                            <div class="radio__mark">
                              <div class="radio__icon"></div>
                            </div>
                          </div>
                          <div class="ml-10">Very good 4+</div>
                        </div>
  
                      </div>
  
                      <div class="col-auto">
                        <div class="text-15 text-light-1">21</div>
                      </div>
                    </div>
  
                    <div class="row y-gap-10 items-center justify-between">
                      <div class="col-auto">
  
                        <div class="form-radio d-flex items-center ">
                          <div class="radio">
                            <input type="radio" name="name">
                            <div class="radio__mark">
                              <div class="radio__icon"></div>
                            </div>
                          </div>
                          <div class="ml-10">Good 3.5+ </div>
                        </div>
  
                      </div>
  
                      <div class="col-auto">
                        <div class="text-15 text-light-1">78</div>
                      </div>
                    </div>
  
                  </div>
                </div>
  
                <button type="submit" class="button -md -dark-1 bg-blue-1 text-white mt-24">
                  Apply filter <div class="icon-arrow-top-right ml-15"></div>
                </button>
  
              </form>

            </aside>
          </div>

          <div class="mt-30"></div>

          <div class="row y-gap-30">

            @foreach ($packages as $package)
              <div class="col-12">

                <div class="border-top-light pt-30 pb-30">
                  <div class="row x-gap-20 y-gap-20">
                    <div class="col-md-auto">
                      @if ($package->getMedia()->count())                          
                        <div class="cardImage ratio ratio-1:1 w-250 md:w-1/1 rounded-4">
                          <div class="cardImage__content">
                            <img class="rounded-4 col-12" src="{{ asset($package->getMedia()->first()->getFullUrl()) }}" alt="image">
                          </div>

                          <div class="cardImage__wishlist dNone">
                            <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                              <i class="icon-heart text-12"></i>
                            </button>
                          </div>
                        </div>
                      @endif
                    </div>

                    <div class="col-md">
                      <h3 class="text-18 lh-16 fw-500">
                        {{ $package->name }}
                        <!-- <br class="lg:d-none"> Hotel, London -->

                        <div class="d-inline-block ml-10">
                          <i class="icon-star text-10 text-yellow-2"></i>
                          <i class="icon-star text-10 text-yellow-2"></i>
                          <i class="icon-star text-10 text-yellow-2"></i>
                          <i class="icon-star text-10 text-yellow-2"></i>
                          <i class="icon-star text-10 text-yellow-2"></i>
                        </div>
                      </h3>

                      <div class="text-14 lh-15 mt-20">
                        <div class="fw-500">{{ Str::limit($package->overview, 250) }}</div>
                      </div>
                      
                      <div class="row x-gap-10 y-gap-10 pt-20">
                        @foreach ($package->highlights as $highlight)                            
                          <div class="col-auto">
                            <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">{{ $highlight->highlight }}</div>
                          </div>
                        @endforeach
                      </div>
                    </div>

                    <div class="col-md-auto text-right md:text-left">
                      <div class="row x-gap-10 y-gap-10 justify-end items-center md:justify-start">
                        <div class="col-auto">
                          <div class="text-14 lh-14 fw-500 dNone">Exceptional</div>
                          <div class="text-14 lh-14 text-light-1">{{ count($package->reviews->reject(function($review){
                      return !$review->approved;
                    })) }} reviews</div>
                        </div>
                        <div class="col-auto">
                          <div class="flex-center text-white fw-600 text-14 size-40 rounded-4 bg-blue-1">{{ number_format($package->ratings->avg('rating'), 1, '.', ',') }}</div>
                        </div>
                      </div>

                      <div class="mt-4">
                        <div class="text-14 text-light-1">Adult</div>
                        <div class="text-22 lh-12 fw-600 mt-5">US $ {{ $package->price->adult_amount }} </div>
                        <div class="text-14 text-light-1">Children</div>
                        <div class="text-22 lh-12 fw-600 mt-5">US $ {{ $package->price->children_amount }}</div>

                        <a href="{{ route('package', ['slug' => $package->slug]) }}" class="button -md -dark-1 bg-blue-1 text-white mt-24">
                          View Package <div class="icon-arrow-top-right ml-15"></div>
                        </a>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            @endforeach

          </div>

          {{ $packages->links() }}

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

  <script>
    @php
      foreach($ratings as $eachRating){ @endphp
        document.querySelectorAll('.rating-filter-each-button').forEach(option => {
          if(option.innerText == "@php echo $eachRating; @endphp"){
            option.nextElementSibling.click();
            option.classList.toggle("ratingChecked");
          }
        })
    @php }
    @endphp
  </script>

@endsection