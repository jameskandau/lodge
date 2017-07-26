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


<a class="btn btn-success pull-right" href="{{url('/room-types/create')}}">Add Room Type</a>

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Price</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($types as $type)
		<tr>
		<td>{{$type->id}}</td>
		<td>{{$type->name}}</td>
		<td>{{$type->price}}</td>
		<td>{{$type->description}}</td>
		
		<td>
			<a href="{{url('room-types/'.$type->id .'/edit')}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> edit</a>
			{{ Form::open(['method' => 'DELETE','action' => ['RoomTypeController@destroy', $type->id],'style'=>'display:inline']) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::button('<i class="fa fa-trash"></i> Delete', array('class' => 'btn btn-danger','type'=>'submit')) }}
			{{ Form::close() }}
		</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop