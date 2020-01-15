@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.1/css/ol.css" type="text/css">
    <style>
      .map {
        height: 285px;
        width: 33%;
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
    <body>
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
            // if($restaurant->id == 1)
              center: ol.proj.fromLonLat([-6.257977, 53.341435]),
              zoom: 18
            // else if($restaurant->id == 2)
            //   center: ol.proj.fromLonLat([-6.262804, 53.342070]),
            //   zoom: 18
          })
        });
      </script>
    </body>
  </div>
</div>

@endsection
