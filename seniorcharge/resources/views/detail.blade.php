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
    #maps{
        height: 0;
        position: relative;
        padding-bottom: 50%;
    }
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
        font-size: 27px;
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
<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
<!--<script type="text/javascript">-->
<!--    google.charts.load('current', {'packages':['corechart']});-->
<!--    google.charts.setOnLoadCallback(drawChart);-->
<!---->
<!--    function drawChart() {-->
<!---->
<!--        var data = google.visualization.arrayToDataTable([-->
<!--            ['Option', 'Amount'],-->
<!--            ['Yes',     {{$working}}],-->
<!--            ['No',      {{$notWorking}}]-->
<!--        ]);-->
<!---->
<!--        var options = {-->
<!--            title: 'Is charging station working'-->
<!--        };-->
<!---->
<!--        var chart = new google.visualization.PieChart(document.getElementById('piechart'));-->
<!---->
<!--        chart.draw(data, options);-->
<!--    }-->
<!--</script>-->
<!--<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
<!-- Load d3.js -->
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
<div class="jumbotron mb-0 jumbotron-fluid" style="height: 400px; padding-top: 150px;background-image: url('{{asset('image/place.jpg')}}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;" >
</div>
<div class="container">
<a style="color: white" href="{{URL::previous()}}" class="Button"><i class="fas fa-arrow-left" > Back</i></a>
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
            <br>
            <div class="col-md-6 col-xs-12">
                <div class="thumbnail" style="margin: auto;">
                    @if ($station->establishment_type == "Library")
                    <img src="{{asset('image/library.jpg')}}" width="400" height="300">
                    @elseif ($station->establishment_type == "Housing Support Services")
                    <img src="{{asset('image/house.jpg')}}" width="400" height="300">
                    @elseif ($station->establishment_type == "Train Station")
                    <img src="{{asset('image/station.jpg')}}" width="400" height="300">
                    @elseif ($station->establishment_type == "Community Centre")
                    <img src="{{asset('image/center.jpg')}}" width="400" height="300">
                    @elseif ($station->establishment_type == "Community Space")
                    <img src="{{asset('image/space.jpg')}}" width="400" height="300">
                    @elseif ($station->establishment_type == "Restaurant")
                    <img src="{{asset('image/mc.png')}}" width="400" height="300">
                    @else
                    <img src="{{asset('image/other.jpg')}}" width="400" height="300">
                    @endif
                </div>
            </div>
            <br>
            <p style="font-family: Arial;font-size: 22px;color: #3D4738;font-weight: bold; text-align: center">{{$station->establishment_type}}</p>
        </div>

        <div class="col-md-5 col-md-offset-1" style="margin: auto">
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
<!--<div id="maps">-->
<!--</div>-->
<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI&libraries=places"-->
<!--        type="text/javascript">-->
<!---->
<!--</script>-->
<!--<script src="{{asset('js/jquery-3.5.0.js')}}"></script>-->
<!--<script-->
<!--    src="https://code.jquery.com/jquery-3.2.1.min.js"-->
<!--    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="-->
<!--    crossorigin="anonymous"></script>-->
<!---->
<!---->
<!--<script src="{{asset('js/script.js')}}"></script>-->

<br><br>
<div class="container">
    @if ($reviews->count() > 1)
    <p style="color: #588D6A; font-size: 30px; font-weight: bold;font-family: Arial">Ratings & Reviews ({{ $reviews->count() }} reviews)
        @else
    <p style="color: #588D6A; font-size: 30px; font-weight: bold;font-family: Arial">Ratings & Reviews ({{ $reviews->count() }} review)
        @endif
        &nbsp;
        <a href="#" style="font-family: Arial;font-size: 26px;color: #3D4738" id="write">
            <img src="{{asset('image/edit.png')}}" width="28" height="28" style="margin-top: -7.7px">Write a review</a></p>
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
                <p style="font-size: 36px; font-weight: bold; font-family: Arial;color: #3d4738">Rating the place you've visited</p>
                <br>
                <div class="ratings">
                <span class="fa fa-star-o" id="star" style="font-size: 45px"></span>
                <span class="fa fa-star-o" id="star" style="font-size: 45px"></span>
                <span class="fa fa-star-o" id="star" style="font-size: 45px"></span>
                <span class="fa fa-star-o" id="star" style="font-size: 45px"></span>
                <span class="fa fa-star-o" id="star" style="font-size: 45px"></span>
                </div>
                <input type="text" id="rating" name="rating" class="form-control" style="display: none" />
                <br>
            </div>
            <div class="form-group" style="border-bottom: 1px solid #588D6A">
                <!--                <p>Is the charging station working?</p>-->
                <!--                <input type="text" name="is_working" class="form-control" placeholder="Enter If charger station is working or not" />-->
                <label for="is_working" style="font-size: 36px; font-weight: bold; font-family: Arial;color: #3d4738">Is the charging station working?</label>
                <br><br>
                <p style="font-size: 30px; font-family: Arial; color: #3d4738">
                <input type="radio" name="is_working" value="1" style="height: 20px; width: 20px"> Yes
                <input type="radio" name="is_working" value="0" style="height: 20px; width: 20px"> No
                </p>
                <br>
            </div>
