@extends('layouts.master')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 offset-sm-2">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4>Create Room Type</h4>
					</div>
					
					{{Form::model($room,['method' =>'PATCH', 'route'=>['rooms.update',$room->id]])}}
					<div class="panel-body">
						<div class="form-group {{$errors->has('name')?'has-danger':''}}">
							{{Form::label('label','Room Number')}}
						    {{Form::text('room_number',null,['class'=>'form-control'])}}
						     <small class="form-control-feedback">{{$errors->first('name')}}</small>
						</div>
						<div class="form-group {{$errors->has('type')?'has-danger':''}}">
							{{Form::label('label','Room Type')}}
						    {{Form::select('type',$types,null,['class'=>'form-control'])}}
						    <small class="form-control-feedback">{{$errors->first('price')}}</small>
						</div>
						<div class="form-group {{$errors->has('description')?'has-danger':''}}">
							{{Form::label('label','Description')}}
						    {{Form::textarea('description',null,['class'=>'form-control','rows'=>'5','cols'=>'5'])}}
						    <small class="form-control-feedback">{{$errors->first('description')}}</small>
						</div>

					</div>
					<div class="panel-footer">
						<div class="form-group">
							{{Form::button('<i class="fa fa-check"></i> Update Room',['class'=>'btn btn-success','type'=>'submit'])}}
						</div>
					</div>
					{{Form::close()}}
		      </div>
			</div>
		</div>
	</div>
@stop