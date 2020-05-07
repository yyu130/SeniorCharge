<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    protected $fillable =['station_id','is_working','rating','is_welcoming','comments'];
}
