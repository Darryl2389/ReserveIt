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
@endsection
