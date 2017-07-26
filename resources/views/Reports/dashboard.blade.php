@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-7">
		<h4 class="page-header">Daily Customers</h4>

				<table class=" table table-striped table-hover">
					<thead>
						<tr>
							<th>Day</th>
							<th>Customers</th>
							
						</tr>
					</thead>
					<tbody>
					@foreach($clients as $client)
				     <tr>
				     	<td>{{$client->day}}</td>
				     	<td>{{($client->total)}}</td>
				     </tr>
				     @endforeach
					</tbody>
				</table>
	</div>
	<div class="col-md-5">
		<h4 class="page-header">Daily Accounts</h4>
			<table class=" table table-striped table-hover">
					<thead>
						<tr>
							<th>Date</th>
							<th>Amount</th>
							
						</tr>
					</thead>
					<tbody>
					@foreach($accounts as $account)
				     <tr>
				     	<td>{{$account->day}}</td>
				     	<td>{{$account->amount}}</td>
				     </tr>
				     @endforeach
					</tbody>
				</table>
	</div>
</div>
<h4 class="page-header">Free Rooms</h4>
		<div class="row">
			<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Room Type</th>
			<th>Price</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($rooms as $room)
		<tr>
		<td>{{$room->id}}</td>
		<td>{{$room->types->name}}</td>
		<td>{{$room->types->price}}</td>
		<td>{{$room->description}}</td>
		<td><span class="label label-success">Free</span></td>
		</tr>
		@endforeach
	</tbody>
</table>
		</div>
@stop