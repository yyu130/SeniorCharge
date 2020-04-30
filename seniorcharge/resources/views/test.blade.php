@extends('layout')
@section('title','Find Stations')
@section('mycontent')
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<style>
    #map{
        height: 0;
        position: relative;
        padding-bottom: 50%;

    }

    #open{
        color: #85B892;
        font-size: 24px;
        font-family: Arial;
        font-weight: bold;
    }

    #close{
        color: red;
        font-size: 24px;
        font-family: Arial;
        font-weight: bold;
    }

    #star{
        color: #f77f00;
    }

    #title{
        font-weight: bold;
        color: #588D6A;
        font-size: 30px;
        font-family: Arial;
    }

    /*#submitBtn{*/
    /*    background-color: red;*/
    /*    border-radius: 8px;*/
    /*    padding: 10px;*/
    /*    margin-right:auto;*/
    /*}*/

    #search{
        font-weight: bold;
        font-family: Arial;
        font-size: 20px;
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
<!--<div class="container">-->
<!--    <h1>Search</h1>-->
<!--    <form action="{{route('searchFor')}}">-->
<!--        <input type="text" name="q" id="q" value="{{ request()->input('q')}}" placeholder="search">-->
<!--    </form>-->
<!--</div>-->
<div class="container">
    <h1>&nbsp;</h1>
    <form action="{{route('searchFor')}}" class="example" style="margin-right: auto;max-width:600px">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="query"
                   placeholder="Search postcode/suburb here..." value="{{ request()->input('query')}}" style="border-radius: 8px; display: none">
            <span>
            <h3><b style="font-size: 22px; font-family: Arial; color: #3d4738;">&nbsp;Sort by&nbsp;&nbsp;</b></h3>
            </span>
            <span>
            <select id="dropdown" class="form-control" name="sort" value="" style="border-radius: 8px">
                <option value="name" <?php echo isset($_GET["sort"]) && $_GET["sort"] == "name" ? "selected" : "" ?>>Name</option>
                <option value="status" <?php echo isset($_GET["sort"]) && $_GET["sort"] == "status" ? "selected" : "" ?>>Open</option>
                <option value="rating" <?php echo isset($_GET["sort"]) && $_GET["sort"] == "rating" ? "selected" : "" ?>>Rating</option>
            </select>
            </span>
<!--            &nbsp;&nbsp;&nbsp;-->
<!--            &nbsp;&nbsp;&nbsp;-->
<!--            &nbsp;&nbsp;&nbsp;-->
<!--            &nbsp;&nbsp;&nbsp;-->
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>
            <span>
            <input type="checkbox" name="openAllDay" style="height: 18px;width: 18px;" <?php if(isset($_GET['openAllDay'])) echo 'checked';?>>
            <label style="font-size: 22px; font-family: Arial; color: #3d4738">24 Hours Only</label>
            </span>
            </b>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span>
            <button type="submit" id="submitBtn" style="background-color: #588D6A" class="fa fa-filter">
                    <span style="font-family: Arial;font-size: 20px; font-weight: bold">Submit</span>

            </button>
            </span>

        </div>
    </form>
</div>

<br>

