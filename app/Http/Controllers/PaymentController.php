<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Booking;
use App\Customer;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $pay_id = $id;

        $customers = Customer::pluck('firstname','id');
        $bookings = Booking::where('id',$id)->get();
        return view('payments.create', compact('customers','pay_id','bookings'));
    }
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'till_no'=>'required',
            'customer'=>'required',
            'amount'=>'required']);

        $pay = new Payment();
        $id = Customer::where('firstname',$request->input('customer'))->pluck('id');
        $pay->customer_id = $id[0];
        $pay->till_no = $request->input('till_no');
        $pay->amount = $request->input('amount');
         $pay->booking_id = $request->input('id');
        $pay->save();
        return redirect()->to('/payments')->with('success','Payment Created Succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $payment = Payment::findOrFail($id);
       return view('pdfs.example',compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $payment = Payment::findOrFail($id);
         $customers = Customer::pluck('firstname','id');
       return view('payments.edit', compact('payment','customers'));
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
        $pay = new Payment();
        $id = Customer::where('firstname',$request->input('customer'))->pluck('id');
        $pay->customer_id = $id[0];
        $pay->till_no = $request->input('till_no');
        $pay->amount = $request->input('amount');
        $pay->update();
        return redirect()->to('/payments')->with('updated','Payment Upadate Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pay = Payment::findOrFail($id);
        $pay->delete();
        return back()->with('deleted','Payment Record Deleted Succesfully');
    }
}
