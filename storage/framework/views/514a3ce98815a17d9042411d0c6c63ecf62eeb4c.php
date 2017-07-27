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


<a class="btn btn-success pull-right" href="<?php echo e(url('/room-types/create')); ?>">Add Room Type</a>

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
		<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
		<td><?php echo e($type->id); ?></td>
		<td><?php echo e($type->name); ?></td>
		<td><?php echo e($type->price); ?></td>
		<td><?php echo e($type->description); ?></td>
		
		<td>
			<a href="<?php echo e(url('room-types/'.$type->id .'/edit')); ?>" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> edit</a>
			<?php echo e(Form::open(['method' => 'DELETE','action' => ['RoomTypeController@destroy', $type->id],'style'=>'display:inline'])); ?>

			<?php echo e(Form::hidden('_method', 'DELETE')); ?>

			<?php echo e(Form::button('<i class="fa fa-trash"></i> Delete', array('class' => 'btn btn-danger','type'=>'submit'))); ?>

			<?php echo e(Form::close()); ?>

		</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>