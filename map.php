<!DOCTYPE html>
<html>
  <head>
    <title>Place Autocomplete and Directions</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input,
      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 200px;
      }

      #origin-input:focus,
      #destination-input:focus {
        border-color: #4d90fe;
      }

      #mode-selector {
        color: #fff;
        background-color: #4d90fe;
        margin-left: 12px;
        padding: 5px 11px 0px 11px;
      }

      #mode-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

    </style>
  </head>
  <body>

    <input id="origin-input" class="controls" type="text"
        placeholder="Enter an origin location">

    <input id="destination-input" class="controls" type="text"
        placeholder="Enter a destination location">

    <div id="mode-selector" class="controls">
      <input type="radio" name="type" id="changemode-walking">
      <label for="changemode-walking">Walking</label>

      <input type="radio" name="type" id="changemode-transit">
      <label for="changemode-transit">Transit</label>

      <input type="radio" name="type" id="changemode-driving" checked="checked">
      <label for="changemode-driving">Driving</label>
    </div>

    <div id="map"></div>

    <!-- <div id="infowindow-content">
      <span id="place-name"  class="title"></span><br>
      Place ID <span id="place-id"></span><br>
      <span id="place-address"></span>
    </div> -->

    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 18
        });

    //     infowindow = new google.maps.InfoWindow();
    //     var service = new google.maps.places.PlacesService(map);
    //     service.nearbySearch({
    //       location: pyrmont,
    //       radius: 500,
    //       type: ['school']
    //     }, schoolCallback);
    //
    // service.nearbySearch({
    //       location: pyrmont,
    //       radius: 500,
    //       type: ['store']
    //     }, storeCallback);

        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;


        // latitude = marker.getPosition().lat();
        // longitude = marker.getPosition().lng();
        // var latlng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};


        // geocoder.geocode({'location': latlng}, function(results, status) {
        //     if (status === google.maps.GeocoderStatus.OK) {
        //       if (results[1]) {
        //         console.log(results[1].place_id);
        //       } else {
        //         window.alert('No results found');
        //       }
        //     } else {
        //       window.alert('Geocoder failed due to: ' + status);
        //     }
        //   });

        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
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
          // console.log(place.place_id);
          infowindowContent.children['place-address'].textContent =
              place.formatted_address;
          infowindow.open(map, marker);
        });

        new AutocompleteDirectionsHandler(map);

        // get Current location
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            //marker
            console.log(pos);
            infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);
            // service.nearbySearch({
            //   location: pos,
            //   radius: 500,
            //   type: ['school']
            // }, schoolCallback);

            service.nearbySearch({
              location: pos,
              radius: 500,
              type: ['store']
            }, storeCallback);
            // var value_1 = position.coords.latitude;
            // var value_2 = position.coords.longitude;
            // getLocotion(value_1 , value_2);
            // geocodeLatLng(geocoder, map, infowindow);
            // console.log(value_1);
            function schoolCallback(results, status) {
              if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                  createSchoolMarker(results[i]); //results doesn't contain anything related to type (school,store,etc)
                }
              }
            }

          function storeCallback(results, status) {
              if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                  createStoreMarker(results[i]);
                }
              }
            }

            function createSchoolMarker(place) {
              var placeLoc = place.geometry.location;
              var marker = new google.maps.Marker({
                icon:"http://icons.iconarchive.com/icons/oxygen-icons.org/oxygen/24/Categories-applications-education-school-icon.png",
                map: map,
                position: place.geometry.location
              });


              google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
              });
            }


           function createStoreMarker(place) {
              var placeLoc = place.geometry.location;
              var marker = new google.maps.Marker({
                icon:"http://icons.iconarchive.com/icons/paomedia/small-n-flat/24/shop-icon.png",
                map: map,
                position: place.geometry.location
              });

              google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
              });
            }
            var marker = new google.maps.Marker({
              position: pos,
              // placeId: place.place_id,
              map: map,
              title: 'Your location!'
            });
            // console.log(place.place_id);
            infoWindow.setPosition(pos);
            // show the text
            // infoWindow.setContent('Location found.');
            // infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      } // initMap()

       /**
        * @constructor
       */
       function AutocompleteDirectionsHandler(map) {
         this.map = map;
         this.originPlaceId = null;
         this.destinationPlaceId = null;
         this.travelMode = 'WALKING';
         var originInput = document.getElementById('origin-input');
         var destinationInput = document.getElementById('destination-input');
         var modeSelector = document.getElementById('mode-selector');
         this.directionsService = new google.maps.DirectionsService;
         this.directionsDisplay = new google.maps.DirectionsRenderer;
         this.directionsDisplay.setMap(map);

         var originAutocomplete = new google.maps.places.Autocomplete(
             originInput, {placeIdOnly: true});
         var destinationAutocomplete = new google.maps.places.Autocomplete(
             destinationInput, {placeIdOnly: true});

         this.setupClickListener('changemode-walking', 'WALKING');
         this.setupClickListener('changemode-transit', 'TRANSIT');
         this.setupClickListener('changemode-driving', 'DRIVING');

         this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
         this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

         this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
         this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
         this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
       }

       // Sets a listener on a radio button to change the filter type on Places
       // Autocomplete.
       AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
         var radioButton = document.getElementById(id);
         var me = this;
         radioButton.addEventListener('click', function() {
           me.travelMode = mode;
           me.route();
         });
       };

       AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
         var me = this;
         autocomplete.bindTo('bounds', this.map);
         autocomplete.addListener('place_changed', function() {
           var place = autocomplete.getPlace();
           if (!place.place_id) {
             window.alert("Please select an option from the dropdown list.");
             return;
           }
           if (mode === 'ORIG') {
             me.originPlaceId = place.place_id;
           } else {
             me.destinationPlaceId = place.place_id;
           }
           me.route();
         });

       };

       AutocompleteDirectionsHandler.prototype.route = function() {
         if (!this.originPlaceId || !this.destinationPlaceId) {
           return;
         }
         var me = this;

         this.directionsService.route({
           origin: {'placeId': this.originPlaceId},
           destination: {'placeId': this.destinationPlaceId},
           travelMode: this.travelMode
         }, function(response, status) {
           if (status === 'OK') {
             me.directionsDisplay.setDirections(response);
           } else {
             window.alert('Directions request failed due to ' + status);
           }
         });
       };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHfSds2L8YZ10k1_Is__CHFuXYfKwpz3I&libraries=places&callback=initMap"
        async defer></script>
  </body>
</html>
