<!--    this page is for showing the detail information of specific charging station-->

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
    .gaugeBackground {
        fill: #ddd;
    }
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
        color: #588D6A;;
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
<!--<script src="{{asset('js/script.js')}}"></script>-->

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
<div class="jumbotron mb-0 jumbotron-fluid" style="height: 300px; padding-top: 150px;background-image: url('{{asset('image/detail1.png')}}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;" >
</div>
<br><br>
<!--    back button - back to the result page to show all charging stations-->
<div class="container">
<!--    <a style="color: white" id="back" class="Button"><i class="fas fa-arrow-left" > Back</i></a>-->
    <form action="{{route('searchFor')}}" class="example" style="margin-right: auto">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="query"
               placeholder="Search..." value="{{$station->postcode}}" style="display: none;">
        <span>
					<button id="submitBtn" style="background-color: #588D6A;border-radius: 8px" class="fas fa-arrow-left">
                    <span style="font-family: Arial;font-size: 20px; font-weight: bold"> Back</span>
					</button>
                </span>
    </div>
    </form>
<!--    <p id="post">{{$station->postcode}}</p>-->
</div>
<br>

<!--   detailed information about charging station-->
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
            <!--    show image depends their estabishment type-->
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
            <p style="font-family: Arial;font-size: 22px;color: #3D4738;font-weight: bold; text-align: center;margin-left: 60px">{{$station->establishment_type}}</p>
        </div>

        <div class="col-md-5 col-md-offset-1" style="margin: auto; margin-top: 0px">
            <br>
            <!--    show different services and chargers depending what they have-->
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
<!--    review section (view summary and give reviews)-->
<div class="container">
    @if ($reviews->count() > 1)
    <p style="color: #588D6A; font-size: 30px; font-weight: bold;font-family: Arial">Ratings & Reviews ({{ $reviews->count() }} reviews)
        @else
    <p style="color: #588D6A; font-size: 30px; font-weight: bold;font-family: Arial">Ratings & Reviews ({{ $reviews->count() }} review)
        @endif
        &nbsp;
        <a href="#" style="font-family: Arial;font-size: 26px;color: #3D4738" id="write">
            <img src="{{asset('image/edit.png')}}" width="28" height="28" style="margin-top: -7.7px">Review this station</a></p>
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
        
        <!--    give reviews (star rating and is charging station working?)-->
        <div class="container">
        <form method="post" action="{{url('review')}}" style="text-align: center">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="station_id" class="form-control" style="display: none" value="{{$station->id}}" />
            </div>
            <div class="form-group" >
                <p style="font-size: 20px; font-family: Arial;color: #3d4738">Rate the place you've visited</p>
                <br>
                <div class="ratings">
                <span class="fa fa-star-o" id="star" style="font-size: 40px"></span>
                <span class="fa fa-star-o" id="star" style="font-size: 40px"></span>
                <span class="fa fa-star-o" id="star" style="font-size: 40px"></span>
                <span class="fa fa-star-o" id="star" style="font-size: 40px"></span>
                <span class="fa fa-star-o" id="star" style="font-size: 40px"></span>
                </div>
                <input type="text" id="rating" name="rating" class="form-control" style="display: none" />
                <br>
            </div>
            <div class="form-group" style="border-top: 1px solid #588D6A">
                <br>
                <br>
                <!--                <p>Is the charging station working?</p>-->
                <!--                <input type="text" name="is_working" class="form-control" placeholder="Enter If charger station is working or not" />-->
                <label for="is_working" style="font-size: 20px; font-family: Arial;color: #3d4738">Was the charging station working?</label>
                <br><br>
                <p style="font-size: 20px; font-family: Arial; color: #3d4738">
                <input type="radio" name="is_working" value="1" style="height: 15px; width: 15px"> Yes
                <input type="radio" name="is_working" value="0" style="height: 15px; width: 15px"> No
                </p>
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
<!--            <div class="form-group" style="border-top: 1px solid #588D6A">-->
<!--                <br>-->
<!--                <br>-->
<!--                <p style="font-size: 36px; font-family: Arial;color: #3d4738">Other feedback</p>-->
<!--                <br>-->
<!--                <textarea name="comments" style="height: 100px; width: 80%; font-size: 28px; font-family: Arial;"></textarea>-->
<!--            </div>-->
            <br>
            <div>
            <div class="form-group" style="display: inline-block; margin: 20px">
                <button id="submitBtn" style="background-color: #588D6A;border-radius: 8px;width: 180px;border-color: #588D6A" class="btn btn-primary">
                    <a style="font-family: Arial;font-size: 20px; color: #ffffff">Submit</a>
                </button>
            </div>

            <div class="form-group" style="display: inline-block; margin: 20px">
                <button style="background-color: #588D6A;border-radius: 8px;width: 180px;border-color: #588D6A" class="btn btn-primary">
                <a style="font-family: Arial;font-size: 20px; color: #ffffff" href="" >Review later</a>
                </button>
            </div>
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
<!--    show summary of charging station (average rating and chart for whether charging station work or not)-->
<br>
@if ($reviews->count() != 0)
<div class="row" style="background-color: #aecdb5;margin: auto">
    <div class="inline" style="margin: auto;margin-top: 0px">
