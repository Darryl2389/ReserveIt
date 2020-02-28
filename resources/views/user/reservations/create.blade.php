@extends('layouts.app')

{{-- User Reservations Create --}}

@section('content')
<div class ="container">
  <div class="row">
    <div class ="col-md-8">
      <div class="header">
        Book Reservation
      </div>
      <div class="card">
        <div class="card-body">
          {{-- If fields are incorrect then show the errors --}}
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif
          {{-- If successful POST to user.reservations.store --}}
          <form method = "POST" action = "{{route('user.reservations.store')}}">
            <input type ="hidden" name="_token" value="{{ csrf_token()}}">

            {{-- Date --}}
            <div class="form-group">
              <input type ="date" class="form-control" id="date" name="date" value="{{old('date')}}"/>
            </div>

            {{-- Time --}}
            <div class="form-group">
              <select name ="time" placeholder="Time" class="form-control" id="time" name="time" value="{{old('time')}}">
                <option selected="Time">Time</Option>
                <option value="18:30">18:30</option>
                <option value="18:45">18:45</option>
                <option value="19:00">19:00</option>
                <option value="19:15">19:15</option>
                <option value="19:30">19:30</option>
                <option value="19:45">19:45</option>
                <option value="20:00">20:00</option>
                <option value="20:15">20:15</option>
                <option value="20:30">20:30</option>
                <option value="20:45">20:45</option>
                <option value="21:00">21:00</option>
              </select>
            </div>

            {{-- Number of People in Party --}}
            <div class="form-group">
              <select name ="party_size" placeholder="Party Size" class="form-control" id="party_size" name="party_size" value="{{old('party_size')}}">
                <option selected="Party Size">Party Size</Option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
            </div>

            {{-- Restaurant --}}
            <div class="form-group">
              <select name="restaurant_id" class="custom-select">
                {{-- Gets Restaurants from the Restaurant table --}}
                @foreach ($restaurants as $restaurant)
                {{-- Gets name & id from Restaurant --}}
                <option value="{{ $restaurant->id }}" {{old("$restaurant->id")}} >
                  {{$restaurant->name}}
                </option>
                @endforeach
              </select>
            </div>
            {{-- Cancel --}}
            <a href="{{url('/')}}" class="btn btn-lg btn-link"> Cancel </a>
            {{-- Submit --}}
            <button type="submit" class="btn btn-primary btn-lg float-right"> Book Now! </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection
