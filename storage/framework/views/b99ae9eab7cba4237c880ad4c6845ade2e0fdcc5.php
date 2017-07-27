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
		<?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
		<td><?php echo e($payment->id); ?></td>
		<td><?php echo e($payment->customer->firstname); ?></td>
		<td><?php echo e($payment->till_no); ?></td>
		<td><?php echo e($payment->amount); ?></td>
		
		<td>
			<a href="<?php echo e(url('payments/'.$payment->id .'/edit')); ?>" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> edit</a>
			<?php echo e(Form::open(['method' => 'DELETE','action' => ['PaymentController@destroy', $payment->id],'style'=>'display:inline'])); ?>

			<?php echo e(Form::hidden('_method', 'DELETE')); ?>

			<?php echo e(Form::button('<i class="fa fa-trash"></i> Delete', array('class' => 'btn btn-danger','type'=>'submit'))); ?>

			<?php echo e(Form::close()); ?>

			<a href="<?php echo e(('/payments/'.$payment->id)); ?>" class="btn btn-xs btn-warning"><i class="fa fa-print"></i>  print</a>
		</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>