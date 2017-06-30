<?php if(Session::has('info')): ?>
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">
			<span>&times;</span>
		</button>
		<?php echo e(Session::get('info')); ?>

	</div>
<?php endif; ?>