@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 offset-sm-2">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4>Create Customer</h4>
					</div>
					{{Form::open(['action'=>'CustomerController@store','method'=>'POST'])}}
					<div class="panel-body">
						
						<div class="form-group {{$errors->has('firstname')?'has-danger':''}}">
							{{Form::label('label','Firstname')}}
						    {{Form::text('firstname',null,['class'=>'form-control'])}}
						     <small class="form-control-feedback">{{$errors->first('firstname')}}</small>
						</div>
						<div class="form-group {{$errors->has('lastname')?'has-danger':''}}">
							{{Form::label('label','Lastname')}}
						    {{Form::text('lastname',null,['class'=>'form-control'])}}
						    <small class="form-control-feedback">{{$errors->first('lastname')}}</small>
						</div>
						<div class="form-group {{$errors->has('phone')?'has-danger':''}}">
							{{Form::label('label','Phone')}}
						    {{Form::number('phone',null,['class'=>'form-control'])}}
						    <small class="form-control-feedback">{{$errors->first('phone')}}</small>
						</div>
						<div class="form-group {{$errors->has('address')?'has-danger':''}}">
							{{Form::label('label','Address')}}
						    {{Form::text('address',null,['class'=>'form-control'])}}
						    <small class="form-control-feedback">{{$errors->first('address')}}</small>
						</div>

					</div>
					<div class="panel-footer">
						<div class="form-group">
							{{Form::button('<i class="fa fa-upload"></i> Add Customer',['class'=>'btn btn-success','type'=>'submit'])}}
						</div>
					</div>
					{{Form::close()}}
		      </div>
			</div>
		</div>
	</div>
@stop