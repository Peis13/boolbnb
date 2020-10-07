@extends('layouts.jumbo')

@section('head')
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"
                integrity="sha512-zT3zHcFYbQwjHdKjCu6OMmETx8fJA9S7E6W7kBeFxultf75OPTYUJigEKX58qgyQMi1m1EgenfjMXlRZG8BXaw==" crossorigin="anonymous"></script>

        <style>
            .contenitore {
                display: flex;
            }
            .custom-box {
                width: 100%;
                height: 500px;
                border: 1px solid white;
            }
            .search-nav {
                width: 40%;
                display: flex;
                justify-content: center;
                align-content: center;
            }
            .risultati {
                overflow-y: scroll;
            }

            .card_box {
                padding: 10px 20px;
                margin-bottom: 25px;
                /*border-radius: 10px;*/
                border: 2px solid rebeccapurple;
                box-shadow: 10px 10px 26px -8px rgba(0, 0, 0, 0.75);
            }


        </style>
@endsection

@section('content')

    <!-- Main Start -->
    <main>
      <section class="hero hero--video">
      <div class="container ">
      <div class="col-12">
      <div class="search">

      <form action="{{route('search')}}" class="mr-auto" id="form_my">
        <input id="address" type="text" name="address" placeholder="Dove vuoi andare?" value="{{isset($datasearch)? $datasearch : null}}" required>
        <input id="lat-value" type="text" name="latitude" placeholder="latitude" value="{{isset($latitude)? $latitude : old('latitude')}}" hidden>
        <input id="lng-value" type="text" name="longitude" placeholder="longitude" value="{{isset($longitude)? $longitude : old('longitude')}}" hidden>
        <button id='bottone'><i class="fa fa-search"></i></button>
      </form>

      </div>
      </div>
      </div>
      <video autoplay loop muted>
      <source src="https://raw.githubusercontent.com/solodev/hero-search-bar/master/images/hero-video.mp4" type="video/mp4">
      </video>
      </section>
        <!-- SEARCH BAR -->
        <!-- RESULT -->

{{--        <section class="clearfix">--}}
{{--          <div class="container-fluid">--}}
{{--            <div class="row justify-content-md-center">--}}
{{--              <div id="tv" class="search_box search_margin_top font-weight-bold col-md-auto text-center">--}}
{{--                <h3>RICERCA</h3>--}}
{{--                  <ul>--}}
{{--                    <div class="">--}}
{{--                        <label for="rooms">Numero stanze:</label>--}}
{{--                        <input type="range" id="rooms" min="1" max="9" step="1" value="2">--}}
{{--                        <a id="roomsvalue"></a>--}}
{{--                    </div>--}}
{{--                    <div class="">--}}
{{--                        <label for="beds"><i class="fas fa-bed option_icon"></i> Numero letti:</label>--}}
{{--                        <input type="range" id="beds" min="1" max="9" step="1" value="1">--}}
{{--                        <a id="bedsvalue"></a>--}}
{{--                    </div>--}}
{{--                    <div class="">--}}
{{--                        <label for="kmradius"><i class="fas fa-map-marker-alt option_icon add_red_my"></i> Raggio di ricerca (km):</label>--}}
{{--                        <input type="range" id="kmradius" min="2" max="200" step="2" value="20">--}}
{{--                        <a id="kmradiusvalue"></a>--}}
{{--                    </div>--}}
{{--                  </ul>--}}
{{--                  <ul class="">--}}
{{--                    <div class="">--}}
{{--                        <label for="wifi"><i class="fas fa-wifi extra_icon"></i> Wifi: </label>--}}
{{--                        <input type="checkbox" id="wifi" value="">--}}
{{--                    </div>--}}
{{--                    <div class="">--}}
{{--                        <label for="car"><i class="fas fa-parking extra_icon"></i> Posto macchina: </label>--}}
{{--                        <input type="checkbox" id="car" value="">--}}
{{--                    </div>--}}
{{--                    <div class="">--}}
{{--                        <label for="piscina"><i class="fas fa-swimmer extra_icon"></i> Piscina </label>--}}
{{--                        <input type="checkbox" id="piscina" value="">--}}
{{--                    </div>--}}
{{--                    <div class="">--}}
{{--                        <label for="portineria"><i class="fas fa-concierge-bell extra_icon"></i> Portineria </label>--}}
{{--                        <input type="checkbox" id="portineria" value="">--}}
{{--                    </div>--}}
{{--                    <div class="">--}}
{{--                        <label for="sauna"><i class="fas fa-hot-tub extra_icon"></i> Sauna </label>--}}
{{--                        <input type="checkbox" id="sauna" value="">--}}
{{--                    </div>--}}
{{--                    <div class="">--}}
{{--                        <label for="vistamare"><i class="fas fa-water"></i> Vista mare </label>--}}
{{--                        <input type="checkbox" id="vistamare" value="">--}}
{{--                    </div>--}}
{{--                  </ul>--}}
{{--              </div>--}}
{{--                <div class="lista container extra_padding margin_top_result offset-md-1 col-{breakpoint}-auto text-white" >--}}

