<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Booking;
use Carbon\Carbon;
use App\Room;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $bookings = Booking::all();
        foreach ($bookings as $booking) {
           $checkin = Carbon::now();
           $checkout = Carbon::parse($booking->check_out);
           $days = $checkout->diffInDays($checkin);
            $rooms = Room::where('id', $booking->room->id)->get();
           if($days == 0){
             foreach ($rooms as $r) {
               $r->free = "yes";
               $r->update();
            }
            }else{
           
        }
           
           
          }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
