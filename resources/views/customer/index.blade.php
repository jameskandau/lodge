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


<a class="btn btn-success pull-right" href="{{url('/customers/create')}}">Add Customer</a>

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($customers as $customer)
		<tr>
			<td>{{$customer->firstname}}</td>
		<td>{{$customer->lastname}}</td>
		<td>{{$customer->phone}}</td>
		<td>{{$customer->address}}</td>
		<td>
			<a href="{{url('customers/'.$customer->id .'/edit')}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> edit</a>
			{{ Form::open(['method' => 'DELETE','action' => ['CustomerController@destroy', $customer->id],'style'=>'display:inline']) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::button('<i class="fa fa-trash"></i> Delete', array('class' => 'btn btn-danger','type'=>'submit')) }}
			{{ Form::close() }}
		</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop