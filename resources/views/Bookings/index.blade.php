@extends('layouts.master')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
<a href="" class="close" data-dismiss='alert'>&times;</a>
{{Session::get('success')}}
</div>	
@endif
@if(Session::has('deleted'))
<div class="alert alert-success" role="alert">
<a href="" class="close" data-dismiss='alert'>&times;</a>
{{Session::get('deleted')}}
</div>	
@endif
@if(Session::has('updated'))
<div class="alert alert-success" role="alert">
<a href="" class="close" data-dismiss='alert'>&times;</a>
{{Session::get('updated')}}
</div>	
@endif
@if(Session::has('bad'))
<div class="alert alert-danger" role="alert">
<a href="" class="close" data-dismiss='alert'>&times;</a>
{{Session::get('bad')}}
</div>	
@endif

<a class="btn btn-success pull-right" href="{{url('/bookings/create')}}">Add Booking</a>

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Customer Name</th>
			<th>Room</th>
			<th>Amount</th>
			<th>Check In</th>
			<th>Check Out</th>
			<th>Days</th>
			<th>User</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($bookings as $booking)
		<tr>
		    <td>{{$booking->id}}</td>
			<td>{{$booking->customer->firstname}} {{$booking->customer->lastname}}</td>
			<td>{{$booking->room->room_number}}</td>
			<td>{{$booking->room->types->price}}</td>
			<td>{{$booking->check_in}}</td>
			<td>{{$booking->check_out}}</td>
			<td>{{$booking->days}}</td>
			<td>{{$booking->user->name}}</td>
			<td>
			@if(count($booking->payments) > 0)
			<button class="btn btn-success">Paid</button>
			@else
			<a href="{{url('payments/pay/'.$booking->id)}}" class="btn btn-xs btn-info">Pay</a>
			@endif
			{{ Form::open(['method' => 'DELETE','action' => ['BookingController@destroy', $booking->id],'style'=>'display:inline']) }}
			{{ Form::button('<i class="fa fa-trash"></i> Delete', array('class' => 'btn btn-danger','type'=>'submit')) }}
			{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop