@extends('layouts.app')

@section('content')
<div class="container">
  <div class ="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Restaurants
        </div>
        <div class="card-body">
          @if (count($restaurants) === 0 )
          <p> There are no Restaurants</p>
          @else
          <table id="table-restaurants" class="table table-hover">
            <thead>
              <th>Name</th>
              <th>Location</th>
              <th>Type</th>
            </thead>
            <tbody>
              @foreach ($restaurants as $restaurant)
              <tr data-id="{{ $restaurant->id }}">
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->location }}</td>
                <td>{{ $restaurant->type }}</td>
                <td>
                  <a href="{{ route('admin.restaurants.show',$restaurant->id) }}" class="btn btn-default">View</a>
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
