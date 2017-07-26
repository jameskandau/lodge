<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 offset-sm-2">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4>Create New Booking</h4>
					</div>
					<?php echo e(Form::open(['action'=>'BookingController@store','method'=>'POST'])); ?>

					<div class="panel-body">
						
						<div class="form-group <?php echo e($errors->has('firstname')?'has-danger':''); ?>">
							<?php echo e(Form::label('label','Customer Name')); ?>

							<input list="customer" name="cus" class="form-control">
							<datalist id="customer">
							<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option name ="1" value="<?php echo e($customer->firstname); ?>">
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</datalist>
	                      <small class="form-control-feedback"><?php echo e($errors->first('firstname')); ?></small>
						</div>
						<div class="form-group <?php echo e($errors->has('firstname')?'has-danger':''); ?>">
							<?php echo e(Form::label('label','Room Name')); ?>

							<input list="room" name="roomnumber" class="form-control">
							<datalist id="room">
							<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option name ="1" value="<?php echo e($room->room_number); ?>">
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</datalist>
	                      <small class="form-control-feedback"><?php echo e($errors->first('room')); ?></small>
						</div>
						<div class="form-group <?php echo e($errors->has('lastname')?'has-danger':''); ?>">
							<?php echo e(Form::label('label','Check In')); ?>

						    <?php echo e(Form::date('checkin',null,['class'=>'form-control'])); ?>

						    <small class="form-control-feedback"><?php echo e($errors->first('checkin')); ?></small>
						</div>
						<div class="form-group <?php echo e($errors->has('phone')?'has-danger':''); ?>">
							<?php echo e(Form::label('label','Check Out')); ?>

						    <?php echo e(Form::date('checkout',null,['class'=>'form-control'])); ?>

						    <small class="form-control-feedback"><?php echo e($errors->first('checkout')); ?></small>
						</div>
						

					</div>
					<div class="panel-footer">
						<div class="form-group">
							<?php echo e(Form::button('<i class="fa fa-upload"></i> Add Booking',['class'=>'btn btn-success','type'=>'submit'])); ?>

						</div>
					</div>
					<?php echo e(Form::close()); ?>

		      </div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>