@extends('layouts.app')
<style type="text/css">
.gallery {
    overflow: hidden;
    height: 25rem;
    margin-top:-25px;
}
form {
  border-radius: 15px 15px 15px 15px;
  padding: 180px;
  display: flex;
  margin-top: 30px;
  justify-content: center;
  position: absolute;
  max-width:80rem;
}
.btn-lg{
  height:40px;
  margin-left: 40px;
  /* margin-top: 32px; */
}
.search-bar{
  margin-left:20px;
  width:250px;
}
.heroImgText{
  display: flex;
  position: absolute;
  justify-content: center;
  color:#F5FFFA;
  margin-top: 135px;
  padding-left: 400px;
  font-family:'Raleway',sans-serif;
  letter-spacing: 2.5px;
  font-weight: 700;
}
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato:700|Raleway:600&display=swap" rel="stylesheet">



@section('content')
      <div class="vertical-center">
      <div class="container-fluid">
        <div class="justify-content-center">
        <div class="col-md-12">
          <row>
            <h1 class="heroImgText"> Make  A   Reservation</h1>
          <form method = "POST" action = "{{route('user.reservations.store')}}">
            <input type ="hidden" name="_token" value="{{ csrf_token()}}">
            <div class="form-group">
              <!-- <label for ="title"> Date </label> -->
              <input type ="date" class="form-control" id="date" name="date" value="{{old('date')}}"/>
            </div>
            <div class="form-group">
              <select name ="select" placeholder="Time" class="form-control" id="time" name="time" value="{{old('time')}}">
                <option selected="Time">&#128336; Time</Option>
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
              <select name ="select" placeholder="Party Size" class="form-control" id="party_size" name="party_size" value="{{old('party_size')}}">
                <option selected="Party Size">👥 Party Size</Option>
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
            <div class="search-bar form-group">
              <input type ="text" class="form-control" id="search" name="search" placeholder="&#128269;">
            </div>
            <!-- <a href="{{route('admin.reservations.index')}}" class="btn btn-lg btn-link"> Cancel </a> -->
            <button type="submit" class="btn btn-primary btn-lg float-right"> Book Now! </button>
          </form>
          </row>
        </div>
      </div>
    </div>
  </div>
          <div class="gallery">
          <img class="card-img-top opacity" style="height:25rem;" src="https://i.ibb.co/Hhg7YT6/homePage.jpg" width=100% />
        </div>
  </div>
          <hr>
          <div class="card-body">
            @if (count($restaurants) === 0)
            <p> There are no Restaurants</p>
            @else
            <table id="table-restaurants" class="table float-left">
              <h2>Available Today</h2>
              <tbody>
              <tr>
                @foreach ($restaurants  as $restaurant)
                  <td data-id="{{ $restaurant->id }}">
                    <a href="{{ route('user.restaurants.show',$restaurant->id)}}">
                    <div class="card float-left">
                          <div class="card" style="width: 15rem;">
                            <img class="card-img-top" src="{{ asset('storage/images/'. $restaurant->image)}}" />
                            <div class="card-body">
                              <h5 class="card-title">{{ $restaurant->name }}</h5>
                            </div>
                            <div class="card-body">
                              <a href="#" class="card-subtitle">{{ $restaurant->location }}</a>
                      </div>
                    </a>
            </td>
            @endforeach
              </tr>
          </tablebody>
        </table>
        @endif
    </div>
  </div>
  <script>
  $(document).ready(function(){

   fetch_customer_data();

   function fetch_customer_data(query = '')
   {
    $.ajax({
     url:"{{ route('welcome.action') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     success:function(data)
     {
      $('tbody').html(data.table_data);
      $('#total_records').text(data.total_data);
     }
    })
   }

   $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_customer_data(query);
   });
  });
  </script>
</div>
@endsection
