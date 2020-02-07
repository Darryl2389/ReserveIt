<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($restaurants as $restaurant)
            <tr>
                <td>{{$restaurant->name}}</td>
                <td>{{$restaurant->location}}</td>
                <td>{{$restaurant->type}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
