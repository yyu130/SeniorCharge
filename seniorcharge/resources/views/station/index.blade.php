@extends('cmsLayout')
@section('mycontent')

<body style="background-color: #f0efef">
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Station Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('station.create')}}" class="btn btn-primary">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Station Name</th>
    <th>Longitude</th>
    <th>latitude</th>
    <th>Address</th>
    <th>Suburb</th>
    <th>Postcode</th>
    <th>Charger Working</th>
       <th>Usb A</th>
       <th>Usb C</th>
       <th>Micro Usb</th>
       <th>Plug Only</th>
       <th>Establishment Type</th>
    <th>Wifi</th>
    <th>Bathroom</th>
       <th>Accessibility Type</th>
       <th>Other Amenities</th>
       <th>Star rating</th>
       <th>Monday Open</th>
       <th>Monday Close</th>
       <th>Tuesday Open</th>
       <th>Tuesday Close</th>
       <th>Wednesday Open</th>
       <th>Wednesday Close</th>
       <th>Thursday Open</th>
       <th>Thursday Close</th>
       <th>Friday Open</th>
       <th>Friday Close</th>
       <th>Saturday Open</th>
       <th>Saturday Close</th>
       <th>Sunday Open</th>
       <th>Sunday Close</th>
       <th>24 H</th>
       <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($stations as $row)
   <tr>
       <td>{{$row['station_name']}}</td>
       <td>{{$row['longitude']}}</td>
       <td>{{$row['latitude']}}</td>
       <td>{{$row['address']}}</td>
       <td>{{$row['suburb']}}</td>
       <td>{{$row['postcode']}}</td>
       <td>{{$row['if_charger_working']}}</td>
       <td>{{$row['usb_a']}}</td>
       <td>{{$row['usb_c']}}</td>
       <td>{{$row['micro_usb']}}</td>
       <td>{{$row['plug_only']}}</td>
       <td>{{$row['establishment_type']}}</td>
       <td>{{$row['if_wifi']}}</td>
       <td>{{$row['if_bathroom']}}</td>
       <td>{{$row['access_type']}}</td>
       <td>{{$row['other_amenities']}}</td>
       <td>{{$row['star_rating']}}</td>
       <td>{{$row['mon_open']}}</td>
       <td>{{$row['mon_close']}}</td>
       <td>{{$row['tue_open']}}</td>
       <td>{{$row['tue_close']}}</td>
       <td>{{$row['wed_open']}}</td>
       <td>{{$row['wed_close']}}</td>
       <td>{{$row['thu_open']}}</td>
       <td>{{$row['thu_close']}}</td>
       <td>{{$row['fri_open']}}</td>
       <td>{{$row['fri_close']}}</td>
       <td>{{$row['sat_open']}}</td>
       <td>{{$row['sat_close']}}</td>
       <td>{{$row['sun_open']}}</td>
       <td>{{$row['sun_close']}}</td>
       <td>{{$row['if_24h']}}</td>

       <td><a href="{{action('StationController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
       <td>
           <form method="post" class="delete_form" action="{{action('StationController@destroy', $row['id'])}}">
               {{csrf_field()}}
               <input type="hidden" name="_method" value="DELETE" />
               <button type="submit" class="btn btn-danger">Delete</button>
           </form>
       </td>
   </tr>
   @endforeach
  </table>
     {{ $stations->links() }}
 </div>
</div>
<script>
    $(document).ready(function(){
        $('.delete_form').on('submit', function(){
            if(confirm("Are you sure you want to delete it?"))
            {
                return true;
            }
            else
            {
                return false;
            }
        });
    });
</script>
</body>
@endsection
