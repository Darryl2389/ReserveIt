@extends('layouts.app')

{{-- Admin Index Reservation --}}

@section('content')
<div class="container">
  <div class ="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-light">
          Reservations
          <a href="{{route('admin.reservations.create')}}" class="btn btn-primary float-right">Add</a>
        </div>
        <div class="card-body">
          @if (count($reservations) === 0)
          <p> There are no Reservations</p>
          @else
          <table id="table-reservations" class="table table-hover">
            <thead class = "thead-light">
              <th>Name</th>
              <th>Date</th>
              <th>Time</th>
              <th>Restaurant</th>
              <th>Party Size</th>
              <th></th>
            </thead>
            <tbody>
              @foreach ($reservations as $reservation)
              <tr data-id="{{ $reservation->id }}">
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->time }}</td>
                <td>{{ $reservation->restaurant->name }}</td>
                <td>{{ $reservation->party_size }}</td>

                <td>
                  <a href="{{ route('admin.reservations.show', $reservation->id) }}" class="btn btn-default">View</a>
                  <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-warning">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{route('admin.reservations.destroy', $reservation->id) }}">
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
</div>
@endsection
