@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/css/ol.css" type="text/css">
    <style>
      #mapid {
        height: 250px;  /* The height is 400 pixels */
        width: 28%;  /* The width is the width of the web page */
        margin-left:4%;
        float:left;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/build/ol.js"></script>
</head>
<div class="container">
  <div class ="row">
    <div class="col-md-8 col-md-offset-2">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
      <br>
      <br>
<div class="card">
  <div class="card-header bg-secondary text-white">
    Reviews
  </div>
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
  <div id="mapid"></div>
  </div>
  <div class="card float-right">
    <!-- <div class="card-header bg-secondary text-white">
      {{$restaurant->name}}
    </div> -->
    <div class="card-body">
      <table class="table table-hover">
        <tbody>
          <tr>
          <th>Name</th>
          <td>{{$restaurant->name}}</td>
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
    <a href="{{ route('user.restaurants.index',$restaurant->id) }}" class="btn btn-default">Back</a>
    <a href="{{route('user.reservations.create',$restaurant->id)}}" class="btn btn-primary float-right">Book</a>
    </div>
  </div>
  <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('mapid'), {
          zoom: 18,
           disableDefaultUI: true,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);
        infoWindow = new google.maps.InfoWindow;
      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          infoWindow.setPosition(pos);
          infoWindow.setContent('You are here.');
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
      function geocodeAddress(geocoder, resultsMap) {
        var address = <?php echo json_encode($restaurant->location);?>;
         var name = <?php echo json_encode($restaurant->name);?>;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
            marker.setContent('You are here.');
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
      map.panToBounds(bounds);
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFwvIisc3OQj3v3hwM4a55EhxV3kUk8yI&callback=initMap">
  </script>

  </div>
</div>

@endsection
