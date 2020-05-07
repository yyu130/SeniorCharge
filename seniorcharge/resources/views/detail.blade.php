<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!DOCTYPE html>
@extends('layout')
@section('title','Station Details')
@section('mycontent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .inline{
        padding: 10px;
        margin: 10px;
        display: inline-block;
        /*border: 1px solid #000;*/
    }

    #open{
        color: green;
    }
    #close{
        color: red;
    }

    #star{
        color: #f77f00;
        font-size: 38px;
    }

    .Button {
        border-radius: 8px;
        padding: 7px;
        background: #588D6A;
        color: white;
        font-size: 20px;
        font-weight: bold;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    /*.Button:hover {*/
    /*    background: forestgreen;*/
    /*}*/

    #title{
        font-weight: bold;
        color: #588D6A;
        font-size: 30px;
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
<script type="text/javascript">
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer",
            {
                title:{
                    text: "Charging station working?"
                },
                data: [
                    {
                        type: "pie",
                        dataPoints: [
                            { y: {{$working}}, label: "Yes"},
        { y: {{$notWorking}}, label: "No"},
    ]
    }
    ]
    });

        chart.render();
    }
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
        <h2 id="title">{{$station->station_name}}</h2>
    </div>
    <div class="row">
        <h5 style="font-size: 22px;font-family: Arial"><img src="{{asset('image/pin.png')}}" width="15" height="15"> {{$station->address}} |
            @if(\Carbon\Carbon::now()->format('H:i:s') >= $station->mon_open & \Carbon\Carbon::now()->format('H:i:s') <= $station->mon_close)
            <td><img src="{{asset('image/clock.png')}}" width="15" height="15"> <b id="open">Open Now {{\Carbon\Carbon::createFromFormat('H:i:s',$station->mon_open)->format('g:i a')}} - {{\Carbon\Carbon::createFromFormat('H:i:s',$station->mon_close)->format('g:i a')}}</b></td>
            @else
            <td><img src="{{asset('image/clock.png')}}" width="15" height="15"> <b id="close">Closed Now </b></td>
            @endif
<!--            @for ($star = 1; $star <=5; $star++)-->
<!--            @if ($station->star_rating >= $star)-->
<!--            <span id="star" class="glyphicon glyphicon-star"></span>-->
<!--            @else-->
<!--            <span class="glyphicon glyphicon-star-empty"></span>-->
<!--            @endif-->
<!--            @endfor-->
        </h5>
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
            <div class="col-md-6 col-xs-12">
                <div class="thumbnail" style="margin: auto;">
                    @if ($station->establishment_type == "Library")
                    <img src="{{asset('image/library.png')}}" width="300" height="300">
                    @elseif ($station->establishment_type == "Housing Support Services")
                    <img src="{{asset('image/house.png')}}" width="300" height="300">
                    @elseif ($station->establishment_type == "Train Station")
                    <img src="{{asset('image/station.png')}}" width="300" height="300">
                    @elseif ($station->establishment_type == "Community Centre")
                    <img src="{{asset('image/center.png')}}" width="300" height="300">
                    @elseif ($station->establishment_type == "Community Space")
                    <img src="{{asset('image/space.png')}}" width="300" height="300">
                    @elseif ($station->establishment_type == "Restaurant")
                    <img src="{{asset('image/mc.png')}}" width="300" height="300">
                    @else
                    <img src="{{asset('image/other.png')}}" width="300" height="300">
                    @endif
                </div>
            </div>
            <br>
            <p style="font-family: Arial;font-size: 22px;color: #3D4738;font-weight: bold; text-align: center">{{$station->establishment_type}}</p>
        </div>

        <div class="col-md-5 col-md-offset-1">
            <br>
            <h4 style="font-weight: bold; font-size: 28px;font-family: Arial">Facilities</h4>
            <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Types of Charger Available:<h5>
                    @if ($station->usb_a == 1)
                <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/plug.png')}}" width="20" height="20">iPhone (USB A)</h5>
                    @endif
                    @if ($station->usb_c == 1)
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/plug.png')}}" width="20" height="20">Samsung, Huawei,Oppo,One-Plus (USB C)</h5>
                    @endif
                    @if ($station->micro_usb == 1)
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/plug.png')}}" width="20" height="20">Samsung, Android (Micro USB)</h5>
                    @endif
                    @if ($station->plug_only == 1)
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/plug.png')}}" width="20" height="20">Plug only, bring your own charger</h5>
                    @endif
                    <br>
                @if($station->if_wifi == 1)
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/internet.png')}}" width="20" height="20"> Free Wifi</h5>
                @endif
                    @if($station->if_bathroom == 1)
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/restroom.png')}}" width="20" height="20"> Bathroom</h5>
                    @endif

                    @if($station->access_type == "Main entrance is step free or with ramps")
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/wheelchair.png')}}" width="20" height="20"> {{$station->access_type}}</h5>
                    @elseif(($station->access_type == "Entrance(s) have limited access via a small lip or a steep ramp, but alternative access available"))
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/wheelchair.png')}}" width="20" height="20"> {{$station->access_type}}</h5>
                    @elseif(($station->access_type == "All entrances have steps"))
                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/wheelchair.png')}}" width="20" height="20"> {{$station->access_type}}</h5>
                    @else
                    <h5></h5>
                    @endif
                    <br>
