<?php $__env->startSection('content'); ?>
	<div class="col-xs-12 col-sm-8">
		<h2>
			<strong>#<?php echo e($product->id); ?></strong> <?php echo e($product->name); ?>

			<a href="<?php echo e(route('products.index')); ?>" class="btn btn-default pull-right">		Regresar
			</a>
		</h2>
		<hr>
		<p><?php echo e($product->short); ?></p>
		<p><?php echo e($product->body); ?></p>

		<a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-primary">
			Editar
		</a>
	</div>
	<div class="col-xs-12 col-sm-4">
		<?php echo $__env->make('products.partials.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>