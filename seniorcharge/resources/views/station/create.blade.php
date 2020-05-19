@extends('cmsLayout')
@section('mycontent')
@if(isset(Auth::user()->email))

<body style="background-color: #f0efef">
 <div class="row">
  <div class="col-md-12">
   <br />
   <h3 align="center">Add Station</h3>
   <br />

    @if(count($errors) > 0)
     <div class="alert alert-danger">
      <ul>
      @foreach($errors->all() as $error)
       <li>{{$error}}</li>
      @endforeach
      </ul>
     </div>
     @endif
     @if(\Session::has('success'))
     <div class="alert alert-success">
      <p>{{ \Session::get('success') }}</p>
     </div>
     @endif

   <form method="post" action="{{url('station')}}">
    {{csrf_field()}}
    <div class="form-group">
        <p>Station Name</p>
        <input type="text" name="station_name" class="form-control" placeholder="Enter Station Name" />
    </div>
    <div class="form-group">
        <p>Longitude</p>
     <input type="text" name="longitude" class="form-control" placeholder="Enter Longitude" />
    </div>
    <div class="form-group">
        <p>Latitude</p>
     <input type="text" name="latitude" class="form-control" placeholder="Enter Latitude" />
    </div>
    <div class="form-group">
        <p>Address</p>
     <input type="text" name="address" class="form-control" placeholder="Enter Address" />
    </div>
    <div class="form-group">
        <p>Suburb</p>
     <input type="text" name="suburb" class="form-control" placeholder="Enter Suburb" />
    </div>
    <div class="form-group">
        <p>Postcode</p>
     <input type="text" name="postcode" class="form-control" placeholder="Enter Postcode" />
    </div>
    <div class="form-group">
        <label for="if_charger_working" style="font-size: 20px; font-family: Arial;color: #3d4738">Is the charging station working?</label>
        <p style="font-size: 20px; font-family: Arial; color: #3d4738">
            <input type="radio" name="if_charger_working" value="1" style="height: 15px; width: 15px"> Yes
            <input type="radio" name="if_charger_working" value="0" style="height: 15px; width: 15px"> No
        </p>
    </div>
       <div class="form-group">
           <label for="usb_a" style="font-size: 20px; font-family: Arial;color: #3d4738">Is there Usb A?</label>
           <p style="font-size: 20px; font-family: Arial; color: #3d4738">
               <input type="radio" name="usb_a" value="1" style="height: 15px; width: 15px"> Yes
               <input type="radio" name="usb_a" value="0" style="height: 15px; width: 15px"> No
           </p>
<!--           <input type="text" name="usb_a" class="form-control" placeholder="Enter If Usb A" />-->
       </div>
       <div class="form-group">
           <label for="usb_c" style="font-size: 20px; font-family: Arial;color: #3d4738">Is there Usb C?</label>
           <p style="font-size: 20px; font-family: Arial; color: #3d4738">
               <input type="radio" name="usb_c" value="1" style="height: 15px; width: 15px"> Yes
               <input type="radio" name="usb_c" value="0" style="height: 15px; width: 15px"> No
           </p>
<!--           <input type="text" name="usb_c" class="form-control" placeholder="Enter If Usb C" />-->
       </div>
       <div class="form-group">
           <label for="micro_usb" style="font-size: 20px; font-family: Arial;color: #3d4738">Is there Micro Usb?</label>
           <p style="font-size: 20px; font-family: Arial; color: #3d4738">
               <input type="radio" name="micro_usb" value="1" style="height: 15px; width: 15px"> Yes
               <input type="radio" name="micro_usb" value="0" style="height: 15px; width: 15px"> No
           </p>
<!--           <input type="text" name="micro_usb" class="form-control" placeholder="Enter If Micro Usb" />-->
       </div><div class="form-group">
           <label for="plug_only" style="font-size: 20px; font-family: Arial;color: #3d4738">Is there Plug only?</label>
           <p style="font-size: 20px; font-family: Arial; color: #3d4738">
               <input type="radio" name="plug_only" value="1" style="height: 15px; width: 15px"> Yes
               <input type="radio" name="plug_only" value="0" style="height: 15px; width: 15px"> No
           </p>
<!--           <input type="text" name="plug_only" class="form-control" placeholder="Enter If Plug Only" />-->
       </div>
       <div class="form-group">
           <input type="text" name="establishment_type" class="form-control" placeholder="Enter Establish Type" />
       </div>
       <div class="form-group">
           <label for="if_wifi" style="font-size: 20px; font-family: Arial;color: #3d4738">Is there Free Wifi?</label>
           <p style="font-size: 20px; font-family: Arial; color: #3d4738">
               <input type="radio" name="if_wifi" value="1" style="height: 15px; width: 15px"> Yes
               <input type="radio" name="if_wifi" value="0" style="height: 15px; width: 15px"> No
           </p>