<div class="container">
    @if(isset($details))
    <p style="font-size: 22px; font-family: Arial; color: #3d4738"><img src="{{asset('image/result.png')}}" width="20" height="20"><strong> {{ $details->count() }} result(s)</strong> have been found</p>
    <p style="display: none"> The search results for <b id="query"> {{ $query }} </b> are :</p>
    <div id="map">

    </div>

    <table class="table table-striped" >
        <table class="table table-responsive">
    <!--        <thead>-->
    <!--        <tr>-->
    <!--            <th>Station Name</th>-->
    <!--            <th>Address</th>-->
    <!--        </tr>-->
    <!--        </thead>-->
    <tbody>
    @foreach($details as $station)
    <tr>
        @if ($station->establishment_type == "Library")
        <td class="table-responsive" width="200" height="300"><a href="{{url('detail',$station->id)}}"><img src="{{asset('image/library.png')}}" width="200" height="200"></td>
        @elseif ($station->establishment_type == "Housing Support Services")
        <td class="table-responsive" width="200" height="300"><a href="{{url('detail',$station->id)}}"><img src="{{asset('image/house.png')}}" width="200" height="200"></td>
        @elseif ($station->establishment_type == "Train Station")
        <td class="table-responsive" width="200" height="300"><a href="{{url('detail',$station->id)}}"><img src="{{asset('image/station.png')}}" width="200" height="200"></td>
        @elseif ($station->establishment_type == "Community Centre")
        <td class="table-responsive" width="200" height="300"><a href="{{url('detail',$station->id)}}"><img src="{{asset('image/center.png')}}" width="200" height="200"></td>
        @elseif ($station->establishment_type == "Community Space")
        <td class="table-responsive" width="200" height="300"><a href="{{url('detail',$station->id)}}"><img src="{{asset('image/space.png')}}" width="200" height="200"></td>
        @elseif ($station->establishment_type == "Restaurant")
        <td class="table-responsive" width="200" height="300"><a href="{{url('detail',$station->id)}}"><img src="{{asset('image/mc.png')}}" width="200" height="200"></td>
        @else
        <td class="table-responsive" width="200" height="300"><a href="{{url('detail',$station->id)}}"><img src="{{asset('image/other.png')}}" width="200" height="200"></td>
        @endif
        <td class="table-responsive-md">
            <ul class="name"><a id="title" href="{{url('detail',$station->id)}}">{{$station->station_name}}</a></ul>
            <ul class = "address" style="font-family: Arial;font-size: 26px; color: #3D4738"><img src="{{asset('image/pin.png')}}" width="22" height="22"> {{$station->address}}</ul>
            <ul class="longitude" style="display: none">{{$station->longitude}}</ul>
            <ul class="latitude" style="display: none">{{$station->latitude}}</ul>
            <ul class="open" style="display: none">{{\Carbon\Carbon::createFromFormat('H:i:s',$station->mon_open)->format('g a')}}</ul>
            <ul class="close" style="display: none">{{\Carbon\Carbon::createFromFormat('H:i:s',$station->mon_close)->format('g a')}}</ul>
            <ul class="hour" style="display: none">{{$station->if_24h}}</ul>
            @if(\Carbon\Carbon::now()->format('H:i:s') >= $station->mon_open & \Carbon\Carbon::now()->format('H:i:s') <= $station->mon_close)
            <ul id="open">
                Open Now
            </ul>
            @else
            <ul id="close">
                Closed Now
            </ul>
            @endif
            <ul style="font-size: 20px">
                @for ($star = 1; $star <=5; $star++)
                @if ($station->star_rating >= $star)
                <span id="star" class="glyphicon glyphicon-star"></span>
                @else
                <span class="glyphicon glyphicon-star-empty"></span>
                @endif
                @endfor
            </ul>
            <ul class="type" style="font-size: 26px;font-family: Arial">{{$station->establishment_type}}</ul>
            <ul style="font-size: 26px;font-family: Arial;font-weight: bold">Types of Charger Available:</ul>
            @if ($station->usb_a == 1)
            <ul style="font-size: 26px;font-family: Arial">USB A</ul>
            @endif
            @if ($station->usb_c == 1)
            <ul style="font-size: 26px;font-family: Arial">Type C</ul>
            @endif
            @if ($station->micro_usb == 1)
            <ul style="font-size: 26px;font-family: Arial">Micro USB</ul>
            @endif
            @if ($station->plug_only == 1)
            <ul style="font-size: 26px;font-family: Arial">Plug Only</ul>
            @endif
        </td>
    </tr>
    @endforeach
    </tbody>
<!--        <div id="map">-->
<!---->
<!--        </div>-->
</table></table>
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
</body>

<!--<div class="footer">-->
<!--    900 Dandenong Rd-->
<!--    <br>Caulfield Eest VIC 3145-->
<!--    <br>(03) 9903 2000-->
<!---->
<!--    <br><br>@2020 Sr.Charge-->
<!--</div>-->
@endsection
