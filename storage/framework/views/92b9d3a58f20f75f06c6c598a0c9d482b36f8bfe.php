<?php $__env->startSection('title', 'Page Title'); ?>

  <?php $__env->startSection('content'); ?>

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
              <h3 class="box-title">Añadir Autores</h3>
            </div>
            <!-- /.box-header -->
      
    </div>

     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            <a href="<?php echo e(route('Author.create')); ?>"> registra un nuevousuario</a>  
            
              <table>
              <th>
                <td>Nombre </td>
                <td>  Email</td>
                <td> Password</td>
                
              </th>
             
              <?php
            


            ?>
            <div class="container">

            <?php $__currentLoopData = $author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($user->name); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

            

              </table>
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