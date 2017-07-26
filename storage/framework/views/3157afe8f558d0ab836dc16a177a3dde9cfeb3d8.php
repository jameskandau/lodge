<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 offset-sm-2">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4>Create Customer</h4>
					</div>
					<?php echo e(Form::open(['action'=>'RoomController@store','method'=>'POST'])); ?>

					<div class="panel-body">
						
						<div class="form-group <?php echo e($errors->has('name')?'has-danger':''); ?>">
							<?php echo e(Form::label('label','Room Number')); ?>

						    <?php echo e(Form::text('name',null,['class'=>'form-control'])); ?>

						     <small class="form-control-feedback"><?php echo e($errors->first('name')); ?></small>
						</div>
						<div class="form-group <?php echo e($errors->has('type')?'has-danger':''); ?>">
							<?php echo e(Form::label('label','Room Type')); ?>

						    <?php echo e(Form::select('type',$types,null,['class'=>'form-control'])); ?>

						    <small class="form-control-feedback"><?php echo e($errors->first('price')); ?></small>
						</div>
						<div class="form-group <?php echo e($errors->has('description')?'has-danger':''); ?>">
							<?php echo e(Form::label('label','Description')); ?>

						    <?php echo e(Form::textarea('description',null,['class'=>'form-control','rows'=>'5','cols'=>'5'])); ?>

						    <small class="form-control-feedback"><?php echo e($errors->first('description')); ?></small>
						</div>
					</div>
					<div class="panel-footer">
						<div class="form-group">
							<?php echo e(Form::button('<i class="fa fa-upload"></i> Add Room',['class'=>'btn btn-success','type'=>'submit'])); ?>

						</div>
					</div>
					<?php echo e(Form::close()); ?>

		      </div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>