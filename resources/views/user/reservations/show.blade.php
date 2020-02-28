@extends('layouts.app')
@section('content')

{{-- User Reservations Show Page --}}

<div class="container">
  <div class ="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          {{-- Reservation Number --}}
          Reservation: {{$reservation->id}}
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
              {{-- Name --}}
              <th>Name</th>
              <td>{{$reservation->user->name}}</td>
            </tr>
            <tr>
              {{-- Date --}}
              <th>Date</th>
              <td>{{$reservation->date}}</td>
            </tr>
            <tr>
              {{-- Time --}}
              <th>Time</th>
              <td>{{$reservation->time}}</td>
            </tr>
            <tr>
              {{-- Party Size --}}
              <th>Party Size</th>
              <td>{{$reservation->party_size}}</td>
            </tr>
            </tbody>
        </table>
        {{-- Back button to User Home --}}
        <a href="{{ route('user.home',$reservation->id) }}" class="btn btn-default float">Back</a>
        <div class="float-right">
        {{-- Go to Review Create --}}
        <a href="{{ route('user.reviews.create', $restaurant->id) }}" class="btn btn-success">Write A Review</a>
        {{-- Go to Reservation Edit --}}
        <a href="{{ route('user.reservations.edit', $reservation->id) }}" class="btn btn-warning">Edit</a>
        {{-- Delete Reservation --}}
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
