@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 offset-sm-2">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4>Create New Booking</h4>
					</div>
					{{Form::open(['action'=>'BookingController@store','method'=>'POST'])}}
					<div class="panel-body">
						
						<div class="form-group {{$errors->has('firstname')?'has-danger':''}}">
							{{Form::label('label','Customer Name')}}
							<input list="customer" name="cus" class="form-control">
							<datalist id="customer">
							@foreach($customers as $customer)
							<option name ="1" value="{{$customer->firstname}}">
							@endforeach
							</datalist>
	                      <small class="form-control-feedback">{{$errors->first('firstname')}}</small>
						</div>
						<div class="form-group {{$errors->has('firstname')?'has-danger':''}}">
							{{Form::label('label','Room Name')}}
							<input list="room" name="roomnumber" class="form-control">
							<datalist id="room">
							@foreach($rooms as $room)
							<option name ="1" value="{{$room->room_number}}">
							@endforeach
							</datalist>
	                      <small class="form-control-feedback">{{$errors->first('room')}}</small>
						</div>
						<div class="form-group {{$errors->has('lastname')?'has-danger':''}}">
							{{Form::label('label','Check In')}}
						    {{Form::date('checkin',null,['class'=>'form-control'])}}
						    <small class="form-control-feedback">{{$errors->first('checkin')}}</small>
						</div>
						<div class="form-group {{$errors->has('phone')?'has-danger':''}}">
							{{Form::label('label','Check Out')}}
						    {{Form::date('checkout',null,['class'=>'form-control'])}}
						    <small class="form-control-feedback">{{$errors->first('checkout')}}</small>
						</div>
						

					</div>
					<div class="panel-footer">
						<div class="form-group">
							{{Form::button('<i class="fa fa-upload"></i> Add Booking',['class'=>'btn btn-success','type'=>'submit'])}}
						</div>
					</div>
					{{Form::close()}}
		      </div>
			</div>
		</div>
	</div>
@stop