<!-- Footer -->
<footer id="footer">

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 widget bottom-xs-pad-20">
                    <div class="widget-title">
                        <!-- Title -->
                        <h3 class="title">Contact Information</h3>
                    </div>
                    <!-- Address -->
                    <p>
                        <strong>Office:</strong> Jaffna Town, Jaffna.<br/>
                    </p>
                    <!-- Phone -->
                    <p>
                        <strong>Call Us:</strong> 77 (851) 4083<br/>
                    </p>
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="301" height="211" id="gmap_canvas" src="https://maps.google.com/maps?q=jaffna&t=&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.emojilib.com">emojilib.com</a></div><style>.mapouter{position:relative;text-align:right;height:211px;width:301px;}.gmap_canvas {overflow:hidden;background:none!important;height:211px;width:301px;}</style></div>
                
                </div>

             

                <div class="col-xs-12 col-sm-6 col-md-4 widget bottom-xs-pad-20">
                    <div class="widget-title">
                        <!-- Title -->
                        <h3 class="title">Quick Links</h3>
                    </div>
                    <nav>
                        <ul>
                            <div class="col-xs-12 col-sm-6 col-md-4 widget bottom-xs-pad-20">
                            <!-- List Items -->
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('about')}}">About</a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">Contact</a>
                            </li>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 widget bottom-xs-pad-20">
                            
                            <li>
                                <a href="{{route('frontfaq')}}">FAQ</a>
                            </li>
                            <li>
                                <a href="{{route('fronttnc')}}">Term & Conditions</a>
                            </li>
                        </div>

                        </ul>
                    </nav>


                </div>
                

                <div class="col-xs-12 col-sm-6 col-md-4 widget">
                    <div class="widget-title">
                        <!-- Title -->
                        <h3 class="title">About us </h3>
                    </div>
                    <nav>
                        <ul class="footer-blog">
                            <!-- List Items -->
                            <li>
                                <a href="#">about us.</a>
                            </li>

                        </ul>
                    </nav>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- footer-top -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <!-- Copyrights -->
                <div class="col-xs-10 col-sm-6 col-md-6"> &copy; 2019
                    <a href="">site</a>
                    . BTRS. <br/>
                    <!-- Terms Link -->

                    <a href="#">Terms of Use</a>
                    /
                    <a href="#">Privacy Policy</a>
                </div>
                <div class="col-xs-2 col-sm-6 col-md-6 text-right page-scroll gray-bg icons-circle i-3x">
                    <!-- Goto Top -->
                    <a href="#page">
                        <i class="glyphicon glyphicon-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom -->
</footer>
<!-- footer -->
</div>
<!-- CSRF TOKEN -->
<script>
    $.ajaxSetup({
        data: {
            _csrf: $('meta[name=csrf-token]').prop('content')
        }
    });
</script>


<script src="{{ url('/frontend/js/jquery-ui.js') }}"></script>
<script src="{{ url('/frontend/js/plugins.min.js') }}"></script>
<script src="{{ url('/frontend/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('/frontend/js/custom.js') }}"></script>
@section('scripts')
<!--Geolocation-->
<script>

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 9.6615, lng: 80.0255},
          zoom: 13
        });

        
        var abujaBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(9.6615, 80.0255),
            new google.maps.LatLng(9.6615, 80.0255)
        );
        var input = document.getElementById('pac-input');
        var options = {
            // types: ['(cities)'],
            bounds: abujaBounds,
            // componentRestrictions: {
            //     country: 'ng'
            // },
            strictBounds: true
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        var place_id_form = document.getElementById('place_id');
        var place_name_form = document.getElementById('place_name');
        var place_code_form = document.getElementById('place_code');
        var place_geometry_form = document.getElementById('geometry');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            return;
          }

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }

          // Set the position of the marker using the place ID and location.
          marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location
          });
          marker.setVisible(true);

          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-id'].textContent = place.place_id;
          infowindowContent.children['place-address'].textContent =
              place.formatted_address;
          infowindow.open(map, marker);
          place_id_form.value = place.place_id;
          place_name_form.value = place.name;
          place_geometry_form.value = place.geometry.location;
          upper = place.name.substring(0,3);
          place_code_form.value = upper.toUpperCase();

        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB56zdHnTuCvhJyLLGjCpR9e8FKSiRPKYc&libraries=places&callback=initMap"
        async defer></script>
@endsection
<body>
    <input id="pac-input" class="controls" type="text"
        placeholder="Enter a location" value="jaffna" hidden="hidden">
</body>



