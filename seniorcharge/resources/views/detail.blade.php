<!DOCTYPE html>
@extends('layout')
@section('title','Station Details')
@section('mycontent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
<style>

    #open{
        color: green;
    }
    #close{
        color: red;
    }

    #star{
        color: #f77f00;
    }

    .Button {
        border-radius: 8px;
        padding: 7px;
        background: green;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    .Button:hover {
        background: forestgreen;
    }

    #title{
        font-weight: bold;
        color: #588D6A;
        font-size: 30px;
        width: auto;
        font-family: Arial;
    }

    .footer{
        position: relative;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: mediumseagreen;
        color: #333333;
        text-align: center;
    }
</style>
<body style="background-color: #f0efef">
<h1></h1>
<!--<form action="/search" method="POST" role="search" class="example" style="margin-right: auto;max-width:600px">-->
<!--    {{ csrf_field() }}-->
<!--    <div class="input-group">-->
<!--        <input type="text" class="form-control" name="q"-->
<!--               placeholder="Search postcode/suburb here...">-->
<!--        <span>-->
<!--            <h3><b>&nbsp;Sort by&nbsp;</b></h3>-->
<!--        </span>-->
<!--        <span>-->
<!--            <select id="dropdown" class="form-control" name="sort">-->
<!--                <option value="no">No Sort By</option>-->
<!--                <option value="rating">Rating</option>-->
<!--                <option value="allDay">Only Show 24 hours</option>-->
<!--            </select>-->
<!--        </span>-->
<!--        &nbsp;-->
<!--        <span>-->
<!--            <button type="submit" id="submitBtn" class="fa fa-search">-->
<!--                <span id="search">SEARCH</span>-->
<!--            </button>-->
<!--        </span>-->
<!--    </div>-->
<!--</form>-->
<div class="container">
<a style="color: white" href="{{URL::previous()}}" class="Button"><i class="fas fa-arrow-left" > Return to map view</i></a>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
        <h2 id="title">{{$station->station_name}}</h2>
        <h5 style="font-size: 22px;font-family: Arial"><img src="{{asset('image/pin.png')}}" width="15" height="15"> {{$station->address}} |
            @if(\Carbon\Carbon::now()->format('H:i:s') >= $station->mon_open & \Carbon\Carbon::now()->format('H:i:s') <= $station->mon_close)
            <td><img src="{{asset('image/clock.png')}}" width="15" height="15"> <b id="open">Open Now {{$station->mon_open}} - {{$station->mon_close}}</b> | </td>
            @else
            <td><img src="{{asset('image/clock.png')}}" width="15" height="15"> <b id="close">Close Now </b> | </td>
            @endif
            @for ($star = 1; $star <=5; $star++)
            @if ($station->star_rating >= $star)
            <span id="star" class="glyphicon glyphicon-star"></span>
            @else
            <span class="glyphicon glyphicon-star-empty"></span>
            @endif
            @endfor
        </h5>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-1" style="max-width: 400px">
<!--            <h2 id="title">{{$station->station_name}}</h2>-->
<!--            <h5 style="font-size: 16px"><img src="{{asset('image/pin.png')}}" width="15" height="15"> {{$station->address}} |-->
<!--                @if(\Carbon\Carbon::now()->format('H:i:s') >= $station->mon_open & \Carbon\Carbon::now()->format('H:i:s') <= $station->mon_close)-->
<!--                <td><img src="{{asset('image/clock.png')}}" width="15" height="15"> <b id="open">Open Now {{$station->mon_open}} - {{$station->mon_close}}</b></td>-->
<!--                @else-->
<!--                <td><img src="{{asset('image/clock.png')}}" width="15" height="15"> <b id="close">Close Now</b></td>-->
<!--                @endif-->
<!--            </h5>-->
<!--            <br>-->
<!--            <br>-->
<!--            <br>-->
            <br><br><br>
            <div class="col-md-6 col-xs-12">
                <div class="thumbnail" style="margin-right: auto;margin-left: auto;width: 50%;">
                    @if ($station->establishment_type == "Library")
                    <img src="{{asset('image/library.jpg')}}" width="200" height="200">
                    @elseif ($station->establishment_type == "Housing Support Services")
                    <img src="{{asset('image/supporting.jpg')}}" width="200" height="200">
                    @elseif ($station->establishment_type == "Train Station")
                    <img src="{{asset('image/station.jpg')}}" width="200" height="200">
                    @elseif ($station->establishment_type == "Community Centre")
                    <img src="{{asset('image/center.jpg')}}" width="200" height="200">
                    @elseif ($station->establishment_type == "Community Space")
                    <img src="{{asset('image/space.jpg')}}" width="200" height="200">
                    @else
                    <img src="{{asset('image/other.jpg')}}" width="200" height="200">
                    @endif
                </div>
            </div>
            <br>
        </div>

        <div class="col-md-5 col-md-offset-1">
            <br>
            <h4 style="font-weight: bold; font-size: 28px;font-family: Arial">Facilities</h4>
            <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Types of Charger Available:<h5>
                <h5 style="font-size: 20px;font-family: Arial">{{$station->charger_type}}</h5>
<br><br>
                @if($station->if_wifi == 0 & $station->if_bathroom ==0 & $station->other_amenities != null)
                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>
                    <h5 style="font-size: 20px;font-family: Arial">{{$station->other_amenities}}</h5>
                @elseif($station->if_wifi == 0 & $station->if_bathroom ==0 & $station->other_amenities == null)
                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>
                    <h5 style="font-size: 20px;font-family: Arial">No other amenities</h5>
                @elseif($station->if_wifi == 0 & $station->if_bathroom ==1 & $station->other_amenities == null)
                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/restroom.png')}}" width="20" height="20"> Bathroom</h5>
                @elseif($station->if_wifi == 0 & $station->if_bathroom ==1 & $station->other_amenities != null)
                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/restroom.png')}}" width="20" height="20"> Bathroom </h5>
                    <h5 style="font-size: 20px;font-family: Arial">{{$station->other_amenities}}</h5>
                @elseif($station->if_wifi == 1 & $station->if_bathroom ==1 & $station->other_amenities == null)
                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/restroom.png')}}" width="20" height="20"> Bathroom </h5>
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/internet.png')}}" width="20" height="20"> Free Wifi</h5>
                @elseif($station->if_wifi == 1 & $station->if_bathroom ==1 & $station->other_amenities != null)
                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/restroom.png')}}" width="20" height="20"> Bathroom</h5>
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/internet.png')}}" width="20" height="20"> Free Wifi</h5>
                    <h5 style="font-size: 20px;font-family: Arial">{{$station->other_amenities}}</h5>
                @elseif($station->if_wifi == 1 & $station->if_bathroom ==0 & $station->other_amenities == null)
                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/internet.png')}}" width="20" height="20"> Free Wifi</h5>
                @elseif($station->if_wifi == 1 & $station->if_bathroom ==0 & $station->other_amenities != null)
                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/internet.png')}}" width="20" height="20"> Free Wifi</h5>
                    <h5 style="font-size: 20px;font-family: Arial">{{$station->other_amenities}}</h5>
                @endif
        </div>

    </div>
    </div>
</div>

</body>

<!--<div class="footer">-->
<!--    900 Dandenong Rd-->
<!--    <br>Caulfield Eest VIC 3145-->
<!--    <br>(03) 9903 2000-->
<!---->
<!--    <br><br>@2020 Sr.Charge-->
<!--</div>-->
@endsection
