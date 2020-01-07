@extends('layouts.app')





@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Hi {{Auth::user()->name}}
                </div>
            </div>
            <br>
            <hr>
            <div class="card-header">
            Upcoming Reservations
          </div>
  <div class="card-body bg-light">
  @if (count($reservations) === 0)
  <p> There are no Reservations</p>
  @else
  <table id="table-reservations" class="table table-hover">
    <thead>
      <!-- table headings -->
      <th>Name</th>
      <th>Date</th>
      <th>Time</th>
      <th>Restaurant</th>
      <th>Party Size</th>
      <th> </th>
    </thead>
    <tbody>
      @foreach ($reservations as $reservation)
      <tr data-id="{{ $reservation->id }}">
        <td>{{ $reservation->user->name }}</td>
        <td>{{ $reservation->date}}</td>
        <td>{{ $reservation->time}}</td>
        <td>{{ $reservation->restaurant->name}}</td>
        <td>{{ $reservation->party_size}}</td>
        <td>
          <!-- view, edit & delete buttons -->
          <a href="{{ route('user.reservations.show', $reservation->id) }}" class="btn btn-primary">View</a>
          <a href="{{ route('user.reservations.edit', $reservation->id) }}" class="btn btn-warning">Edit</a>
          <form style="display:inline-block" method="POST" action="{{route('user.reservations.destroy',$reservation->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="form-control btn btn-danger">Delete</a>
          </form>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
        </div>
    </div>
  </div>
</div>
@endsection
