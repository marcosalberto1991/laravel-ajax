<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('../sidebar'); ?>
    ##parent-placeholder-7abdeb10d95ed461139ff3a9b44115d8812a1fc1##

    <p>This is appended <h1>el menu de post</h1>   ssssssss sidebar.</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>child 1 deeeee<h1>
    <p>This is my body content.</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('..\layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>