<?php $__env->startSection('content'); ?>
	<div class="col-xs-12 col-sm-8">
		<h2>
			Lista de productos
			<a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary pull-right">Nuevo</a>
		</h2>
		<hr>
		<?php echo $__env->make('products.partials.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre del producto</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($product->id); ?></td>
					<td>
						<strong><?php echo e($product->name); ?></strong>
						<?php echo e($product->short); ?>

					</td>
					<td width="20px">
						<a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-link">
							Ver
						</a>
					</td>
					<td width="20px">
						<a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-link">
							Editar
						</a>
					</td>
					<td width="20px">
						
						<a href="<?php echo e(route('products.destroy', $product->id)); ?>" class="btn btn-link">
							eliminar
						</a>
														
						
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
		<?php echo $products->render(); ?>

	</div>
	<div class="col-xs-12 col-sm-4">
		<?php echo $__env->make('products.partials.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>