<!--            <div class="form-group" style="border-bottom: 1px solid #588D6A">-->
<!--                <label for="is_welcoming" style="font-size: 36px; font-weight: bold; font-family: Arial;color: #3d4738">The charging station location is very welcoming</label>-->
<!--                <br><br>-->
<!--                <p style="font-size: 30px; font-family: Arial; color: #3d4738">-->
<!--                <input type="radio" name="is_welcoming" value="Strongly Agree" style="height: 20px; width: 20px">Strong Agree-->
<!--                <input type="radio" name="is_welcoming" value="Agree" style="height: 20px; width: 20px"> Agree-->
<!--                <input type="radio" name="is_welcoming" value="Neutral" style="height: 20px; width: 20px"> Neutral-->
<!--                <input type="radio" name="is_welcoming" value="Disagree" style="height: 20px; width: 20px"> Disagree-->
<!--                <input type="radio" name="is_welcoming" value="Strongly Disagree" style="height: 20px; width: 20px"> Strongly Disagree-->
<!--                </p>-->
<!--                <br>-->
<!--            </div>-->
            <div class="form-group">
                <p style="font-size: 36px; font-weight: bold; font-family: Arial;color: #3d4738">Other feedback</p>
<!--                <input type="text"  class="form-control" style="height: 20em" placeholder="Input message here..."/>-->
                <textarea name="comments" style="height: 100px; width: 80%; font-size: 28px; font-family: Arial; color: #88888"></textarea>
            </div>
            <br>
            <div class="form-group">
<!--                <input type="submit" class="btn btn-primary" style="font-size: 36px; font-weight: bold; font-family: Arial; color: #ffffff;-->
<!--background-color: #588D6A; border-radius: 8px" />-->
                <button type="submit" id="submitBtn" style="background-color: #588D6A;border-radius: 8px" class="btn btn-primary">
                    <span style="font-family: Arial;font-size: 36px; font-weight: bold; color: #ffffff">Submit</span>
                </button>
            </div>
            <br>
            <div class="form-group">
                <button type="reset" id="close" style="background-color: #588D6A;border-radius: 8px" class="btn btn-primary">
                    <span style="font-family: Arial;font-size: 36px; font-weight: bold; color: #ffffff">Close</span>
                </button>
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
    <div class="inline" style="margin: auto">
