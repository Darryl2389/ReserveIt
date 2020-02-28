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
            {{-- Edit Name --}}
            <div class="form-group">
              <label for ="title"> Name</label>
              {{-- Takes old value from previous value --}}
              <input type ="text" class="form-control" id="name" name="name" value="{{old('name',$reservation->user->name)}}"/>
            </div>
            {{-- Edit Date --}}
            <div class="form-group">
              <label for ="title"> Date </label>
              <input type ="text" class="form-control" id="date" name="date" value="{{old('date',$reservation->date)}}"/>
            </div>
            {{-- Edit Name --}}
            <div class="form-group">
              <label for ="title"> Time </label>
              <input type ="text" class="form-control" id="time" name="time" value="{{old('time',$reservation->time)}}"/>
            </div>
            {{-- Party Size --}}
            <div class="form-group">
              <label for ="title"> Party Size </label>
              <input type ="text" class="form-control" id="party_size" name="party_size" value="{{old('party_size',$reservation->party_size)}}"/>
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
