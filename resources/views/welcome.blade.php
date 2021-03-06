@extends('layouts.app')

<meta name="viewport" content="width = device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('css/homePage.css') }}">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato:700|Raleway:600&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="{{ asset('storage/images/Logo-Mini.png') }}">

@section('content')
  <div class="vertical-center">
    <div class="container-fluid">
      <div class="justify-content-center">
        <div class="col-12">
          <row>
            <h1 class="heroImgText">Find A Restaurant</h1>
          <form method = "GET" action = "" role="search">
            <input type ="hidden" name="_token" id="formtsize" value="{{ csrf_token()}}">
            <div class="search-bar form-group">
              <input type ="search" class="form-control" id="search" name="search" placeholder="Search by Restaurant, Location or Type...">
              <search></search>
            </div>
            <!-- <button type="submit" class="btn btn-primary btn-lg float-right">Go</button> -->
          </form>
          </row>
        </div>
      </div>
    </div>
    <div class="gallery">
      <img class="card-img-top" src="{{ asset('storage/images/homeHero.jpg')}}" height="102%"/>
   </div>
  </div>

    <hr>
      @if (count($restaurants) === 0)
      <p> There are no Restaurants</p>
      @else
  <table id="table-restaurants" class="table float-left">
    <hr>
        <h4>Available Today</h4>
  <tr>
    @foreach ($restaurants as $restaurant)
    <div class="col-12">
      <td>
        @if($restaurant->id <=6)
        <a href="{{ route('user.restaurants.show',$restaurant->id)}}">
        <div class="card shadow rounded float-left">
              <img class="card-img-top" src="{{ asset('storage/images/'. $restaurant->image)}}" />
              <div class="card-body">
                <h5 class="card-title">{{ $restaurant->name }}</h5>
                <p>
                  <small>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-half" aria-hidden="true"></i>
                  <!-- <i class="fa fa-starempty-half" aria-hidden="true"></i> -->
                  {{count($restaurant->reviews)}} Reviews
                </small>
                </p>
                <p>
                  <small>
                {{ $restaurant->type }}
              </small>
              </p>
              </div>
      </div>
        </a>
      @endif
      </td>
    </div>
    @endforeach
  </tr>
  </table>
  @endif
  <script>
  $(document).ready(function(){
   fetch_restaurant_data();

   function fetch_restaurant_data(query = ''){
    $.ajax({
     url:"{{ route('welcome.action') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {
      $('search').html(data.table_data);
      $('#total_records').text(data.total_data);
     }
   });
   }
   $(document).on('keyup', '#search', function(){
    var query = $(this).val();
      fetch_restaurant_data(query);
   });

  });
  </script>
@endsection
