<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Request;
use App\Station;

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/find', function () {
    return view('find');
});

Route::get('/about', function () {
    return view('about');
});

//Route::get('/writeReview', function () {
//    return view('writeReview');
//});

Route::get('/test', function () {
    return view('test');
});

Route::post('/search',function (){
   $q = Request::get('q');
   $sort = request()->get('sort');
   $check = Request::has('openAllDay');

    if($q != ""){
       if($sort == "rating"){
           if($check){
               $station = Station::where ([
               ['postcode','LIKE',$q],['if_24h','=','1']])
               ->orWhere([['suburb','LIKE',$q],['if_24h','=','1']])
               ->orderBy('star_rating','DESC')
               ->get();
               if(count($station) > 0)
                   return view('find') -> withDetails($station) -> withQuery($q);
           }else{
               $station = Station::where ('postcode','LIKE',$q)
                   ->orWhere('suburb','LIKE',$q)
                   ->orderBy('star_rating','DESC')
                   ->get();
               if(count($station) > 0)
                   return view('find') -> withDetails($station) -> withQuery($q);
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
                   ['postcode','LIKE',$q],['if_24h','=','1']])
                   ->orWhere([['suburb','LIKE',$q],['if_24h','=','1']])
                   // ->orderBy('star_rating','DESC')
                   ->get();

               if(count($station) > 0)
                   return view('find') -> withDetails($station) -> withQuery($q);
//            $station=Station::where('if_24h',request('if_24h'));
           }else{
               $station = Station::where ('postcode','LIKE',$q)
                   ->orWhere('suburb','LIKE',$q)
                   // ->orderBy('star_rating','DESC')
                   ->get();

               if(count($station) > 0)
                   return view('find') -> withDetails($station) -> withQuery($q);
//            $station=Station::where('if_24h',request('if_24h'));
           }
       }
   }
   return view('find')->withMessage("no data found!");
});

Route::get('detail/{id}','StationController@detail');

Route::get('writeReview/{id}','ReviewController@create');

Route::resource('station','StationController');

Route::get('/searchFor','StationController@searchFor')->name('searchFor');

Route::resource('review','ReviewController');

Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/successlogin', 'MainController@successlogin');
Route::get('main/logout', 'MainController@logout');