<!--            <h5 style="text-align: center; font-size: 28px; font-family: Arial; font-weight: bold; color: #9a0311">-->
<!--                {{ $reviews->count() }} people give rate-->
<!--            </h5>-->
        <h5 style="text-align: center">
        <span style=" font-size: 27px; font-family: Arial; font-weight: bold; color: #3d4738">
            Average Rating
        </span>
        <span style="font-size: 30px; font-family: Arial; font-weight: bold; color: #9a0311">
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
        <!--    number of review for each rating(1-5)-->
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


<!--    <script src="https://d3js.org/d3.v4.js"></script>-->

    <!-- Create a div where the graph will take place -->
    <div class="inline" style="margin: auto;margin-top: 0px">
        <span style=" font-size: 27px; font-family: Arial; font-weight: bold; color: #3d4738">
            Charging Station Working?
        </span>
        <div id="my_dataviz" style="text-align: center;margin-top:60px">
        </div>
    </div>
    <!-- Color scale -->
    <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
    <script src='https://d3js.org/d3.v2.js'></script>
<!--    <script data-require="d3@*" data-semver="3.2.2" src="//cdnjs.cloudflare.com/ajax/libs/d3/3.2.2/d3.min.js"></script>-->
<!--    <script data-require="d3@*" data-semver="3.2.2" src="//cdnjs.cloudflare.com/ajax/libs/d3/3.2.2/d3.v3.min.js"></script>-->
    <!--    javascript for d3 dynamic chart-->
    <script type="text/javascript">
        let Gauge = function(configuration) {
            let that = {}

            let config = {
                size: 300,
                arcInset: 150,
                arcWidth: 60,

                pointerWidth: 8,
                pointerOffset: 0,
                pointerHeadLengthPercent: 0.9,

                minValue: 0,
                maxValue: {{$working}}+{{$notWorking}},

                minAngle: -90,
                maxAngle: 90,

                transitionMs: 750,

                currentLabelFontSize: 20,
                currentLabelInset: 20,
                labelFont: "Helvetica",
                labelFontSize: 25,
                labelFormat: (numberToFormat) => {
                    let prefix = d3.formatPrefix(numberToFormat)
                    console.log(prefix)
                    return prefix.scale(numberToFormat) + '' + prefix.symbol.toUpperCase()
                },

                arcColorFn: function(value) {
                    let ticks = [{
                        tick: 0,
                        color: '#588D6A'
                    }, {
                        tick: 25000,
                        color: 'yellow'
                    }, {
                        tick: 50000,
                        color: 'orange'
                    }, {
                        tick: 75000,
                        color: 'red'
                    }]
                    let ret;
                    ticks.forEach(function(tick) {

                        if (value > tick.tick) {
                            ret = tick.color
                            return
                        }
                    });
                    return ret;
                }
            }

            function configure(configuration) {
                for (let prop in configuration) {
                    config[prop] = configuration[prop]
                }
            }
            configure(configuration);

            let foreground, arc, svg, current;
            let cur_color;
            let new_color, hold;

            var oR = config.size - config.arcInset;
            var iR = config.size - oR - config.arcWidth;

            function deg2rad(deg) {
                return deg * Math.PI / 180
            }

            function render(value) {

                //oR = 30;
                //iR = 10;



                // Arc Defaults
                arc = d3.svg.arc()
                    .innerRadius(iR)
                    .outerRadius(oR)
                    .startAngle(deg2rad(-90))


                svg = d3.select("#my_dataviz").append("svg")
                    .attr("width", config.size)
                    .attr("height", 200)
                    .append("g")
                    .attr("transform", "translate(" + config.size / 2 + "," + config.size / 2 + ")")


                // Append background arc to svg
                var background = svg.append("path")
                    .datum({
                        endAngle: deg2rad(90)
                    })
                    .attr("class", "gaugeBackground")
                    .attr("d", arc)

                // Append foreground arc to svg
                foreground = svg.append("path")
                    .datum({
                        endAngle: deg2rad(-90)
                    })
                    //.style("fill", cur_color)
                    .attr("d", arc);

                // Display Max value
                var max = svg.append("text")
                    .attr("transform", "translate(" + (iR + ((oR - iR) / 2)) + ",25)") // Set between inner and outer Radius
                    .attr("text-anchor", "middle")
                    .style("font-size", config.labelFontSize)
                    .style("font-family", config.labelFont)
                    .text(config.maxValue)

                // Display Min value
                var min = svg.append("text")
                    .attr("transform", "translate(" + -(iR + ((oR - iR) / 2)) + ",25)") // Set between inner and outer Radius
                    .attr("text-anchor", "middle")
                    .style("font-size", config.labelFontSize)
                    .style("font-family", config.labelFont)
                    .text(config.minValue)

                // Display Current value
                current = svg.append("text")
                    .attr("transform", "translate(0," + -(-config.currentLabelInset + iR / 4) + ")") // Push up from center 1/4 of innerRadius
                    .attr("text-anchor", "middle")
                    .style("font-size", "25px")
                    .style("font-family", config.labelFont)
                    .text(config.labelFormat(current))
            }


            function update(value) {
                // Get new color
                new_color = config.arcColorFn(value)
                console.log(new_color)

                var numPi = deg2rad(Math.floor(value * 180 / config.maxValue - 90));

                // Display Current value
                current.transition()
                    .text((value/config.maxValue*100).toFixed(0)  + "% said YES")
                // .text(config.labelFormat(value))

                // Arc Transition
                foreground.transition()
                    .duration(config.transitionMs)
                    .styleTween("fill", function() {
                        return d3.interpolate(new_color, cur_color);
                    })
                    .call(arcTween, numPi);

                // Set colors for next transition
                hold = cur_color;
                cur_color = new_color;
                new_color = hold;
            }

            // Update animation
            function arcTween(transition, newAngle) {
                transition.attrTween("d", function(d) {
                    var interpolate = d3.interpolate(d.endAngle, newAngle);
                    return function(t) {
                        d.endAngle = interpolate(t);
                        return arc(d);
                    };
                });
            }

            render();
            that.update = update;
            that.configuration = config;
            return that;
        }

        let g = new Gauge({
            size: 300
        });
        console.log(g)
        g.update(30000);
        g.update({{$working}});

        // var canvasWidth = 350, //width
        //     canvasHeight = 300,   //height
        //     outerRadius = 100,   //radius
        //     color = d3.scale.category20(); //builtin range of colors
        //
        // var dataSet = [
        //     {"legendLabel":"Yes", "magnitude":{{$working}}},
        //     {"legendLabel":"No", "magnitude":{{$notWorking}}}];
        //
        // var vis = d3.select("#my_dataviz")
        //     .append("svg:svg") //create the SVG element inside the <body>
        //     .data([dataSet]) //associate our data with the document
        //     .attr("width", canvasWidth) //set the width of the canvas
        //     .attr("height", canvasHeight) //set the height of the canvas
        //     .append("svg:g") //make a group to hold our pie chart
        //     .attr("transform", "translate(" + 175 + "," + 160 + ")") // relocate center of pie to 'outerRadius,outerRadius'
        //
        // // This will create <path> elements for us using arc data...
        // var arc = d3.svg.arc()
        //     .outerRadius(outerRadius);
        //
        // var pie = d3.layout.pie() //this will create arc data for us given a list of values
        //     .value(function(d) { return d.magnitude; }) // Binding each value to the pie
        //     .sort( function(d) { return null; } );
        //
        // // Select all <g> elements with class slice (there aren't any yet)
        // var arcs = vis.selectAll("g.slice")
        //     // Associate the generated pie data (an array of arcs, each having startAngle,
        //     // endAngle and value properties)
        //     .data(pie)
        //     // This will create <g> elements for every "extra" data element that should be associated
        //     // with a selection. The result is creating a <g> for every object in the data array
        //     .enter()
        //     // Create a group to hold each slice (we will have a <path> and a <text>
        //     // element associated with each slice)
        //     .append("svg:g")
        //     .attr("class", "slice");    //allow us to style things in the slices (like text)
        //
        // arcs.append("svg:path")
        //     //set the color for each slice to be chosen from the color function defined above
        //     .attr("fill", function(d, i) { return color(i); } )
        //     //this creates the actual SVG path using the associated data (pie) with the arc drawing function
        //     .attr("d", arc);
        //
        // // Add a legendLabel to each arc slice...
        // arcs.append("svg:text")
        //     .attr("transform", function(d) { //set the label's origin to the center of the arc
        //         //we have to make sure to set these before calling arc.centroid
        //         d.outerRadius = outerRadius + 50; // Set Outer Coordinate
        //         d.innerRadius = outerRadius +80; // Set Inner Coordinate
        //         return "translate(" + arc.centroid(d)  + ")";
        //     })
        //     .attr("text-anchor", "middle") //center the text on it's origin
        //     .style("fill", "Purple")
        //     .style("font", "bold 20px Arial")
        //     .text(function(d, i) { return dataSet[i].legendLabel +" - "+ dataSet[i].magnitude}); //get the label from our original data array
        //
        // // Add a magnitude value to the larger arcs, translated to the arc centroid and rotated.
        // arcs.filter(function(d) { return d.endAngle - d.startAngle > .2; }).append("svg:text")
        //     .attr("dy", ".35em")
        //     .attr("text-anchor", "middle")
        //     //.attr("transform", function(d) { return "translate(" + arc.centroid(d) + ")rotate(" + angle(d) + ")"; })
        //     .attr("transform", function(d) { //set the label's origin to the center of the arc
        //         //we have to make sure to set these before calling arc.centroid
        //         d.outerRadius = outerRadius; // Set Outer Coordinate
        //         d.innerRadius = outerRadius/2; // Set Inner Coordinate
        //         return "translate(" + arc.centroid(d) + ")";
        //     })
        //     .style("fill", "White")
        //     .style("font", "bold 12px Arial")
        //     .text(function(d) { return d.data.magnitude; });
        //
        // // Computes the angle of an arc, converting from radians to degrees.
        // function angle(d) {
        //     var a = (d.startAngle + d.endAngle) * 90 / Math.PI - 90;
        //     return a > 90 ? a - 180 : a;
        // }
    </script>