<!--                @if($station->if_wifi == 0 & $station->if_bathroom ==0 & $station->other_amenities != null)-->
<!--                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial">{{$station->other_amenities}}</h5>-->
<!--                @elseif($station->if_wifi == 0 & $station->if_bathroom ==0 & $station->other_amenities == null)-->
<!--                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial">No other amenities</h5>-->
<!--                @elseif($station->if_wifi == 0 & $station->if_bathroom ==1 & $station->other_amenities == null)-->
<!--                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/restroom.png')}}" width="20" height="20"> Bathroom</h5>-->
<!--                @elseif($station->if_wifi == 0 & $station->if_bathroom ==1 & $station->other_amenities != null)-->
<!--                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/restroom.png')}}" width="20" height="20"> Bathroom </h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial">{{$station->other_amenities}}</h5>-->
<!--                @elseif($station->if_wifi == 1 & $station->if_bathroom ==1 & $station->other_amenities == null)-->
<!--                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/restroom.png')}}" width="20" height="20"> Bathroom </h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/internet.png')}}" width="20" height="20"> Free Wifi</h5>-->
<!--                @elseif($station->if_wifi == 1 & $station->if_bathroom ==1 & $station->other_amenities != null)-->
<!--                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/restroom.png')}}" width="20" height="20"> Bathroom</h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/internet.png')}}" width="20" height="20"> Free Wifi</h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial">{{$station->other_amenities}}</h5>-->
<!--                @elseif($station->if_wifi == 1 & $station->if_bathroom ==0 & $station->other_amenities == null)-->
<!--                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/internet.png')}}" width="20" height="20"> Free Wifi</h5>-->
<!--                @elseif($station->if_wifi == 1 & $station->if_bathroom ==0 & $station->other_amenities != null)-->
<!--                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial"><img src="{{asset('image/internet.png')}}" width="20" height="20"> Free Wifi</h5>-->
<!--                    <h5 style="font-size: 20px;font-family: Arial">{{$station->other_amenities}}</h5>-->
<!--                @endif-->
                    @if($station->other_amenities != null)
                    <h5 style="font-weight: bold; font-size: 22px;font-family: Arial">Other amenities: </h5>
                    <h5 style="font-size: 20px;font-family: Arial">{{$station->other_amenities}}</h5>
                    @endif
        </div>

    </div>
    </div>
</div>
<br><br>
<div class="container">
    <p style="color: #588D6A; font-size: 28px; font-weight: bold;font-family: Arial">Ratings & Reviews ({{ $reviews->count() }} review(s))
        <a href="#" style="font-family: Arial;font-size: 22px;color: #3D4738" id="write">Write a review</a></p>
