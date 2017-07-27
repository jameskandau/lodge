<?php $__env->startSection('content'); ?>
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
					<?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				     <tr>
				     	<td><?php echo e($client->day); ?></td>
				     	<td><?php echo e(($client->total)); ?></td>
				     </tr>
				     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
					<?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				     <tr>
				     	<td><?php echo e($account->day); ?></td>
				     	<td><?php echo e($account->amount); ?></td>
				     </tr>
				     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
		<td><?php echo e($room->id); ?></td>
		<td><?php echo e($room->types->name); ?></td>
		<td><?php echo e($room->types->price); ?></td>
		<td><?php echo e($room->description); ?></td>
		<td><span class="label label-success">Free</span></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>