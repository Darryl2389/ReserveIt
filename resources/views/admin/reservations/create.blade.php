@extends('layouts.app')

@section('content')
<div class ="container">
  <div class="row">
    <div class ="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="header">
          Create Reservation
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
          <form method = "POST" action = "{{route('admin.reservations.store')}}">
            <input type ="hidden" name="_token" value="{{ csrf_token()}}">
            <div class="form-group">
              <label for ="title"> Name </label>
              <input type ="text" class="form-control" id="name" name="name" value="{{old('name')}}"/>
            </div>
            <div class="form-group">
              <label for ="title"> Date </label>
              <input type ="date" class="form-control" id="date" name="date" value="{{old('date')}}"/>
            </div>
            <div class="form-group">
              <label for ="title"> Time </label>
              <input type ="time" class="form-control" id="time" name="time" value="{{old('time')}}"/>
            </div>
            <div class="form-group">
              <label for ="title"> Party Size </label>
              <input type ="select" class="form-control" id="party_size" name="party_size" value="{{old('party_size')}}"/>
            </div>
            <div class="form-group">
              <label for ="title"> Restaurant </label>
              <input type ="select" class="form-control" id="restaurant_id" name="restaurant_id" value="{{old('restaurant_id')}}"/>
            </div>
            <div class="form-group">
              <label for ="title"> Table </label>
              <input type ="select" class="form-control" id="table_id" name="table_id" value="{{old('table_id')}}"/>
            </div>


            <a href="{{route('admin.reservations.index')}}" class="btn btn-link"> Cancel </a>
            <button type="submit" class="btn btn-primary float-right"> Submit </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection
