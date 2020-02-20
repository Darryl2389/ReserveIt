@extends('layouts.app')
@section('content')

<div class="container">
  <div class ="row">
    <div class="col-md-8 col-md-offset-2">
      <div>
        <form method = "POST" action = "{{route('user.reviews.store',$restaurant->id)}}">
          <input type ="hidden" name="_token" value="{{ csrf_token()}}">
          <label for="review">Write A Review:</label><br>
          <textarea type="text" class="form-control" id="review" name="review" value="{{ old('review') }}">
          </textarea>
          <button type="submit" class="btn btn-primary btn-md">Post</button>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection
