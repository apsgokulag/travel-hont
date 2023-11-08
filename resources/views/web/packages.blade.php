
@extends('web.layout.app')

@section('content')

@php
  echo json_encode($packages);
@endphp

  <div class="header-margin"></div>
  <section class="layout-pt-md layout-pb-lg">
    <div class="container">
      <div class="row y-gap-30">
        <div class="col-xl-3 col-lg-4 lg:d-none">
          <aside class="sidebar y-gap-40">     
            <form action="{{ route('web.filter.package') }}" method="POST"> 
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
                    <input type="checkbox" style="position: absolute; top: 0; opacity: 0;" name="check[]" value="1">
                  </div>

                  <div class="col-auto" style="position: relative;">
                    <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">2</a>
                    <input type="checkbox" style="position: absolute; top: 0; opacity: 0;" name="check[]" value="2">
                  </div>

                  <div class="col-auto" style="position: relative;">
                    <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">3</a>
                    <input type="checkbox" style="position: absolute; top: 0; opacity: 0;" name="check[]" value="3">
                  </div>

                  <div class="col-auto" style="position: relative;">
                    <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">4</a>
                    <input type="checkbox" style="position: absolute; top: 0; opacity: 0;" name="check[]" value="4">
                  </div>

                  <div class="col-auto" style="position: relative;">
                    <a href="javascript:void(0);" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100 rating-filter-each-button">5</a>
                    <input type="checkbox" style="position: absolute; top: 0; opacity: 0;" name="check[]" value="5">
                  </div>

                </div>
              </div>

              <div class="sidebar__item">
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
              <div class="text-18"><span class="fw-500">{{ count($packages) }} packages</span> </div>
            </div>

            <div class="col-auto">
              <div class="row x-gap-20 y-gap-20">
                <div class="col-auto">
                  <button class="button -blue-1 h-40 px-20 rounded-100 bg-blue-1-05 text-15 text-blue-1">
                    <i class="icon-up-down text-14 mr-10"></i>
                    Top picks for your search
                  </button>
                </div>

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

              <div class="sidebar__item">
                <div class="flex-center ratio ratio-15:9 js-lazy" data-bg="img/general/map.png">
                  <button class="button py-15 px-24 -blue-1 bg-white text-dark-1 absolute" data-x-click="mapFilter">
                    <i class="icon-destination text-22 mr-10"></i>
                    Show on map
                  </button>
                </div>
              </div>

              <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Search by property name</h5>
                <div class="single-field relative d-flex items-center py-10">
                  <input class="pl-50 border-light text-dark-1 h-50 rounded-8" type="email"
                    placeholder="e.g. Best Western">
                  <button class="absolute d-flex items-center h-full">
                    <i class="icon-search text-20 px-15 text-dark-1"></i>
                  </button>
                </div>
              </div>

              <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Deals</h5>
                <div class="sidebar-checkbox">

                  <div class="row items-center justify-between">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="form-checkbox">
                          <input type="checkbox">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>
                        <div class="text-15 ml-10">Free cancellation</div>
                      </div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="form-checkbox">
                          <input type="checkbox">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>
                        <div class="text-15 ml-10">Reserve now, pay at stay </div>
                      </div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="form-checkbox">
                          <input type="checkbox">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>
                        <div class="text-15 ml-10">Properties with special offers</div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Popular Filters</h5>
                <div class="sidebar-checkbox">

                  <div class="row items-center justify-between">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="form-checkbox">
                          <input type="checkbox">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>
                        <div class="text-15 ml-10">Breakfast Included</div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">92</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="form-checkbox">
                          <input type="checkbox">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>
                        <div class="text-15 ml-10">Romantic</div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">45</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="form-checkbox">
                          <input type="checkbox">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>
                        <div class="text-15 ml-10">Airport Transfer</div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">21</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="form-checkbox">
                          <input type="checkbox">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>
                        <div class="text-15 ml-10">WiFi Included </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">78</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="form-checkbox">
                          <input type="checkbox">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>
                        <div class="text-15 ml-10">5 Star</div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">679</div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="sidebar__item pb-30">
                <h5 class="text-18 fw-500 mb-10">Nightly Price</h5>
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
                  </div>
                </div>
              </div>

              <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Amenities</h5>
                <div class="sidebar-checkbox">

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Breakfast Included</div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">92</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">WiFi Included </div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">45</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Pool</div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">21</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Restaurant </div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">78</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Air conditioning </div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">679</div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Star Rating</h5>
                <div class="row y-gap-10 x-gap-10 pt-10">

                  <div class="col-auto">
                    <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">1</a>
                  </div>

                  <div class="col-auto">
                    <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">2</a>
                  </div>

                  <div class="col-auto">
                    <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">3</a>
                  </div>

                  <div class="col-auto">
                    <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">4</a>
                  </div>

                  <div class="col-auto">
                    <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">5</a>
                  </div>

                </div>
              </div>

              <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Guest Rating</h5>
                <div class="sidebar-checkbox">

                  <div class="row items-center justify-between">
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

                  <div class="row items-center justify-between">
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

                  <div class="row items-center justify-between">
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

                  <div class="row items-center justify-between">
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

              <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Style</h5>
                <div class="sidebar-checkbox">

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Budget</div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">92</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Mid-range </div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">45</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Luxury</div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">21</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Family-friendly </div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">78</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Business </div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">679</div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="sidebar__item">
                <h5 class="text-18 fw-500 mb-10">Neighborhood</h5>
                <div class="sidebar-checkbox">

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Central London</div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">92</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Guests&#39; favourite area </div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">45</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Westminster Borough</div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">21</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Kensington and Chelsea </div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">78</div>
                    </div>
                  </div>

                  <div class="row items-center justify-between">
                    <div class="col-auto">

                      <div class="d-flex items-center">
                        <div class="form-checkbox ">
                          <input type="checkbox" name="name">
                          <div class="form-checkbox__mark">
                            <div class="form-checkbox__icon icon-check"></div>
                          </div>
                        </div>

                        <div class="text-15 ml-10">Oxford Street </div>

                      </div>

                    </div>

                    <div class="col-auto">
                      <div class="text-15 text-light-1">679</div>
                    </div>
                  </div>

                </div>
              </div>
            </aside>
          </div>

          <div class="mt-30"></div>

          <div class="row y-gap-30">

            {{-- <div class="col-12">

              <div class="border-top-light pt-30">
                <div class="row x-gap-20 y-gap-20">
                  <div class="col-md-auto">

                    <div class="cardImage ratio ratio-1:1 w-250 md:w-1/1 rounded-4">
                      <div class="cardImage__content">

                        <img class="rounded-4 col-12" src="img/lists/hotel/1/1.png" alt="image">


                      </div>

                      <div class="cardImage__wishlist">
                        <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                          <i class="icon-heart text-12"></i>
                        </button>
                      </div>


                    </div>

                  </div>

                  <div class="col-md">
                    <h3 class="text-18 lh-16 fw-500">
                      Great Northern Hotel, a Tribute Portfolio<br class="lg:d-none"> Hotel, London

                      <div class="d-inline-block ml-10">
                        <i class="icon-star text-10 text-yellow-2"></i>
                        <i class="icon-star text-10 text-yellow-2"></i>
                        <i class="icon-star text-10 text-yellow-2"></i>
                        <i class="icon-star text-10 text-yellow-2"></i>
                        <i class="icon-star text-10 text-yellow-2"></i>
                      </div>
                    </h3>

                    <div class="row x-gap-10 y-gap-10 items-center pt-10">
                      <div class="col-auto">
                        <p class="text-14">Westminster Borough, London</p>
                      </div>

                      <div class="col-auto">
                        <button data-x-click="mapFilter" class="d-block text-14 text-blue-1 underline">Show on
                          map</button>
                      </div>

                      <div class="col-auto">
                        <div class="size-3 rounded-full bg-light-1"></div>
                      </div>

                      <div class="col-auto">
                        <p class="text-14">2 km to city center</p>
                      </div>
                    </div>

                    <div class="text-14 lh-15 mt-20">
                      <div class="fw-500">King Room</div>
                      <div class="text-light-1">1 extra-large double bed</div>
                    </div>

                    <div class="text-14 text-green-2 lh-15 mt-10">
                      <div class="fw-500">Free cancellation</div>
                      <div class="">You can cancel later, so lock in this great price today.</div>
                    </div>

                    <div class="row x-gap-10 y-gap-10 pt-20">

                      <div class="col-auto">
                        <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">Breakfast</div>
                      </div>

                      <div class="col-auto">
                        <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">WiFi</div>
                      </div>

                      <div class="col-auto">
                        <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">Spa</div>
                      </div>

                      <div class="col-auto">
                        <div class="border-light rounded-100 py-5 px-20 text-14 lh-14">Bar</div>
                      </div>

                    </div>
                  </div>

                  <div class="col-md-auto text-right md:text-left">
                    <div class="row x-gap-10 y-gap-10 justify-end items-center md:justify-start">
                      <div class="col-auto">
                        <div class="text-14 lh-14 fw-500">Exceptional</div>
                        <div class="text-14 lh-14 text-light-1">3,014 reviews</div>
                      </div>
                      <div class="col-auto">
                        <div class="flex-center text-white fw-600 text-14 size-40 rounded-4 bg-blue-1">4.8</div>
                      </div>
                    </div>

                    <div class="">
                      <div class="text-14 text-light-1 mt-50 md:mt-20">8 nights, 2 adult</div>
                      <div class="text-22 lh-12 fw-600 mt-5">US$72</div>
                      <div class="text-14 text-light-1 mt-5">+US$828 taxes and charges</div>


                      <a href="#" class="button -md -dark-1 bg-blue-1 text-white mt-24">
                        See Availability <div class="icon-arrow-top-right ml-15"></div>
                      </a>

                    </div>
                  </div>
                </div>
              </div>

            </div> --}}

            @foreach ($packages as $package)
              <div class="col-12">

                <div class="border-top-light pt-30">
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
                          <div class="text-14 lh-14 fw-500">Exceptional</div>
                          <div class="text-14 lh-14 text-light-1">3,014 reviews</div>
                        </div>
                        <div class="col-auto">
                          <div class="flex-center text-white fw-600 text-14 size-40 rounded-4 bg-blue-1">4.8</div>
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

@endsection