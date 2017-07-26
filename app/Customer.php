<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function bookings()
    {
    	return $this->hasMany('App\Booking');
    }
    public function payments()
    {
    	return $this->hasMany('App\Payment');
    }
}
