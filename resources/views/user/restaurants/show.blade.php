@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/css/ol.css" type="text/css">
    <style>
      #mapid {
        height: 300px;  /* The height is 400 pixels */
        width: 30%;  /* The width is the width of the web page */
        float:left;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/build/ol.js"></script>
    <title>OpenLayers example</title>
  </head>
<div class="container">
  <div class ="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          {{$restaurant->name}}
        </div>
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
      <br>
      <br>
<div class="card">
  <div class="card-header">
    Reviews
  </div>
  <table class="table table-hover">
    @if (count($reviews)==0)
    <p>There are no reviews</p>
    @else
    @foreach ($reviews as $review)
    <tbody>
      <tr>
      <th>User</th>
      <th>Review</th>
    </tr>
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
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('mapid'), {
          zoom: 11,
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
<!-- Load Leaflet from CDN-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet-src.js"></script>
    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet"></script>
    <!-- Esri Leaflet Geocoder -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css">
    <script src="https://unpkg.com/esri-leaflet-geocoder"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    </div>


<!-- <script>
  var address =;
  console.log(address);
var map = L.map("mapid").setView([40.34116255023715, -6.258249724881425], 4);
map.setZoom(19);
L.esri.basemapLayer("Streets").addTo(map);
L.esri.Geocoding.geocode({
requestParams: {
  maxLocations: 1
}
})
.text("SOLE Seafood & Grill, William Street South, Dublin")
.text(address)
.run(function(error, results, response) {
  console.log("results:", results);
  console.log('first result lat', results.results[0].latlng.lat);
  console.log('first result lng', results.results[0].latlng.lng);
  map.panTo(new L.LatLng(results.results[0].latlng.lat, results.results[0].latlng.lng));
  var marker = L.marker([53.34116255023715, -6.258249724881425]).addTo(map);
});
map.on('click', function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    console.log(lat);
    var marker = L.marker([e.latlng.lat,e.latlng.lng]).update(marker);
});
</script> -->
@endsection
