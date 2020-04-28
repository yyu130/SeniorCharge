@extends('master')

 @section('content')
 <div class="row">
  <div class="col-md-12">
   <br />
   <h3 aling="center">Add Data</h3>
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
     <input type="text" name="station_name" class="form-control" placeholder="Enter Station Name" />
    </div>
    <div class="form-group">
     <input type="text" name="longitude" class="form-control" placeholder="Enter Longitude" />
    </div>
    <div class="form-group">
     <input type="text" name="latitude" class="form-control" placeholder="Enter Latitude" />
    </div>
    <div class="form-group">
     <input type="text" name="address" class="form-control" placeholder="Enter Address" />
    </div>
    <div class="form-group">
     <input type="text" name="suburb" class="form-control" placeholder="Enter Suburb" />
    </div>
    <div class="form-group">
     <input type="text" name="postcode" class="form-control" placeholder="Enter Postcode" />
    </div>
    <div class="form-group">
        <input type="text" name="if_charger_working" class="form-control" placeholder="Enter If Charger Working" />
    </div>
       <div class="form-group">
           <input type="text" name="usb_a" class="form-control" placeholder="Enter If Usb A" />
       </div>
       <div class="form-group">
           <input type="text" name="usb_c" class="form-control" placeholder="Enter If Usb C" />
       </div>
       <div class="form-group">
           <input type="text" name="micro_usb" class="form-control" placeholder="Enter If Micro Usb" />
       </div><div class="form-group">
           <input type="text" name="plug_only" class="form-control" placeholder="Enter If Plug Only" />
       </div>
       <div class="form-group">
           <input type="text" name="establishment_type" class="form-control" placeholder="Enter Establish Type" />
       </div>
       <div class="form-group">
           <input type="text" name="if_wifi" class="form-control" placeholder="Enter If Wifi" />
       </div>
       <div class="form-group">
           <input type="text" name="if_bathroom" class="form-control" placeholder="Enter If Bathroom" />
       </div>
       <div class="form-group">
           <input type="text" name="access_type" class="form-control" placeholder="Enter Access Type" />
       </div>
       <div class="form-group">
           <input type="text" name="other_amenities" class="form-control" placeholder="Enter Other Amenities" />
       </div>
       <div class="form-group">
           <input type="text" name="star_rating" class="form-control" placeholder="Enter Star Rating" />
       </div>
       <div class="form-group">
           <input type="time" name="mon_open" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="mon_close" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="tue_open" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="tue_close" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="wed_open" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="wed_close" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="thu_open" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="thu_close" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="fri_open" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="fri_close" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="sat_open" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="sat_close" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="sun_open" class="form-control" />
       </div>
       <div class="form-group">
           <input type="time" name="sun_close" class="form-control" />
       </div>
       <div class="form-group">
           <input type="text" name="if_24h" class="form-control" placeholder="Enter If 24H"/>
       </div>
    <div class="form-group">
     <input type="submit" class="btn btn-primary" />
    </div>
   </form>
  </div>
 </div>
 @endsection
