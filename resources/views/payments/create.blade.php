@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 offset-sm-2">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4>Create Customer</h4>
					</div>

					{{Form::open(['action'=>'PaymentController@store','method'=>'POST'])}}
					<div class="panel-body">
						
						<div class="form-group {{$errors->has('name')?'has-danger':''}}">
							{{Form::label('label','Till Number')}}
						    {{Form::text('till_no',null,['class'=>'form-control'])}}
						     <small class="form-control-feedback">{{$errors->first('till_no')}}</small>
						</div>
						<input type="hidden" name="id" value="{{$pay_id}}">
							<div class="form-group {{$errors->has('customer')?'has-danger':''}}">
							{{Form::label('label','Customer')}}
							@foreach($bookings as $booking)
							<input type="text" class="form-control" value="{{$booking->customer->firstname}}" name="customer" readonly>
							@endforeach()
	                      <small class="form-control-feedback">{{$errors->first('customer')}}</small>
						</div>
						<input type="hidden" name="total" value="{{$totals}}">
					
						<div class="form-group {{$errors->has('name')?'has-danger':''}}">
							{{Form::label('label','Amount')}}
						    {{Form::number('amount',null,['class'=>'form-control'])}}
						     <small class="form-control-feedback">{{$errors->first('amount')}}</small>
						</div>
					</div>
					<div class="panel-footer">
						<div class="form-group">
							{{Form::button('<i class="fa fa-upload"></i> Add Payment',['class'=>'btn btn-success','type'=>'submit'])}}
						</div>
					</div>
					{{Form::close()}}
		      </div>
			</div>
		</div>
	</div>
@stop