<!--    <script>-->
<!---->
<!--        // set the dimensions and margins of the graph-->
<!--        var width = 340-->
<!--        height = 340-->
<!--        margin = 40-->
<!---->
<!--        // The radius of the pieplot is half the width or half the height (smallest one). I subtract a bit of margin.-->
<!--        var radius = Math.min(width, height) / 2 - margin-->
<!---->
<!--        // append the svg object to the div called 'my_dataviz'-->
<!--        var svg = d3.select("#my_dataviz")-->
<!--            .append("svg")-->
<!--            .attr("width", width)-->
<!--            .attr("height", height)-->
<!--            .append("g")-->
<!--            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");-->
<!---->
<!--        // Create dummy data-->
<!--        var data = {-->
<!--            Yes: {{$working}},-->
<!--            No: {{$notWorking}}-->
<!--        }-->
<!---->
<!--        // set the color scale-->
<!--        var color = d3.scaleOrdinal()-->
<!--            .domain(data)-->
<!--            .range(d3.schemeSet2);-->
<!---->
<!--        // Compute the position of each group on the pie:-->
<!--        var pie = d3.pie()-->
<!--            .value(function(d) {return d.value; })-->
<!--        var data_ready = pie(d3.entries(data))-->
<!--        // Now I know that group A goes from 0 degrees to x degrees and so on.-->
<!---->
<!--        // shape helper to build arcs:-->
<!--        var arcGenerator = d3.arc()-->
<!--            .innerRadius(0)-->
<!--            .outerRadius(radius)-->
<!---->
<!--        // Build the pie chart: Basically, each part of the pie is a path that we build using the arc function.-->
<!--        svg-->
<!--            .selectAll('mySlices')-->
<!--            .data(data_ready)-->
<!--            .enter()-->
<!--            .append('path')-->
<!--            .attr('d', arcGenerator)-->
<!--            .attr('fill', function(d){ return(color(d.data.key)) })-->
<!--            .attr("stroke", "black")-->
<!--            .style("stroke-width", "2px")-->
<!--            .style("opacity", 0.7)-->
<!---->
<!--        // Now add the annotation. Use the centroid method to get the best coordinates-->
<!--        svg-->
<!--            .selectAll('mySlices')-->
<!--            .data(data_ready)-->
<!--            .enter()-->
<!--            .append('text')-->
<!--            .text(function(d){ return d.data.key+ ": " + d.value})-->
<!--            .attr("transform", function(d) { return "translate(" + arcGenerator.centroid(d) + ")";  })-->
<!--            .style("text-anchor", "middle")-->
<!--            .style("font-size", 17)-->
<!---->
<!---->
<!--    </script>-->

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
<!--<br><br>-->
<!--<div class="container">-->
<!--<table class="table table-striped">-->
<!--    <table style="border-collapse: collapse">-->
<!--        <tbody>-->
<!--        @foreach($reviews as $review)-->
<!--        <tr style="border-bottom: 1px solid #588D6A">-->
<!--            <td class="table-responsive-md" style="vertical-align: top">-->
<!--                <img src="{{asset('image/tou.png')}}" width="60" height="60" style="text-align: center">-->
<!--            </td>-->
<!--            <td class="table-responsive-md">-->
<!--                <ul class="type" style="font-size: 26px;font-family: Arial;font-weight: bold;color: #588D6A">Review ID: {{$review->id}}</ul>-->
<!--                <ul class="type" style="font-size: 26px;font-family: Arial">-->
<!--                    @for ($star = 1; $star <=5; $star++)-->
<!--                    @if ($review->rating>= $star)-->
<!--                    <span id="star" class="glyphicon glyphicon-star"></span>-->
<!--                    @else-->
<!--                    <span class="glyphicon glyphicon-star-empty"></span>-->
<!--                    @endif-->
<!--                    @endfor-->
<!--                    <h5 style="font-size: 20px;font-family: Arial; color: #3D4738">{{\Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</h5>-->
<!--                </ul>-->
<!---->
<!--            </td>-->
<!--        </tr>-->
<!--        @endforeach-->
<!--        </tbody>-->
<!--    </table>-->
<!--</table>-->
<!--</div>-->
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
