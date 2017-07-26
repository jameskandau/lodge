<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Customer;
use App\Room;
use Auth;
use Carbon\Carbon;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('id','DESC')->get();
        
        return view('bookings.index', compact('bookings'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $rooms = Room::where('free','yes')->orWhere('free','')->get();
        return view('bookings.create',compact('rooms','customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $room_id = Room::where('room_number',$request->input('roomnumber'))->pluck('id');
        $dy = $room_id[0];
     
        $check = Booking::where('room_id',$dy)->first();
        $start = Carbon::parse($request->input('checkin'));
        if($check == null){
            if(Carbon::parse($request->input('checkin')) < Carbon::now() || Carbon::parse($request->input('checkout')) < Carbon::now() ){
                return redirect()->to('/bookings')->with('bad','!!!! Dates are Past');
            }else{
        $booking = new Booking();
       $customer_id = Customer::where('firstname',$request->input('cus'))->pluck('id');
       $booking->user_id = Auth::user()->id;
       $booking->customer_id = $customer_id[0];
       $booking->room_id = $room_id[0];
       $booking->check_out = $request->input('checkout');
       $booking->check_in = $request->input('checkin');
       $end = Carbon::parse($request->input('checkout'));
       $start = Carbon::parse($request->input('checkin'));
       $days = $end->diffInDays($start);
       $booking->days = $days;
        $booking->save();
       return redirect()->to('/bookings')->with('success','Booking Added Succesfully');
            }
        }
        $next = Carbon::parse($check->check_out);
        $pass = $next->diffInDays($start);
       if($pass == 0 || $pass < 0){
         if(Carbon::parse($request->input('checkin')) < Carbon::now() || Carbon::parse($request->input('checkout')) < Carbon::now() ){
                return redirect()->to('/bookings')->with('bad','!!!! Checkin Dates Are Past');
            }else{
                       $booking = new Booking();
       $customer_id = Customer::where('firstname',$request->input('cus'))->pluck('id');
    
       $booking->user_id = Auth::user()->id;
       $booking->customer_id = $customer_id[0];
       $booking->room_id = $room_id[0];
       $booking->check_out = $request->input('checkout');
       $booking->check_in = $request->input('checkin');
       $end = Carbon::parse($request->input('checkout'));
       $start = Carbon::parse($request->input('checkin'));
       $days = $end->diffInDays($start);
       $booking->days = $days;
            }
       
       
       
       
   }else{

   return redirect()->to('/bookings')->with('bad','!!!! Room is Occupied');
   }

     
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
       $b= Booking::findOrFail($id)->delete();
       return redirect()->to('/bookings')->with('deleted','Booking Deleted Succesfully');

    }
}
