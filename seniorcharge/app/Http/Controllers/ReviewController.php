<?php

namespace App\Http\Controllers;

use App\reviews;
use App\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
//        dd($id);
        $station = Station::findOrFail($id);
        return view('writeReview',compact('station'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $working = $request->has('working');
        $noWorking = $request->has('noWorking');
//        dd($request->get('station_id'));
        $this->validate($request,[
            'station_id'  =>  'required',
//            'is_working'  =>  'required',
            'rating'  =>  'required',
//            'is_welcoming'  =>  'required',
//            'comments'  =>  'required'
        ]);
        $review =new reviews([
            'station_id'  =>  $request->get('station_id'),
            'is_working'  =>  $request->get('is_working'),
            'rating'  =>  $request->get('rating'),
            'is_welcoming'  =>  $request->get('is_welcoming'),
            'comments'  =>  $request->get('comments')
        ]);
        $review->save();

        $id = $request->get('station_id');
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

        Station::where('id', $id)->update(['star_rating' => $rating]);
        return redirect()->action('StationController@detail', ['id' => $id])
          ->with('success','Thank you! Your feedback was submitted successfully.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
