@extends('layouts.app')
@section('content')

<div class="container">
  <div class ="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Reservation:: {{$reservation->title}}
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
        <a href="{{ route('admin.reservations.index',$reservation->id) }}" class="btn btn-default">Back</a>
        <a href="{{ route('admin.reservations.edit',$reservation->id) }}" class="btn btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action="{{route('admin.reservations.destroy', $reservation->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