{{--                </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </section>--}}


        <div class="contenitore">
            <div class="custom-box search-nav">
                <div class="container-fluid">
                    <div class="row justify-content-md-center">
                        <div id="tv" class="search_box col-md-auto text-center">
                            <h3>RICERCA</h3>
                            <ul>
                                <div class="">
                                    <label for="rooms">Numero stanze:</label>
                                    <input type="range" id="rooms" min="1" max="9" step="1" value="2">
                                    <a id="roomsvalue"></a>
                                </div>
                                <div class="">
                                    <label for="beds"><i class="fas fa-bed option_icon"></i> Numero letti:</label>
                                    <input type="range" id="beds" min="1" max="9" step="1" value="1">
                                    <a id="bedsvalue"></a>
                                </div>
                                <div class="">
                                    <label for="kmradius"><i class="fas fa-map-marker-alt option_icon add_red_my"></i> Raggio di ricerca (km):</label>
                                    <input type="range" id="kmradius" min="2" max="200" step="2" value="20">
                                    <a id="kmradiusvalue"></a>
                                </div>
                            </ul>
                            <ul class="">
                                <div class="">
                                    <label for="wifi"><i class="fas fa-wifi extra_icon"></i> Wifi: </label>
                                    <input type="checkbox" id="wifi" value="">
                                </div>
                                <div class="">
                                    <label for="car"><i class="fas fa-parking extra_icon"></i> Posto macchina: </label>
                                    <input type="checkbox" id="car" value="">
                                </div>
                                <div class="">
                                    <label for="piscina"><i class="fas fa-swimmer extra_icon"></i> Piscina </label>
                                    <input type="checkbox" id="piscina" value="">
                                </div>
                                <div class="">
                                    <label for="portineria"><i class="fas fa-concierge-bell extra_icon"></i> Portineria </label>
                                    <input type="checkbox" id="portineria" value="">
                                </div>
                                <div class="">
                                    <label for="sauna"><i class="fas fa-hot-tub extra_icon"></i> Sauna </label>
                                    <input type="checkbox" id="sauna" value="">
                                </div>
                                <div class="">
                                    <label for="vistamare"><i class="fas fa-water"></i> Vista mare </label>
                                    <input type="checkbox" id="vistamare" value="">
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-box risultati">
                <div class="lista container col-{breakpoint}-auto text-white" >

                </div>
            </div>
        </div>
    </main>
    <!-- Main End -->

    {{--          Sezione relativa ad Handlebars             --}}
    <script id="entry-templatenopromo" type="text/x-handlebars-template">
    <a href="/apartments/@{{ id }}">
                <div class="row my_padding card_box">
                    <div class="col-sm-3">
                        <img class="circle2" src="{{asset('storage')}}/@{{image_path}}" alt="appartamento">
                    </div>
                    <div class="col-sm-9">
                        <p class="text-black"><b>@{{ title }}</b></p>
                        <span class="text-black">Stanze @{{ rooms }} </span>
                        <span class="text-black">Letti @{{ beds }} </span>
                        <span class="text-black">Bagni @{{ bathrooms }} </span>
                        <span class="text-black">Metri quadri @{{ square }} </span>
                        <span class="text-black">Stanze @{{ address }} </span>
                        <span class="text-black">Stanze @{{ id }} </span>
                    </div>
                </div></a>
    </script>

    <script id="entry-templatepromo" type="text/x-handlebars-template">
    <a href="/apartments/@{{ id }}">
                <div class="row my_padding backround_evidence_my card_box">
                    <div class="col-sm-3">
                        <img class="circle" src="{{asset('storage')}}/@{{image_path}}" alt="appartamento">
                    </div>
                    <div class="col-sm-9">
                        <p class=""><b>@{{ title }}</b></p>
                        <span class="">Stanze @{{ rooms }} </span>
                        <span class="">Letti @{{ beds }} </span>
                        <span class="">IN EVIDENZA</span>
                        <span class="">Bagni @{{ bathrooms }} </span>
                        <span class="">Metri quadri @{{ square }} </span>
                        <span class="">Stanze @{{ address }} </span>
                        <span class="">Stanze @{{ id }} </span>
                    </div>
                </div></a>
    </script>


    {{--          Fine Sezione relativa ad Handlebars             --}}

    {{--  Script relativo ad Algolia  --}}
    <script src="{{asset('js/search.js')}}" ></script>
    <script>

        (function() {
            var placesAutocomplete = places({
                appId: 'plNO17G18F5R',
                apiKey: '9bc42c41773997040e2daf6810f20401',
                container: document.querySelector('#address')
            });

            placesAutocomplete.on('change', function(e) {
                document.querySelector('#lat-value').value = e.suggestion.latlng.lat
            });

            placesAutocomplete.on('change', function(e) {
                document.querySelector('#lng-value').value = e.suggestion.latlng.lng
            });

            placesAutocomplete.on('clear', function() {
                document.querySelector('#lat-value').value = '';
                document.querySelector('#lng-value').value = '';
                document.querySelector('#address').value = '';
            });

        })();
    </script>
    {{--  Script relativo ad Algolia  --}}

@endsection
