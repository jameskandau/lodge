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




<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Customer</th>
			<th>Till No</th>
			<th>Amount</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($payments as $payment)
		<tr>
		<td>{{$payment->id}}</td>
		<td>{{$payment->customer->firstname}}</td>
		<td>{{$payment->till_no}}</td>
		<td>{{$payment->amount}}</td>
		
		<td>
			<a href="{{url('payments/'.$payment->id .'/edit')}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> edit</a>
			{{ Form::open(['method' => 'DELETE','action' => ['PaymentController@destroy', $payment->id],'style'=>'display:inline']) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::button('<i class="fa fa-trash"></i> Delete', array('class' => 'btn btn-danger','type'=>'submit')) }}
			{{ Form::close() }}
			<a href="{{('/payments/'.$payment->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-print"></i>  print</a>
		</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop