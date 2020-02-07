@extends('layouts.app')
<style type="text/css">
.gallery {
    overflow: hidden;
    height: 25rem;
    margin-top:-25px;
}
.card-img-top{
  height:50rem;
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
a{
  color:black;
  text-decoration: none;
}
.card{
  height:275px;
  width:250px;
}
table tr,td{
  background-color: white;
  position: relative;
}
.search-bar{
  margin-left:25px;
  width:700px;
}
search td,tr{
  border-bottom:solid 1px #BDC7D8;
  background-color:lightgrey ;
  width:80%;
  line-height: 1.2;
  font-family:Roboto;
  font-size: 20px;
  color:white;
  text-decoration: none;
}
search td:hover{
  background-color: powderblue;
  color:white;
}
/* h5{
  text-decoration: none;
} */
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
  overflow:hidden;
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
            <h1 class="heroImgText">Find A Restaurant</h1>
          <form method = "GET" action = "/searchResults" role="search">
            <input type ="hidden" name="_token" value="{{ csrf_token()}}">
            <div class="search-bar form-group">
              <input type ="text" class="form-control" id="search" name="search" placeholder="Search by Restaurant, Location or Type...">
              <search></search>
            </div>
            <!-- <button type="submit" class="btn btn-primary btn-lg float-right">Go</button> -->
          </form>
          </row>
        </div>
      </div>
    </div>
  </div>
  <div class="gallery">
    <img class="card-img-top opacity" style="height:25rem;" src="https://i.ibb.co/Hhg7YT6/homePage.jpg" width=100% />
 </div>
    <hr>
      @if (count($restaurants) === 0)
      <p> There are no Restaurants</p>
      @else
  <table id="table-restaurants" class="table float-left">
        <h4>Available Today</h4>
  <tr>
    @foreach ($restaurants  as $restaurant)
      <td>
        <a href="{{ route('user.restaurants.show',$restaurant->id)}}">
        <div class="card float-left">
              <img class="card-img-top" src="{{ asset('storage/images/'. $restaurant->image)}}" />
              <div class="card-body">
                <h5 class="card-title">{{ $restaurant->name }}</h5>
                <!-- {{ $restaurant->location }}
                {{ $restaurant->type }} -->
              </div>
      </div>
        </a>
      </td>
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
