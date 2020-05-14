<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchStationRequest;
use App\reviews;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Station;
use Illuminate\Support\Facades\DB;


class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::paginate(7);
        return view('station.index',compact('stations'));
    }

    public function detail($id)
    {
        $station = Station::findOrFail($id);
        $reviews = reviews::where('station_id', $id)->get();
        $rating = 0;
        foreach($reviews as $review){
            $rating = $review->rating + $rating;
        }

        if (sizeof($reviews) == 0){
            $rating = 0;
        } else{
            $rating = $rating/sizeof($reviews);
        }

        $working = 0;
        $notWorking = 0;
        $strong = 0;
        $agree = 0;
        $neutral = 0;
        $disagree = 0;
        $sdisagree = 0;
        foreach ($reviews as $review){
            if($review->is_working == 1){
                $working = $working +1;
            }else{
                $notWorking = $notWorking+1;
            }

            if ($review->is_welcoming == "Strongly Agree"){
                $strong = $strong + 1;
            }
            elseif ($review->is_welcoming == "Agree"){
                $agree = $agree + 1;
            }
            elseif ($review->is_welcoming == "Neutral"){
                $neutral = $neutral + 1;
            }
            elseif ($review->is_welcoming == "Disagree"){
                $disagree = $disagree + 1;
            }
            else {
                $sdisagree = $sdisagree + 1;
            }
    }
        if ($strong+$agree+$neutral+$disagree+$sdisagree == 0)
        {
            $p1 = 0;
            $p2 = 0;
            $p3 = 0;
            $p4 = 0;
            $p5 = 0;
        }
        else{
            $p1 = $strong/($strong+$agree+$neutral+$disagree+$sdisagree)*100;
            $p2 = $agree/($strong+$agree+$neutral+$disagree+$sdisagree)*100;
            $p3 = $neutral/($strong+$agree+$neutral+$disagree+$sdisagree)*100;
            $p4 = $disagree/($strong+$agree+$neutral+$disagree+$sdisagree)*100;
            $p5 = $sdisagree/($strong+$agree+$neutral+$disagree+$sdisagree)*100;
        }

        $rat1 = 0;
        $rat2 = 0;
        $rat3 = 0;
        $rat4 = 0;
        $rat5 = 0;
        foreach ($reviews as $review){
            if($review->rating == 1){
                $rat1 = $rat1 + 1;
            }
            elseif ($review->rating == 2){
                $rat2 = $rat2 + 1;
            }
            elseif ($review->rating == 3){
                $rat3 = $rat3 + 1;
            }
            elseif ($review->rating == 4){
                $rat4 = $rat4+1;
            }
            else{
                $rat5 = $rat5+1;
            }
        }

        return view('detail',['station'=>$station, 'reviews' => $reviews , 'rating' => $rating,
            'working' => $working, 'notWorking' => $notWorking, 'strong' => $strong, 'rat1' => $rat1, 'rat2' => $rat2
            , 'rat3' => $rat3, 'rat4' => $rat4, 'rat5' => $rat5, 'agree' => $agree, 'neutral' => $neutral, 'disagree' => $disagree, 'sdisagree' => $sdisagree,
            'p1'=>$p1,'p2'=>$p2, 'p3'=>$p3,'p4'=>$p4,'p5'=>$p5]);
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
            'usb_a' => 'required',
            'usb_c' => 'required',
            'micro_usb' => 'required',
            'plug_only' => 'required',
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
            'usb_a'  =>  $request->get('usb_a'),
            'usb_c'  =>  $request->get('usb_c'),
            'micro_usb'  =>  $request->get('micro_usb'),
            'plug_only'  =>  $request->get('plug_only'),
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
        return redirect()->route('station.index')->with('success','Station Added');

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
            'usb_a' => 'required',
            'usb_c' => 'required',
            'micro_usb' => 'required',
            'plug_only' => 'required',
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
        $station->usb_a = $request->get('usb_a');
        $station->usb_c = $request->get('usb_c');
        $station->micro_usb = $request->get('micro_usb');
        $station->plug_only = $request->get('plug_only');
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
        return redirect()->route('station.index')->with('success', 'Station Updated');
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
        'Station Deleted');
    }

    public function searchFor(Request $request){

        request()->validate([
           'query' => 'required|max:20|regex:/(^[\pL0-9 ]+)$/u',
        ]);
        $q = $request->get('query');
        $sort = $request->get('sort');
        $check = $request->has('openAllDay');
        $curCheck = $request->has('current');
        $current = \Carbon\Carbon::now()->format('H:i:s');

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
                }elseif($curCheck){
                    $station = Station::where ([['postcode','LIKE',$q],['mon_open','<',$current],['mon_close','>',$current]])
                        ->orWhere([['suburb','LIKE','%'.$q.'%'],['mon_open','<',$current],['mon_close','>',$current]])
                        ->orderBy('star_rating','DESC')
                        ->get();
                    if(count($station) > 0)
                        return view('test') -> withDetails($station) -> withQuery($q);
                }elseif($curCheck && $check){
                    $station = Station::where ([['postcode','LIKE',$q],['mon_open','<',$current],['mon_close','>',$current],['if_24h','=','1']])
                        ->orWhere([['suburb','LIKE','%'.$q.'%'],['mon_open','<',$current],['mon_close','>',$current],['if_24h','=','1']])
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
                }elseif($curCheck){
                    $station = Station::where ([['postcode','LIKE',$q],['mon_open','<',$current],['mon_close','>',$current]])
                        ->orWhere([['suburb','LIKE','%'.$q.'%'],['mon_open','<',$current],['mon_close','>',$current]])
                        ->orderBy('station_name','ASC')
                        ->get();
                    if(count($station) > 0)
                        return view('test') -> withDetails($station) -> withQuery($q);
                }elseif($curCheck && $check){
                    $station = Station::where ([['postcode','LIKE',$q],['mon_open','<',$current],['mon_close','>',$current],['if_24h','=','1']])
                        ->orWhere([['suburb','LIKE','%'.$q.'%'],['mon_open','<',$current],['mon_close','>',$current],['if_24h','=','1']])
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
            }
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
                }elseif($curCheck){
                    $station = Station::where ([['postcode','LIKE',$q],['mon_open','<',$current],['mon_close','>',$current]])
                        ->orWhere([['suburb','LIKE','%'.$q.'%'],['mon_open','<',$current],['mon_close','>',$current]])
                        ->orderBy('station_name','ASC')
                        ->get();
                    if(count($station) > 0)
                        return view('test') -> withDetails($station) -> withQuery($q);
                }elseif($curCheck && $check){
                    $station = Station::where ([['postcode','LIKE',$q],['mon_open','<',$current],['mon_close','>',$current],['if_24h','=','1']])
                        ->orWhere([['suburb','LIKE','%'.$q.'%'],['mon_open','<',$current],['mon_close','>',$current],['if_24h','=','1']])
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
            }
        }
        return view('test')->withMessage("No data found in this area! Please try other postcode or suburb!");
    }

//    public function searchStations(Request $request){
//        $lat=$request->latitude;
//        $lng=$request->longitude;
//
//        $stations=Station::whereBetween('lat',[$lat-90,$lat+90])->whereBetween('lng',[$lng-90,$lng+90])->get();
//        return $stations;
//    }
}