<!--            <h5 style="text-align: center; font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311">-->
<!--                {{ $reviews->count() }} people give rate-->
<!--            </h5>-->
        <h5 style="text-align: center">
        <span style=" font-size: 30px; font-family: Arial; font-weight: bold; color: #3d4738">
            Rating
        </span>
        <span style="font-size: 32px; font-family: Arial; font-weight: bold; color: #9a0311">
            {{round($rating)}}</span>
        </h5>
        <br><br>
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
            <span style="font-size: 26px; font-family: Arial;color: #3d4738">{{$rat5}}</span>
            &nbsp;&nbsp;
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
        </h5>
        <h5>
            <span style="font-size: 26px; font-family: Arial;color: #3d4738">{{$rat4}}</span>
            &nbsp;&nbsp;
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
        </h5>
        <h5>
            <span style="font-size: 26px; font-family: Arial;color: #3d4738">{{$rat3}}</span>
            &nbsp;&nbsp;
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
        </h5>
        <h5>
            <span style="font-size: 26px; font-family: Arial;color: #3d4738">{{$rat2}}</span>
            &nbsp;&nbsp;
            <span id="star" class="glyphicon glyphicon-star"></span>
            <span id="star" class="glyphicon glyphicon-star"></span>
        </h5>
        <h5>
            <span style="font-size: 26px; font-family: Arial;color: #3d4738">{{$rat1}}</span>
            &nbsp;&nbsp;
            <span id="star" class="glyphicon glyphicon-star"></span>
        </h5>
    </div>


    <script src="https://d3js.org/d3.v4.js"></script>

    <!-- Create a div where the graph will take place -->
    <div class="inline" style="margin: auto;">
        <span style=" font-size: 30px; font-family: Arial; font-weight: bold; color: #3d4738">
            Charging Station Working
        </span>
        <div id="my_dataviz">
        </div>
    </div>
    <!-- Color scale -->
    <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>

    <script>

        // set the dimensions and margins of the graph
        var width = 340
        height = 340
        margin = 40

        // The radius of the pieplot is half the width or half the height (smallest one). I subtract a bit of margin.
        var radius = Math.min(width, height) / 2 - margin

        // append the svg object to the div called 'my_dataviz'
        var svg = d3.select("#my_dataviz")
            .append("svg")
            .attr("width", width)
            .attr("height", height)
            .append("g")
            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

        // Create dummy data
        var data = {
            Yes: {{$working}},
            No: {{$notWorking}}
        }

        // set the color scale
        var color = d3.scaleOrdinal()
            .domain(data)
            .range(d3.schemeSet2);

        // Compute the position of each group on the pie:
        var pie = d3.pie()
            .value(function(d) {return d.value; })
        var data_ready = pie(d3.entries(data))
        // Now I know that group A goes from 0 degrees to x degrees and so on.

        // shape helper to build arcs:
        var arcGenerator = d3.arc()
            .innerRadius(0)
            .outerRadius(radius)

        // Build the pie chart: Basically, each part of the pie is a path that we build using the arc function.
        svg
            .selectAll('mySlices')
            .data(data_ready)
            .enter()
            .append('path')
            .attr('d', arcGenerator)
            .attr('fill', function(d){ return(color(d.data.key)) })
            .attr("stroke", "black")
            .style("stroke-width", "2px")
            .style("opacity", 0.7)

        // Now add the annotation. Use the centroid method to get the best coordinates
        svg
            .selectAll('mySlices')
            .data(data_ready)
            .enter()
            .append('text')
            .text(function(d){ return d.data.key+ ": " + d.value})
            .attr("transform", function(d) { return "translate(" + arcGenerator.centroid(d) + ")";  })
            .style("text-anchor", "middle")
            .style("font-size", 17)


    </script>

<!--    <div class="inline" style="width:500px; height: 300px;margin: auto;">-->
<!--        <h5 style="text-align: center; font-size: 30px; font-family: Arial; font-weight: bold; color: #3d4738">Charging station is very welcoming</h5>-->
<!--        <br>-->
<!--        <h5 style="text-align: left; font-size: 26px; font-family: Arial; color: #3d4738">-->
<!--            <span>Strongly Agree </span>-->
<!--            <span><div style="background-color: #f77f00;width:{{$p1}}%;height: 8px">&nbsp;</div></span>-->
<!--        </h5>-->
<!--        <h5 style="text-align: left; font-size: 26px; font-family: Arial; color: #3d4738">-->
<!--            <span>Agree </span>-->
<!--            <span><div style="background-color: #f77f00;width:{{$p2}}%;height: 8px">&nbsp;</div></span>-->
<!--        </h5>-->
<!--        <h5 style="text-align: left; font-size: 26px; font-family: Arial; color: #3d4738">-->
<!--            <span>Neutral </span>-->
<!--            <span><div style="background-color: #f77f00;width:{{$p3}}%;height: 8px">&nbsp;</div></span>-->
<!--        </h5>-->
<!--        <h5 style="text-align: left; font-size: 26px; font-family: Arial; color: #3d4738">-->
<!--            <span>Disagree </span>-->
<!--            <span><div style="background-color: #f77f00;width:{{$p4}}%;height: 8px">&nbsp;</div></span>-->
<!--        </h5>-->
<!--        <h5 style="text-align: left; font-size: 26px; font-family: Arial; color: #3d4738">-->
<!--            <span>Strongly Disagree </span>-->
<!--            <span><div style="background-color: #f77f00;width:{{$p5}}%;height: 8px">&nbsp;</div></span>-->
<!--        </h5>-->
<!--    </div>-->
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
                <img src="{{asset('image/tou.png')}}" width="60" height="60" style="text-align: center">
            </td>
            <td class="table-responsive-md">
                <ul class="type" style="font-size: 26px;font-family: Arial;font-weight: bold;color: #588D6A">User ID</ul>
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
                    <h5 style="font-size: 20px;font-family: Arial; color: #3D4738">{{\Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</h5>
                </ul>
<!--                <ul class="type" style="font-size: 26px;font-family: Arial">{{\Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</ul>-->
                <!--                <ul class="type" style="font-size: 26px;font-family: Arial">The charing station location is very welcoming: {{$review->is_welcoming}}</ul>-->
                <ul class="type" style="font-size: 24px;font-family: Arial;color: #3D4738">{{$review->comments}}</ul>
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
