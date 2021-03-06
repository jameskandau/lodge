<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }
     public function room()
    {
    	return $this->belongsTo('App\Room','room_id','id');
    }
     public function user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }
     public function payments()
    {
        return $this->hasMany('App\Payment');
    }

}
