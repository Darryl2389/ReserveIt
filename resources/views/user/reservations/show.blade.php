@extends('layouts.app')
@section('content')

<div class="container">
  <div class ="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Reservation:{{$reservation->id}}
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
              <th>Name</th>
              <td>{{$reservation->user->name}}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>{{$reservation->date}}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{$reservation->time}}</td>
            </tr>
            <tr>
              <th>Party Size</th>
              <td>{{$reservation->party_size}}</td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('user.home',$reservation->id) }}" class="btn btn-default float">Back</a>
        <div class="float-right">
        <a href="{{ route('user.reviews.create', $restaurant->id) }}" class="btn btn-success">Write A Review</a>
        <a href="{{ route('user.reservations.edit', $reservation->id) }}" class="btn btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action="{{route('user.reservations.destroy', $reservation->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
