@extends('layouts.app')
<style type="text/css">
.gallery {
    overflow: hidden;
    width: 100%;
    height: 25rem;
    margin: 10px;
}

form {
  border-radius: 15px 15px 15px 15px;
  padding: 25px;
  display: inline-block;;
  position: absolute;
  text-align: center;
  margin-left: 23%;
  width: 50%;
}
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<!-- <script type="text/javascript">
    var count = 1;
    setInterval(function() {
        count = ($(".gallery :nth-child("+count+")")
        .fadeOut('slow').next().length == 0) ? 1 : count+1;
        $(".gallery :nth-child("+count+")").fadeIn('slow');
      },
    5000);
</script> -->
@section('content')

      <div class="vertical-center">
      <div class="container-fluid">
        <div class="justify-content-center">
        <div class="col-md-12">
          <row>
          <form method = "POST" action = "{{route('admin.reservations.store')}}">
            <input type ="hidden" name="_token" value="{{ csrf_token()}}">
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
              <select name="restaurant_id">

                @foreach ($restaurants as $restaurant)
                <option value="{{ $restaurant->id }}" {{old("$restaurant->id")}}>
                  {{$restaurant->name}}
                </option>
                @endforeach

              </select>
            </div>
          </row>
            <!-- <div class="form-group">
              <label for ="title"> Table </label>
              <input type ="select" class="form-control" id="table_id" name="table_id" value="{{old('table_id')}}"/>
            </div> -->
            <a href="{{route('admin.reservations.index')}}" class="btn btn-link"> Cancel </a>
            <button type="submit" class="btn btn-primary float-right"> Submit </button>
          </form>
          <div class="gallery">

          <img class="card-img-top opacity" style="height:25rem;" src="https://i.ibb.co/Hhg7YT6/homePage.jpg" width=100% />
          <!-- <img class="card-img-top" style="height:25rem;" src="https://resizer.otstatic.com/v2/photos/wide-huge/25160669.jpg" width=100% />
          <img class="card-img-top" style="height:25rem;" src="https://resizer.otstatic.com/v2/photos/wide-huge/25160340.jpg" width=100% /> -->

        </div>
  </div>
          <hr>
          <div class="card-body">
            @if (count($restaurants) === 0)
            <p> There are no Restaurants</p>
            @else
            <table id="table-restaurants" class="table table-hover float-left">
              <h2>Available Today</h2>
              <tbody>
              <tr>
                @foreach ($restaurants  as $restaurant)
                  <td data-id="{{ $restaurant->id }}">
                    <a href="{{ route('user.restaurants.show',$restaurant->id)}}">
                    <div class="card float-left">
                          <div class="card" style="width: 15rem;">
                            <img class="card-img-top" src="{{ asset('storage/images/' . $restaurant->image)}}" />
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
</div>
@endsection
