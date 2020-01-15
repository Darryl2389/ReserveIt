@extends('layouts.app')

@section('content')
<div class ="container">
  <div class="row">
    <div class ="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="header">
          Book Reservation
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form method = "POST" action = "{{route('user.reservations.store')}}">
            <input type ="hidden" name="_token" value="{{ csrf_token()}}">
            <div class="form-group">
              <!-- <label for ="title"> Date </label> -->
              <input type ="date" class="form-control" id="date" name="date" value="{{old('date')}}"/>
            </div>
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
            <div class="form-group">
              <select name="restaurant_id" class="custom-select">
                @foreach ($restaurants as $restaurant)
                <option value="{{ $restaurant->id }}" {{old("$restaurant->id")}} >
                  {{$restaurant->name}}
                </option>
                @endforeach
              </select>
            </div>
            <!-- <a href="{{route('admin.reservations.index')}}" class="btn btn-lg btn-link"> Cancel </a> -->
            <button type="submit" class="btn btn-primary btn-lg float-right"> Book Now! </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection
