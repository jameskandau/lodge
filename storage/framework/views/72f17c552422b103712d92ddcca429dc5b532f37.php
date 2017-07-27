<?php $__env->startSection('content'); ?>

<?php if(Session::has('success')): ?>
<div class="alert alert-success" role="alert">
<a href="" class="close" data-dismiss='alert'>&times;</a>
<?php echo e(Session::get('success')); ?>

</div>	
<?php endif; ?>
<?php if(Session::has('deleted')): ?>
<div class="alert alert-success" role="alert">
<a href="" class="close" data-dismiss='alert'>&times;</a>
<?php echo e(Session::get('deleted')); ?>

</div>	
<?php endif; ?>
<?php if(Session::has('updated')): ?>
<div class="alert alert-success" role="alert">
<a href="" class="close" data-dismiss='alert'>&times;</a>
<?php echo e(Session::get('updated')); ?>

</div>	
<?php endif; ?>
<?php if(Session::has('bad')): ?>
<div class="alert alert-danger" role="alert">
<a href="" class="close" data-dismiss='alert'>&times;</a>
<?php echo e(Session::get('bad')); ?>

</div>	
<?php endif; ?>

<a class="btn btn-success pull-right" href="<?php echo e(url('/bookings/create')); ?>">Add Booking</a>

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Customer Name</th>
			<th>Room</th>
			<th>Amount</th>
			<th>Check In</th>
			<th>Check Out</th>
			<th>Days</th>
			<th>User</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
		    <td><?php echo e($booking->id); ?></td>
			<td><?php echo e($booking->customer->firstname); ?> <?php echo e($booking->customer->lastname); ?></td>
			<td><?php echo e($booking->room->room_number); ?></td>
			<td><?php echo e($booking->room->types->price); ?></td>
			<td><?php echo e($booking->check_in); ?></td>
			<td><?php echo e($booking->check_out); ?></td>
			<td><?php echo e($booking->days); ?></td>
			<td><?php echo e($booking->user->name); ?></td>
			<td>
			<?php if(count($booking->payments) > 0): ?>
			<button class="btn btn-success">Paid</button>
			<?php else: ?>
			<a href="<?php echo e(url('payments/pay/'.$booking->id)); ?>" class="btn btn-xs btn-info">Pay</a>
			<?php endif; ?>
			<?php echo e(Form::open(['method' => 'DELETE','action' => ['BookingController@destroy', $booking->id],'style'=>'display:inline'])); ?>

			<?php echo e(Form::button('<i class="fa fa-trash"></i> Delete', array('class' => 'btn btn-danger','type'=>'submit'))); ?>

			<?php echo e(Form::close()); ?>

			</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>