</div>
<!--style="display: none"-->
<br>
<div class="row" id="reviewForm" style="display: none">
    <div class="col-md-12">
        <!--        @if(count($errors) > 0)-->
        <!--        <div class="alert alert-danger">-->
        <!--            <ul>-->
        <!--                @foreach($errors->all() as $error)-->
        <!--                <li>{{$error}}</li>-->
        <!--                @endforeach-->
        <!--            </ul>-->
        <!--        </div>-->
        <!--        @endif-->
        <!--        @if(\Session::has('success'))-->
        <!--        <div class="alert alert-success">-->
        <!--            <p>{{ \Session::get('success') }}</p>-->
        <!--        </div>-->
        <!--        @endif-->
        <div class="container">
        <form method="post" action="{{url('review')}}" style="text-align: center">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="station_id" class="form-control" style="display: none" value="{{$station->id}}" />
            </div>
            <div class="form-group" style="border-bottom: 1px solid #588D6A">
                <p style="font-size: 25px; font-weight: bold; font-family: Arial;">Rating the place you've visited</p>
                <div class="ratings">
                <span class="fa fa-star-o" id="star"></span>
                <span class="fa fa-star-o" id="star"></span>
                <span class="fa fa-star-o" id="star"></span>
                <span class="fa fa-star-o" id="star"></span>
                <span class="fa fa-star-o" id="star"></span>
                </div>
                <input type="text" id="rating" name="rating" class="form-control" style="display: none" />
                <br>
            </div>
            <div class="form-group" style="border-bottom: 1px solid #588D6A">
                <!--                <p>Is the charging station working?</p>-->
                <!--                <input type="text" name="is_working" class="form-control" placeholder="Enter If charger station is working or not" />-->
                <label for="is_working" style="font-size: 25px; font-weight: bold; font-family: Arial;">Is the charging station working?</label><br>
                <input type="radio" name="is_working" value="1"> Yes
                <input type="radio" name="is_working" value="0"> No
                <br>
            </div>
            <div class="form-group" style="border-bottom: 1px solid #588D6A">
                <label for="is_welcoming" style="font-size: 25px; font-weight: bold; font-family: Arial;">The charging station location is very welcoming</label><br>
                <input type="radio" name="is_welcoming" value="Strongly Agree">Strong Agree
                <input type="radio" name="is_welcoming" value="Agree"> Agree
                <input type="radio" name="is_welcoming" value="Neutral"> Neutral
                <input type="radio" name="is_welcoming" value="Disagree"> Disagree
                <input type="radio" name="is_welcoming" value="Strongly Disagree"> Strongly Disagree
            </div>
            <div class="form-group">
                <p style="font-size: 25px; font-weight: bold; font-family: Arial;">Other feedback</p>
                <input type="text" name="comments" class="form-control" style="width: 40%;display: inline-block;height: 150px" placeholder="Input message here..."/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" style="font-size: 26px; font-weight: bold; font-family: Arial; color: #ffffff;
background-color: #588D6A; border-radius: 8px" />
            </div>
        </form>
        </div>
    </div>
</div>
<!--<div class="row" style="background-color: #588D6A">-->
<!--<div class="container">-->
<!--    <h5 style="text-align: center; font-size: 48px; font-family: Arial; font-weight: bold; color: #9a0311">-->
<!--        {{round($rating)}}-->
<!--        <p style="color: #3D4738; font-size: 24px; font-family: Arial;">out of 5 stars</p>-->
<!--    </h5>-->
<!--    <h5 style="text-align: center; font-size: 38px">-->
<!--        @for ($star = 1; $star <=5; $star++)-->
<!--        @if (round($rating)>= $star)-->
<!--        <span id="star" class="glyphicon glyphicon-star"></span>-->
<!--        @else-->
<!--        <span class="glyphicon glyphicon-star-empty"></span>-->
<!--        @endif-->
<!--        @endfor-->
<!--    </h5>-->
<!--</div>-->
<!--</div>-->
<br>
@if ($reviews->count() != 0)
<div class="row" style="background-color: #588D6A">
    <div class="inline" style="width:300px; height: 300px;margin: auto;">
<!--            <h5 style="text-align: center; font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311">-->
<!--                {{ $reviews->count() }} people give rate-->
<!--            </h5>-->
        <h5 style="text-align: center; font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311">
            Rating: {{round($rating)}}
        </h5>
