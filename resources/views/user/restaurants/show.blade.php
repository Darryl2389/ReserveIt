@extends('layouts.app')

@section('content')

<div class="container">
  <div class ="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Restaurant:: {{$restaurant->name}}
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
    </div>
  </div>
</div>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/css/ol.css" type="text/css">
    <style>
      .map {
        height: 200px;
        width: 25%;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/build/ol.js"></script>
    <title>OpenLayers example</title>
  </head>
  <body>
    <h2>My Map</h2>
    <div id="map" class="map"></div>
    <script type="text/javascript">
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([37.41, 8.82]),
          zoom: 4
        })
      });
    </script>
  </body>
@endsection
