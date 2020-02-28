@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

{{-- Contact Page --}}



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <i class="fa fa-envelope contactHead" style="font-size:36px"></i>
            <h1>Email Support</h1>
            <p class="contactText">Email us at Support@ReserveIt.ie</p>
            <p class="contactText">If you a business-related inquiry or question, please reach us by email at Business@ReserveIt.ie</p>
            <br>
            <i class="fa fa-phone contactHead" style="font-size:36px"></i>
            <h1>Contact Number</h1>
            <p class="contactText">Phone: +1.203.023.383</p>
            <p class="contactText">Freephone: +(353) 833 203 30 21</p>
            <br>
            <i class="fa fa-map-marker contactHead" style="font-size:36px"></i>
            <h1>Address</h1>
            <p class="contactText">ReserveIt Inc.</p>
            <p class="contactText">32 Monkstown Ave</p>
            <p class="contactText">Co. Dublin, A94 P9W0</p>
            <p class="contactText">Ireland</p>
            <br>
        </div>
    </div>
</div>

@endsection