<!--        <h5 style="text-align: center; font-size: 38px">-->
<!--            @for ($star = 1; $star <=5; $star++)-->
<!--            @if (round($rating)>= $star)-->
<!--            <span id="star" class="glyphicon glyphicon-star"></span>-->
<!--            @else-->
<!--            <span class="glyphicon glyphicon-star-empty"></span>-->
<!--            @endif-->
<!--            @endfor-->
<!--        </h5>-->
        <h5>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span style="font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311;float: right">{{$rat5}}</span>
        </h5>
        <h5>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span style="font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311;float: right">{{$rat4}}</span>
        </h5>
        <h5>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span style="font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311;float: right">{{$rat3}}</span>
        </h5>
        <h5>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span style="font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311;float: right;">{{$rat2}}</span>
        </h5>
        <h5>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span style="font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311;float: right">{{$rat1}}</span>
        </h5>
    </div>

    <div class="inline" style="width:300px; height: 300px;margin-top: -10px;">
    <div id="chartContainer" style="width:300px; height: 300px;margin: auto">
    </div>
    </div>

    <div class="inline" style="width:500px; height: 300px;margin: auto;">
        <h5 style="text-align: center; font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311">Charging station is very welcoming</h5>
        <br>
        <h5 style="text-align: left; font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311">Strongly Agree: {{$strong}}</h5>
        <h5 style="text-align: left; font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311">Strongly Agree: {{$agree}}</h5>
        <h5 style="text-align: left; font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311">Strongly Agree: {{$neutral}}</h5>
        <h5 style="text-align: left; font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311">Strongly Agree: {{$disagree}}</h5>
        <h5 style="text-align: left; font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311">Strongly Agree: {{$sdisagree}}</h5>

    </div>
</div>
@endif
<br><br>
<div class="container">
<table class="table table-striped">
    <table style="border-collapse: collapse">
    <!--        <thead>-->
        <!--        <tr>-->
        <!--            <th>Station Name</th>-->
        <!--            <th>Address</th>-->
        <!--        </tr>-->
        <!--        </thead>-->
        <tbody>
        @foreach($reviews as $review)
        <tr style="border-bottom: 1px solid #588D6A">
            <td class="table-responsive-md">
                <img src="{{asset('image/clock.png')}}" width="60" height="60" style="margin-top: -70px">
            </td>
            <td class="table-responsive-md">
                <ul class="type" style="font-size: 26px;font-family: Arial">User ID</ul>
                <!--                <ul class="type" style="font-size: 26px;font-family: Arial">-->
<!--                    @if ($review->is_working == 1)-->
<!--                    <p>Is charging station working: Yes</p>-->
<!--                    @else-->
<!--                    <p>Is charging station working: No</p>-->
<!--                    @endif-->
<!--                </ul>-->
                <ul class="type" style="font-size: 26px;font-family: Arial">
                    @for ($star = 1; $star <=5; $star++)
                    @if ($review->rating>= $star)
                    <span id="star" class="glyphicon glyphicon-star"></span>
                    @else
                    <span class="glyphicon glyphicon-star-empty"></span>
                    @endif
                    @endfor
                    <h5 style="display: inline;font-size: 26px;font-family: Arial">reviewd by: {{\Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</h5>
                </ul>
<!--                <ul class="type" style="font-size: 26px;font-family: Arial">{{\Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</ul>-->
                <!--                <ul class="type" style="font-size: 26px;font-family: Arial">The charing station location is very welcoming: {{$review->is_welcoming}}</ul>-->
                <ul class="type" style="font-size: 26px;font-family: Arial">{{$review->comments}}</ul>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</table>
</div>
</body>
<script src="{{asset('js/script.js')}}"></script>


<!--<div class="footer">-->
<!--    900 Dandenong Rd-->
<!--    <br>Caulfield Eest VIC 3145-->
<!--    <br>(03) 9903 2000-->
<!---->
<!--    <br><br>@2020 Sr.Charge-->
<!--</div>-->
@endsection