<!--           <input type="text" name="if_wifi" class="form-control" placeholder="Enter If Wifi" />-->
       </div>
       <div class="form-group">
           <label for="if_bathroom" style="font-size: 20px; font-family: Arial;color: #3d4738">Is there Free Bathroom?</label>
           <p style="font-size: 20px; font-family: Arial; color: #3d4738">
               <input type="radio" name="if_bathroom" value="1" style="height: 15px; width: 15px"> Yes
               <input type="radio" name="if_bathroom" value="0" style="height: 15px; width: 15px"> No
           </p>
<!--           <input type="text" name="if_bathroom" class="form-control" placeholder="Enter If Bathroom" />-->
       </div>
       <div class="form-group">
           <label for="access_type" style="font-size: 20px; font-family: Arial;color: #3d4738">Accessibility Type</label>
           <p style="font-size: 20px; font-family: Arial; color: #3d4738">
               <input type="radio" name="access_type" value="Main entrance is step free or with ramps" style="height: 15px; width: 15px"> High
               <input type="radio" name="access_type" value="Entrance(s) have limited access via a small lip or a steep ramp, but alternative access available" style="height: 15px; width: 15px"> Moderate
               <input type="radio" name="access_type" value="All entrances have steps" style="height: 15px; width: 15px"> Low
               <input type="radio" name="access_type" value="Not determined" style="height: 15px; width: 15px"> Not Determined
           </p>
<!--           <input type="text" name="access_type" class="form-control" placeholder="Enter Access Type" />-->
       </div>
       <div class="form-group">
           <p>Other Amenities</p>
           <input type="text" name="other_amenities" class="form-control" placeholder="Enter Other Amenities" />
       </div>
       <div class="form-group">
           <p>Rating</p>
           <input type="text" name="star_rating" class="form-control" placeholder="Enter Rating" />
       </div>
       <div class="form-group">
           <p>Monday Open Time</p>
           <input type="time" name="mon_open" class="form-control" />
       </div>
       <div class="form-group">
           <p>Monday Close Time</p>
           <input type="time" name="mon_close" class="form-control" />
       </div>
       <div class="form-group">
           <p>Tuesday Open Time</p>
           <input type="time" name="tue_open" class="form-control" />
       </div>
       <div class="form-group">
           <p>Tuesday Close Time</p>
           <input type="time" name="tue_close" class="form-control" />
       </div>
       <div class="form-group">
           <p>Wednesday Open Time</p>
           <input type="time" name="wed_open" class="form-control" />
       </div>
       <div class="form-group">
           <p>Wednesday Close Time</p>
           <input type="time" name="wed_close" class="form-control" />
       </div>
       <div class="form-group">
           <p>Thursday Open Time</p>
           <input type="time" name="thu_open" class="form-control" />
       </div>
       <div class="form-group">
           <p>Thursday Close Time</p>
           <input type="time" name="thu_close" class="form-control" />
       </div>
       <div class="form-group">
           <p>Friday Open Time</p>
           <input type="time" name="fri_open" class="form-control" />
       </div>
       <div class="form-group">
           <p>Friday Close Time</p>
           <input type="time" name="fri_close" class="form-control" />
       </div>
       <div class="form-group">
           <p>Saturday Open Time</p>
           <input type="time" name="sat_open" class="form-control" />
       </div>
       <div class="form-group">
           <p>Saturday Close Time</p>
           <input type="time" name="sat_close" class="form-control" />
       </div>
       <div class="form-group">
           <p>Sunday Open Time</p>
           <input type="time" name="sun_open" class="form-control" />
       </div>
       <div class="form-group">
           <p>Sunday Close Time</p>
           <input type="time" name="sun_close" class="form-control" />
       </div>
       <div class="form-group">
           <label for="if_24h" style="font-size: 20px; font-family: Arial;color: #3d4738">Is there 24 Hours?</label>
           <p style="font-size: 20px; font-family: Arial; color: #3d4738">
               <input type="radio" name="if_24h" value="1" style="height: 15px; width: 15px"> Yes
               <input type="radio" name="if_24h" value="0" style="height: 15px; width: 15px"> No
           </p>
<!--           <input type="text" name="if_24h" class="form-control" placeholder="Enter If 24H"/>-->
       </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add</button>
        <a href="{{route('station.index')}}" class="btn btn-primary">Back</a>
    </div>
   </form>
  </div>
 </div>
</body>
@else
<script>window.location = "/main";</script>
@endif
 @endsection
