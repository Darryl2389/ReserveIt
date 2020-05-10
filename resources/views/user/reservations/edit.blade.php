@extends('layouts.app')
@section('content')

{{-- Users Edit Reservations --}}


<div class ="container">
  <div class="row">
    <div class ="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="header">
          Edit Reservation
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              {{-- Display errors --}}
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif
          {{-- Posts to reservations update when submited/POSTED --}}
          <form method = "POST" action ="{{ route('user.reservations.update',$reservation->id) }}">
            <input type ="hidden" name="_method" value="PUT">
            <input type ="hidden" name="_token" value="{{ csrf_token()}}">

            {{-- Date --}}
            <div class="form-group">
              <input type ="date" class="form-control" id="date" name="date" value="{{$reservation->date}}"/>
            </div>

            {{-- Time --}}
            <div class="form-group">
              <Label for ="title"> Time </label>
              <select name ="time" class="form-control" id="time" name="time" value="{{old('time', $reservation->date)}}">
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
              <Label for ="title"> Party Size </label>
              <select name ="party_size" placeholder="Party Size" class="form-control" id="party_size" name="party_size" value="{{old('party_size', $reservation->date)}}">
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

            <a href="{{route('user.home')}}" class="btn btn-link"> Cancel </a>
            <button type="submit" class="btn btn-primary float-right"> Submit </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection
