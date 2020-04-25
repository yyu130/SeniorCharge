<!DOCTYPE html>
@extends('layout')
@section('title','Find Charging Station')
@section('mycontent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<style xmlns:background-color="http://www.w3.org/1999/xhtml">
    #map{
        height: 0;
        position: relative;
        padding-bottom: 30%;

    }

    #open{
        color: green;
    }

    #close{
        color: red;
    }

    #star{
        color: orange;
    }

    #title{
        font-weight: bold;
        color: green;
        font-size: 18px;
    }

    /*#submitBtn{*/
    /*    background-color: red;*/
    /*    border-radius: 8px;*/
    /*    padding: 10px;*/
    /*    margin-right:auto;*/
    /*}*/

    #search{
        color: white;
        font-family: Arial;
    }

    #dropdown{
        font-size: 15px;
        border: 1px solid grey;
        background: #f1f1f1;
    }

    * {
        box-sizing: border-box;
    }

    form.example input[type=text] {
        padding: 8px;
        font-size: 15px;
        border: 1px solid grey;
        width: 80%;
        background: #f1f1f1;
    }

    form.example Button {
        border-radius: 8px;
        padding: 7px;
        background: green;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.example Button:hover {
        background: forestgreen;
    }

    /*form.example::after {*/
    /*    content: "";*/
    /*    clear: both;*/
    /*    display: table;*/
    /*}*/
    }

    tr{
        width: 300px;
        height: 300px;
    }
</style>
<div class="container">
<h1>&nbsp;</h1>
    <form action="/search" method="POST" role="search" class="example" style="margin-right: auto;max-width:600px">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
               placeholder="Search postcode/suburb here..." value="{{ request()->input('q')}}" style="border-radius: 8px;">
        <span>
            <h3><b>&nbsp;Sort by&nbsp;</b></h3>
        </span>
        <span>
            <select id="dropdown" class="form-control" name="sort" style="border-radius: 8px">
                <option value="no">No Sort By</option>
                <option value="rating">Rating</option>
<!--                <option value="allDay">Only Show 24 hours</option>-->
            </select>
        </span>
        &nbsp;
        <span>
            <button type="submit" id="submitBtn" class="fa fa-search">
                <span id="search">SEARCH</span>
            </button>
        </span>
        &nbsp;
        <span>
            <input type="checkbox" name="openAllDay" value="{{request()->input('openAllDay')}}">
            <label>Open 24 Hours</label>
        </span>
    </div>
</form>
</div>
<!--<button id="checkBtn">-->
<!--    Show 24 Hours-->
<!--</button>-->
<!--<button id="reset">-->
<!--    Reset-->
<!--</button>-->
<!--<button id="ratBtn">-->
<!--    List Star Rating-->
<!--</button>-->

<!--<button id="submitBtn">-->
<!--    <span >submit</span>-->
<!--</button>-->

<div class="container">
    @if(isset($details))
    <p> The search results for <b id="q"> {{ $query }} </b> are :</p>
<!--    <a href="search/?if_24h=1">Yes</a>|-->
<!--    <a href="search/?if_24h=0">No</a>|-->
<!--    <a href="search/">Reset</a>|-->

    <table class="table table-striped">
<!--        <thead>-->
<!--        <tr>-->
<!--            <th>Station Name</th>-->
<!--            <th>Address</th>-->
<!--        </tr>-->
<!--        </thead>-->
        <tbody>
        @foreach($details as $station)
        <tr>
            <td width="200" height="200"><a href="{{url('detail',$station->id)}}"><img src="{{asset('image/monash.jpg')}}" width="200" height="200"></td>
            <td>
            <ul class="name"><a id="title" href="{{url('detail',$station->id)}}">{{$station->station_name}}</a></ul>
            <ul class = "address"><img src="{{asset('image/pin.png')}}" width="15" height="15"> {{$station->address}}</ul>
            <ul class="longitude" style="display: none">{{$station->longitude}}</ul>
            <ul class="latitude" style="display: none">{{$station->latitude}}</ul>
            <ul style="display: none">{{$station->mon_open}}</ul>
            <ul style="display: none">{{$station->mon_close}}</ul>
            <ul class="hour" style="display: none">{{$station->if_24h}}</ul>
                @if(\Carbon\Carbon::now()->format('H:i:s') >= $station->mon_open & \Carbon\Carbon::now()->format('H:i:s') <= $station->mon_close)
            <ul id="open"><img src="{{asset('image/clock.png')}}" width="15" height="15"> Open</ul>
            @else
            <ul id="close"><img src="{{asset('image/clock.png')}}" width="15" height="15"> Close</ul>
            @endif
                <ul>
                    @for ($star = 1; $star <=5; $star++)
                        @if ($station->star_rating >= $star)
                        <span id="star" class="glyphicon glyphicon-star"></span>
                        @else
                        <span class="glyphicon glyphicon-star-empty"></span>
                        @endif
                    @endfor
                </ul>
            <ul>{{$station->establishment_type}}</ul>
            <ul>{{$station->charger_type}}</ul>
            </td>
        </tr>
        @endforeach

        </tbody>
        <div id="map">

        </div>

</div>
<script src="{{asset('js/jquery-3.5.0.js')}}"></script>
<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI&libraries=places"
        type="text/javascript">

</script>
<script src="{{asset('js/script.js')}}"></script>
<!--<script>-->
<!--    $(document).ready(function () {-->
<!---->
<!---->
<!--        document.getElementById('submitBtn').addEventListener("click", findLocation);-->
<!---->
<!--        function findLocation() {-->
<!--            $.ajax({-->
<!--                type: 'GET',-->
<!--                url: 'https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI',-->
<!--                success: function (data) {-->
<!--                    alert('eafa');-->
<!---->
<!--                }-->
<!--            });-->
<!--        }-->
<!--    })-->
<!--</script>-->

    </table>
</div>
    @elseif(isset($message))
        <p>{{$message}}</p>
@endif

@endsection
