@extends('layouts.app')
@section('content')

{{-- Restaurant Show --}}

<head>
    {{-- Stylesheets & Script --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/css/ol.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/restaurantShowPage.css') }}"/>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/build/ol.js"></script>
</head>
<div class="container">
  <div class ="row">
    {{-- Header Image --}}
    <img class="cardImage" src="{{ asset('storage/images/'. $restaurant->image)}}" />

    {{-- Restaurant Information --}}
    <div class="card shadow-sm rounded">
      <div class="card-body">
        <table class="table table-hover">
          <tbody>
            <tr>
            <h1>{{$restaurant->name}}</h1>
          </tr>
          <tr>
            <th>Location</th>
            <td>{{$restaurant->location}}</td>
          </tr>
          <tr>
            <th>Type</th>
            <td>{{$restaurant->type}}</td>
          </tr>
          </tbody>
      </table>
      {{-- Back & Book Buttons --}}
      <a href="{{ route('user.restaurants.index',$restaurant->id) }}" class="btn btn-default">Back</a>
      <a href="{{route('user.reservations.create',$restaurant->id)}}" class="btn btn-primary float-right">Book</a>
      </div>
    </div>
    {{-- Map div where the actual map will appear. The javascript below provides all of the content --}}
    <div id="mapid"></div>
  </div>
    <hr>
    {{-- Restaurant Menu --}}
    <h4><b>Menu</b></h4>
          <a href="{{$restaurant->menu}}">Please click here to see the Menu</a>
          <br>
    <hr>
    {{-- Reviews of this restaurant --}}
    <h4><b>Reviews</b></h4>
    <div class="row">
      <div class="reviews">
          <div class="card float-left">
          {{-- Review Table --}}
            <table class="table table-hover">
              @if (count($reviews)==0)
              <p>There are no reviews</p>
              @else
              <tr>
              <th>User</th>
              <th>Review</th>
            </tr>
              @foreach ($reviews as $review)
              <tbody>
              <tr>
                <td>{{$review->user->name}}</td>
                <td>{{$review->review}}</td>
              </tr>
              @endforeach
              @endif
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- Google Maps API --}}

  <script>
      // Initialises Map
      function initMap() {
        var map = new google.maps.Map(document.getElementById('mapid'), {
            zoom: 18, //Map Zoom
            disableDefaultUI: true, //Disables UI clutter
            center: {lat: -34.397, lng: 150.644} //Map initial location
        });
        // Google Maps Geocoder
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);
        // Google Maps InfoWindow
        infoWindow = new google.maps.InfoWindow;

        // Finding the Users Current Location
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            // Gets current latitude & longitude co-ordinates
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            // Sets InfoWindow at lat/lng
            infoWindow.setPosition(pos);
            // Sets InfoWindow text
            infoWindow.setContent('You are here.');
            // Puts InfoWindow on Map
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
          }
        }

      // Geocoding Function
      function geocodeAddress(geocoder, resultsMap) {
        // gets address value from php
        var address = <?php echo json_encode($restaurant->location);?>;
        // gets name value from php
        var name = <?php echo json_encode($restaurant->name);?>;
        // inputs address value into the geocoder which turns address into longitude & latitude co-ordinates
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            // If it works, place marker on lng/lat co-ordinates
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
            //Centers map on marker
            map.setCenter(marker);
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

  </script>
  {{-- Google Maps API key & link --}}
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFwvIisc3OQj3v3hwM4a55EhxV3kUk8yI&callback=initMap">
  </script>

  </div>
</div>

@endsection
