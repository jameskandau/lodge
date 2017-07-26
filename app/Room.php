<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	protected $table = 'rooms';
     public function types()
    {
    	return $this->BelongsTo('App\RoomType','type_id','id');
    }
     public function bookings()
    {
    	return $this->hasMany('App\Booking');
    }
}
