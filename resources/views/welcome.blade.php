@extends('layouts.app')

@section('content')
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <img class="card-img-top" style="height:25rem; "src="https://media.otstatic.com/img/start_hero_images/us-hero-1040-b6f1b6d8171974a2ae4256a619fd5030.jpg" alt="Card image cap">
          </div>
        <div class="col-md-12">
          <hr>
          <br>
          <div class="card-body">
            @if (count($restaurants) === 0)
            <p> There are no Restaurants</p>
            @else
            <table id="table-restaurants" class="table table-hover">
              <h2>Available Today</h2>
              <tbody>
              <tr>
                @foreach ($restaurants  as $restaurant)
                  <td data-id="{{ $restaurant->id }}">
                    <a href="{{ route('user.restaurants.show',$restaurant->id)}}">
                    <div class="card float-left">
                          <div class="card" style="width: 15rem;">
                            <img class="card-img-top" src="https://resizer.otstatic.com/v2/photos/legacy/26002669.jpg" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">{{ $restaurant->name }}</h5>
                            </div>
                            <div class="card-body">
                              <a href="#" class="card-subtitle">{{ $restaurant->location }}</a>
                            </div>
                          </div>
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
</div>
@endsection
