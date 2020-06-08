<!--update station details in cms-->

@extends('cmsLayout')
@section('mycontent')
@if(isset(Auth::user()->email))

<body style="background-color: #f0efef">

<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Edit Station</h3>
        <br />
        @if(count($errors) > 0)

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <form method="post" action="{{action('StationController@update', $id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH" />
                <div class="form-group">
                    <p>Station Name</p>
                    <input type="text" name="station_name" class="form-control" value="{{$station->station_name}}" placeholder="Enter Station Name" />
                </div>
                <div class="form-group">
                    <p>Longitude</p>
                    <input type="text" name="longitude" class="form-control" value="{{$station->longitude}}" placeholder="Enter Longitude" />
                </div>
                <div class="form-group">
                    <p>Latitude</p>
                    <input type="text" name="latitude" class="form-control" value="{{$station->latitude}}" placeholder="Enter Latitude" />
                </div>
                <div class="form-group">
                    <p>Address</p>
                    <input type="text" name="address" class="form-control" value="{{$station->address}}" placeholder="Enter Address" />
                </div>
                <div class="form-group">
                    <p>Suburb</p>
                    <input type="text" name="suburb" class="form-control" value="{{$station->suburb}}" placeholder="Enter Suburb" />
                </div>
                <div class="form-group">
                    <p>Postcode</p>
                    <input type="text" name="postcode" class="form-control" value="{{$station->postcode}}" placeholder="Enter Postcode" />
                </div>
                <div class="form-group">
                    <p>Is the charging station working?</p>
                    <input type="text" name="if_charger_working" class="form-control" value="{{$station->if_charger_working}}" placeholder="Enter If Charger Working" />
                </div>
                <div class="form-group">
                    <p>Is there Usb A</p>
                    <input type="text" name="usb_a" class="form-control" value="{{$station->usb_a}}" placeholder="Enter If Usb A" />
                </div>
                <div class="form-group">
                    <p>Is there Usb C</p>
                    <input type="text" name="usb_c" class="form-control" value="{{$station->usb_c}}" placeholder="Enter If Usb C" />
                </div>
                <div class="form-group">
                    <p>Is there Micro Usb</p>
                    <input type="text" name="micro_usb" class="form-control" value="{{$station->micro_usb}}" placeholder="Enter If Micro Usb" />
                </div>
                <div class="form-group">
                    <p>Is there Plug Only</p>
                    <input type="text" name="plug_only" class="form-control" value="{{$station->plug_only}}" placeholder="Enter If Plug Only" />
                </div>
                <div class="form-group">
                    <p>Establishment Type</p>
                    <input type="text" name="establishment_type" class="form-control" value="{{$station->establishment_type}}" placeholder="Enter Establishment Type" />
                </div>
                <div class="form-group">
                    <p>Is there Free Wifi</p>
                    <input type="text" name="if_wifi" class="form-control" value="{{$station->if_wifi}}" placeholder="Enter If Wifi" />
                </div>
                <div class="form-group">
                    <p>Is there Free Bathroom</p>
                    <input type="text" name="if_bathroom" class="form-control" value="{{$station->if_bathroom}}" placeholder="Enter if_bathroom" />
                </div>
                <div class="form-group">
                    <p>Accessibility Type</p>
                    <input type="text" name="access_type" class="form-control" value="{{$station->access_type}}" placeholder="Enter Accessibility Type" />
                </div>
                <div class="form-group">
                    <p>Other Amenities</p>
                    <input type="text" name="other_amenities" class="form-control" value="{{$station->other_amenities}}" placeholder="Enter Other Amenities" />
                </div>
                <div class="form-group">
                    <p>Rating</p>
                    <input type="text" name="star_rating" class="form-control" value="{{$station->star_rating}}" placeholder="Enter Star Rating" />
                </div>
                <div class="form-group">
                    <p>Monday Open Time</p>
                    <input type="time" name="mon_open" class="form-control" value="{{$station->mon_open}}"/>
                </div>
                <div class="form-group">
                    <p>Monday Close Time</p>
                    <input type="time" name="mon_close" class="form-control" value="{{$station->mon_close}}"/>
                </div>
                <div class="form-group">
                    <p>Tuesday Open Time</p>
                    <input type="time" name="tue_open" class="form-control" value="{{$station->tue_open}}"/>
                </div>
                <div class="form-group">
                    <p>Tuesday Close Time</p>
                    <input type="time" name="tue_close" class="form-control" value="{{$station->tue_close}}"/>
                </div>
                <div class="form-group">
                    <p>Wednesday Open Time</p>
                    <input type="time" name="wed_open" class="form-control" value="{{$station->wed_open}}"/>
                </div>
                <div class="form-group">
                    <p>Wednesday Close Time</p>
                    <input type="time" name="wed_close" class="form-control" value="{{$station->wed_close}}"/>
                </div>
                <div class="form-group">
                    <p>Thursday Open Time</p>
                    <input type="time" name="thu_open" class="form-control" value="{{$station->thu_open}}"/>
                </div>
                <div class="form-group">
                    <p>Thursday Close Time</p>
                    <input type="time" name="thu_close" class="form-control" value="{{$station->thu_close}}"/>
                </div>
                <div class="form-group">
                    <p>Friday Open Time</p>
                    <input type="time" name="fri_open" class="form-control" value="{{$station->fri_open}}"/>
                </div>
                <div class="form-group">
                    <p>Friday Close Time</p>
                    <input type="time" name="fri_close" class="form-control" value="{{$station->fri_close}}"/>
                </div>
                <div class="form-group">
                    <p>Saturday Open Time</p>
                    <input type="time" name="sat_open" class="form-control" value="{{$station->sat_open}}"/>
                </div>
                <div class="form-group">
                    <p>Saturday Close Time</p>
                    <input type="time" name="sat_close" class="form-control" value="{{$station->sat_close}}"/>
                </div>
                <div class="form-group">
                    <p>Sunday Open Time</p>
                    <input type="time" name="sun_open" class="form-control" value="{{$station->sun_open}}"/>
                </div>
                <div class="form-group">
                    <p>Sunday Close Time</p>
                    <input type="time" name="sun_close" class="form-control" value="{{$station->sun_close}}"/>
                </div>
                <div class="form-group">
                    <p>Is there 24 Hours</p>
                    <input type="text" name="if_24h" class="form-control" value="{{$station->if_24h}}" placeholder="Enter if 24H" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                    <a href="{{route('station.index')}}" class="btn btn-primary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
@else
<script>window.location = "/main";</script>
@endif
 @endsection
