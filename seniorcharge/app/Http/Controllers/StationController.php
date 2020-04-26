<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all()->toArray();
        return view('station.index',compact('stations'));
    }

    public function detail($id)
    {
        $station = Station::findOrFail($id);
        return view('detail',compact('station'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('station.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'station_name'  =>  'required',
            'longitude'  =>  'required',
            'latitude'  =>  'required',
            'address'  =>  'required',
            'suburb'  =>  'required',
            'postcode'  =>  'required',
            'if_charger_working' => 'required',
            'establishment_type' => 'required',
            'if_wifi' => 'required',
            'if_bathroom' => 'required',
            'access_type' => 'required',
            'mon_open' => 'required',
            'mon_close' => 'required',
            'tue_open' => 'required',
            'tue_close' => 'required',
            'wed_open' => 'required',
            'wed_close' => 'required',
            'thu_open' => 'required',
            'thu_close' => 'required',
            'fri_open' => 'required',
            'fri_close' => 'required',
            'sat_open' => 'required',
            'sat_close' => 'required',
            'sun_open' => 'required',
            'sun_close' => 'required',
            'if_24h' => 'required'
        ]);
        $station =new Station([
            'station_name'  =>  $request->get('station_name'),
            'longitude'  =>  $request->get('longitude'),
            'latitude'  =>  $request->get('latitude'),
            'address'  =>  $request->get('address'),
            'suburb'  =>  $request->get('suburb'),
            'postcode'  =>  $request->get('postcode'),
            'if_charger_working'  =>  $request->get('if_charger_working'),
            'charger_type'  =>  $request->get('charger_type'),
            'establishment_type'  =>  $request->get('establishment_type'),
            'if_wifi'  =>  $request->get('if_wifi'),
            'if_bathroom'  =>  $request->get('if_bathroom'),
            'access_type'  =>  $request->get('access_type'),
            'other_amenities'  =>  $request->get('other_amenities'),
            'star_rating'  =>  $request->get('star_rating'),
            'mon_open'  =>  $request->get('mon_open'),
            'mon_close'  =>  $request->get('mon_close'),
            'tue_open'  =>  $request->get('tue_open'),
            'tue_close'  =>  $request->get('tue_close'),
            'wed_open'  =>  $request->get('wed_open'),
            'wed_close'  =>  $request->get('wed_close'),
            'thu_open'  =>  $request->get('thu_open'),
            'thu_close'  =>  $request->get('thu_close'),
            'fri_open'  =>  $request->get('fri_open'),
            'fri_close'  =>  $request->get('fri_close'),
            'sat_open'  =>  $request->get('sat_open'),
            'sat_close'  =>  $request->get('sat_close'),
            'sun_open'  =>  $request->get('sun_open'),
            'sun_close'  =>  $request->get('sun_close'),
            'if_24h'  =>  $request->get('if_24h')
        ]);
        $station->save();
        return redirect()->route('station.create')->with('success','Data Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $station =Station::find($id);
        return view('station.edit', compact('station','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'station_name'  =>  'required',
            'longitude'  =>  'required',
            'latitude'  =>  'required',
            'address'  =>  'required',
            'suburb'  =>  'required',
            'postcode'  =>  'required',
            'if_charger_working' => 'required',
            'establishment_type' => 'required',
            'if_wifi' => 'required',
            'if_bathroom' => 'required',
            'access_type' => 'required',
            'mon_open' => 'required',
            'mon_close' => 'required',
            'tue_open' => 'required',
            'tue_close' => 'required',
            'wed_open' => 'required',
            'wed_close' => 'required',
            'thu_open' => 'required',
            'thu_close' => 'required',
            'fri_open' => 'required',
            'fri_close' => 'required',
            'sat_open' => 'required',
            'sat_close' => 'required',
            'sun_open' => 'required',
            'sun_close' => 'required',
            'if_24h' => 'required'
        ]);
        $station = Station::find($id);
        $station->station_name = $request->get('station_name');
        $station->longitude = $request->get('longitude');
        $station->latitude =$request->get('latitude');
        $station->address =$request->get('address');
        $station->suburb =$request->get('suburb');
        $station->postcode =$request->get('postcode');
        $station->if_charger_working = $request->get('if_charger_working');
        $station->charger_type = $request->get('charger_type');
        $station->establishment_type =$request->get('establishment_type');
        $station->if_wifi =$request->get('if_wifi');
        $station->if_bathroom = $request->get('if_bathroom');
        $station->access_type =$request->get('access_type');
        $station->other_amenities = $request->get('other_amenities');
        $station->star_rating = $request->get('star_rating');
        $station->mon_open =$request->get('mon_open');
        $station->mon_close =$request->get('mon_close');
        $station->tue_open =$request->get('tue_open');
        $station->tue_close =$request->get('tue_close');
        $station->wed_open =$request->get('wed_open');
        $station->wed_close =$request->get('wed_close');
        $station->thu_open =$request->get('thu_open');
        $station->thu_close =$request->get('thu_close');
        $station->fri_open =$request->get('fri_open');
        $station->fri_close =$request->get('fri_close');
        $station->sat_open =$request->get('sat_open');
        $station->sat_close =$request->get('sat_close');
        $station->sun_open =$request->get('sun_open');
        $station->sun_close = $request->get('sun_close');
        $station->if_24h =$request->get('if_24h');
        $station->save();
        return redirect()->route('station.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $station = Station::find($id);
        $station->delete();
        return redirect()->route('station.index')->with('success',
        'Data Deleted');
    }

    public function searchFor(Request $request){
        $q = $request->get('q');
        $sort = $request->get('sort');
        $check = $request->has('openAllDay');

        if($q != ""){
            if($sort == "rating"){
                if($check){
                    $station = Station::where ([
                        ['postcode','LIKE',$q],['if_24h','=','1']])
                        ->orWhere([['suburb','LIKE','%'.$q.'%'],['if_24h','=','1']])
                        ->orderBy('star_rating','DESC')
                        ->get();
                    if(count($station) > 0)
                        return view('test') -> withDetails($station) -> withQuery($q);
                }else{
                    $station = Station::where ('postcode','LIKE',$q)
                        ->orWhere('suburb','LIKE','%'.$q.'%')
                        ->orderBy('star_rating','DESC')
                        ->get();
                    if(count($station) > 0)
                        return view('test') -> withDetails($station) -> withQuery($q);
                }
//            $station=Station::where('if_24h',request('if_24h'));
            }elseif($sort == "name"){
                if($check){
                    $station = Station::where ([
                        ['postcode','LIKE',$q],['if_24h','=','1']])
                        ->orWhere([['suburb','LIKE','%'.$q.'%'],['if_24h','=','1']])
                        ->orderBy('station_name','ASC')
                        ->get();
                    if(count($station) > 0)
                        return view('test') -> withDetails($station) -> withQuery($q);
                }else{
                    $station = Station::where ('postcode','LIKE',$q)
                        ->orWhere('suburb','LIKE','%'.$q.'%')
                        ->orderBy('station_name','ASC')
                        ->get();
                    if(count($station) > 0)
                        return view('test') -> withDetails($station) -> withQuery($q);
                }
//            $station=Station::where('if_24h',request('if_24h'));
            }
//       elseif($sort == "allDay"){
//           $station = Station::where ([
//               ['postcode','LIKE',$q],['if_24h','=','1']])
//               ->orWhere('suburb','LIKE',$q)
//               ->get();
//
//           if(count($station) > 0)
//               return view('find') -> withDetails($station) -> withQuery($q);
////            $station=Station::where('if_24h',request('if_24h'));
//       }
            else{
                if ($check){
                    $station = Station::where ([
                        ['postcode','LIKE','%'.$q.'%'],['if_24h','=','1']])
                        ->orWhere([['suburb','LIKE',$q],['if_24h','=','1']])
                        ->orderBy('station_name','ASC')
                        ->get();

                    if(count($station) > 0)
                        return view('test') -> withDetails($station) -> withQuery($q);
//            $station=Station::where('if_24h',request('if_24h'));
                }else{
                    $station = Station::where ('postcode','LIKE',$q)
                        ->orWhere('suburb','LIKE','%'.$q.'%')
                        ->orderBy('station_name','ASC')
                        ->get();

                    if(count($station) > 0)
                        return view('test') -> withDetails($station) -> withQuery($q);
//            $station=Station::where('if_24h',request('if_24h'));
                }
            }
        }
        return view('test')->withMessage("no data found!");
    }

//    public function searchStations(Request $request){
//        $lat=$request->latitude;
//        $lng=$request->longitude;
//
//        $stations=Station::whereBetween('lat',[$lat-90,$lat+90])->whereBetween('lng',[$lng-90,$lng+90])->get();
//        return $stations;
//    }
}
