<?php $__env->startSection('title', 'Page Title'); ?>
<!--
<?php $__env->startSection('sidebar'); ?>
    ##parent-placeholder-19bd1503d9bad449304cc6b4e977b74bac6cc771##
-->
<!--
    <p>This is appended <h1>el menu de post</h1>   ssssssss sidebar.</p>
-->
 <section class="col-lg-12 connectedSortable">
       

     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="" method="post">
              <?php echo e(csrf_field()); ?>

            <!--
                -->
                <!-- text input -->
                <div class="form-group">
                  <label>Tible</label>
                    <div class="form-group<?php echo e(($errors->has('title')) ? $errors->first('title') : ''); ?>">
                  <input type="text" name="title" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Text </label>
                <!--
                  <input type="text" name="text" class="form-control" placeholder="Enter ..." disabled>
                  -->
                  <input type="text" name="text" class="form-control" placeholder="Enter ...">
                

                </div>

                <div class="form-group">
                  <label>Textarea</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                <!-- textarea
                 -->
                <button type="submit" class="btn btn-primary">Submit</button>
               </div>
                </form>
               

    </div>
    </div>

     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
               </div>
    </div>


        </section>
<?php $__env->stopSection(); ?>

<!--
<h1>child 1  eee<h1>
    <p>This is my body content.</p>
<?php $__env->startSection('content'); ?>


<?php $__env->stopSection(); ?>

-->
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>