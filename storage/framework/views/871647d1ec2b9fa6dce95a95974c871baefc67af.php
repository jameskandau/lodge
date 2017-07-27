<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 offset-sm-2">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4>Create Customer</h4>
					</div>

					<?php echo e(Form::open(['action'=>'PaymentController@store','method'=>'POST'])); ?>

					<div class="panel-body">
						
						<div class="form-group <?php echo e($errors->has('name')?'has-danger':''); ?>">
							<?php echo e(Form::label('label','Till Number')); ?>

						    <?php echo e(Form::text('till_no',null,['class'=>'form-control'])); ?>

						     <small class="form-control-feedback"><?php echo e($errors->first('till_no')); ?></small>
						</div>
						<input type="hidden" name="id" value="<?php echo e($pay_id); ?>">
							<div class="form-group <?php echo e($errors->has('customer')?'has-danger':''); ?>">
							<?php echo e(Form::label('label','Customer')); ?>

							<?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<input type="text" class="form-control" value="<?php echo e($booking->customer->firstname); ?>" name="customer" readonly>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                      <small class="form-control-feedback"><?php echo e($errors->first('customer')); ?></small>
						</div>
						<input type="hidden" name="total" value="<?php echo e($totals); ?>">
					
						<div class="form-group <?php echo e($errors->has('name')?'has-danger':''); ?>">
							<?php echo e(Form::label('label','Amount')); ?>

						    <?php echo e(Form::number('amount',null,['class'=>'form-control'])); ?>

						     <small class="form-control-feedback"><?php echo e($errors->first('amount')); ?></small>
						</div>
					</div>
					<div class="panel-footer">
						<div class="form-group">
							<?php echo e(Form::button('<i class="fa fa-upload"></i> Add Payment',['class'=>'btn btn-success','type'=>'submit'])); ?>

						</div>
					</div>
					<?php echo e(Form::close()); ?>

		      </div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>