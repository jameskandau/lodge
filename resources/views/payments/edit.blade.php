@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 offset-sm-2">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4>Create Room Type</h4>
					</div>
					
					{{Form::model($payment,['method' =>'PATCH', 'route'=>['payments.update',$payment->id]])}}
					<div class="panel-body">
						<div class="form-group {{$errors->has('name')?'has-danger':''}}">
							{{Form::label('label','Till Number')}}
						    {{Form::text('till_no',null,['class'=>'form-control'])}}
						     <small class="form-control-feedback">{{$errors->first('till_no')}}</small>
						</div>
							<div class="form-group {{$errors->has('customer')?'has-danger':''}}">
							{{Form::label('label','Customer')}}
							<input list="customer" name="customer" class="form-control">
							<datalist id="customer">
							@foreach($customers as $customer)
							<option  value="{{$customer}}">
							@endforeach
							</datalist>
	                      <small class="form-control-feedback">{{$errors->first('customer')}}</small>
						</div>
						<div class="form-group {{$errors->has('name')?'has-danger':''}}">
							{{Form::label('label','Amount')}}
						    {{Form::number('amount',null,['class'=>'form-control'])}}
						     <small class="form-control-feedback">{{$errors->first('amount')}}</small>
						</div>

					</div>
					<div class="panel-footer">
						<div class="form-group">
							{{Form::button('<i class="fa fa-check"></i> Update Payment',['class'=>'btn btn-success','type'=>'submit'])}}
						</div>
					</div>
					{{Form::close()}}
		      </div>
			</div>
		</div>
	</div>
@stop