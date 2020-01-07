@extends('layouts.app')





@section('content')
<div class="container">
  <div class ="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Your Reservations
        </div>
        <div class="card-body">
          @if (count($reservations) === 0 )
          <p> There are no Reservations</p>
          @else
          <table id="table-reservations" class="table table-hover">
            <thead>
              <th>Name</th>
              <th>Restaurant</th>
              <th>Date</th>
              <th>Time</th>
              <th>Party Size</th>
            </thead>
            <tbody>
              @foreach ($reservations as $reservation)
              <tr data-id="{{ $reservation->id }}">
                <td>{{ $reservation->user->name }}</td>
                <td>{{$reservation->restaurant->name}}</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->time }}</td>
                <td>{{ $reservation->party_size }}</td>
                <td>
                  <a href="{{ route('user.reservations.show',$reservation->id) }}" class="btn btn-default">View</a>
                  <a href="{{ route('user.reservations.edit',$reservation->id) }}" class="btn btn-warning">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{route('user.reservations.destroy', $reservation->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Cancel</a>
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
</div>
@endsection
