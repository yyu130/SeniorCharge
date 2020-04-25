<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable =['station_name','longitude','latitude','address','suburb','postcode','if_charger_working','charger_type',
        'establishment_type','if_wifi','if_bathroom','access_type','other_amenities','star_rating','mon_open','mon_close','tue_open','tue_close','wed_open','wed_close',
        'thu_open','thu_close','fri_open','fri_close','sat_open','sat_close','sun_open','sun_close','if_24h'];
}
