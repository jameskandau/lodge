<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Booking;
use App\Room;
use DB;
use App\Payment;
use Carbon\Carbon;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $clients = Customer::select([
                DB::raw('count(id) as "total"'),
                DB::raw('DATE(created_at) as day')])->groupBy('day')
            ->where('created_at','>=',Carbon::now()->subWeeks(1))
            ->get();

            $accounts = Payment::select([
                DB::raw('SUM(amount) as "amount"'),
                DB::raw('DATE(created_at) as day')])->groupBy('day')
                ->where('created_at','>=',CArbon::now()->subWeeks(1))
                ->get();
            
          
     
           
        
        $rooms = Room::where('free','yes')->get();
       return view('reports.dashboard',compact('accounts','clients','rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
