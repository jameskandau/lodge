<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }
     public function booking()
    {
    	return $this->belongsTo('App\Booking','booking_id','id');
    }
}
