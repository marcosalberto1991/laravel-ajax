<?php $__env->startSection('title', 'Page Title'); ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 
  <div class="container">
    <h2>CRUD operations in Laravel 5.3</h2>
    <?php if($message = Session::get('success')): ?>
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo e($message); ?></strong>
      </div>
    <?php endif; ?>
    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add</button>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($x -> first_name); ?></td>
          <td><?php echo e($x -> last_name); ?></td>
          <td><?php echo e($x -> email); ?></td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('<?php echo e($x -> id); ?>')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('<?php echo e($x -> id); ?>')">Edit</button>
              <button class="btn btn-danger" onclick="fun_delete('<?php echo e($x -> id); ?>')">Delete</button>
          </td>
        </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="<?php echo e(url('crud/view')); ?>">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="<?php echo e(url('crud/delete')); ?>">
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Record</h4>
          </div>
          <div class="modal-body">
            <form action="<?php echo e(url('crud')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" id="first_name" name="first_name">
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name:</label>
                  <input type="text" class="form-control" id="last_name" name="last_name">
                </div>
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends -->
 
    <!-- View Modal start -->
    <div class="modal fade" id="viewModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">View</h4>
          </div>
          <div class="modal-body">
            <p><b>First Name : </b><span id="view_fname" class="text-success"></span></p>
            <p><b>Last Name : </b><span id="view_lname" class="text-success"></span></p>
            <p><b>Email : </b><span id="view_email" class="text-success">bhaskar.panja@quadone.com</span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"></button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- view modal ends -->
 
    <!-- Edit Modal start -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit</h4>
          </div>
          <div class="modal-body">
            <form action="<?php echo e(url('crud/update')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                <div class="form-group">
                  <label for="edit_first_name">First Name:</label>
                  <input type="text" class="form-control" id="edit_first_name" name="edit_first_name">
                </div>
                <div class="form-group">
                  <label for="edit_last_name">Last Name:</label>
                  <input type="text" class="form-control" id="edit_last_name" name="edit_last_name">
                </div>
                <label for="edit_email">Email address:</label>
                <input type="email" class="form-control" id="edit_email" name="edit_email">
              </div>
              
              <button type="submit" class="btn btn-default">Update</button>
              <input type="hidden" id="edit_id" name="edit_id">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          
        </div>
        
      </div>
    </div>
    <!-- Edit code ends -->
 
  </div>
  <script type="text/javascript">
    function fun_view(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#view_fname").text(result.first_name);
          $("#view_lname").text(result.last_name);
          $("#view_email").text(result.email);
        }
      });
    }
 
    function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_id").val(result.id);
          $("#edit_first_name").val(result.first_name);
          $("#edit_last_name").val(result.last_name);
          $("#edit_email").val(result.email);
        }
      });
    }
 
    function fun_delete(id)
    {
      var conf = confirm("Are you sure want to delete??");
      if(conf){
        var delete_url = $("#hidden_delete").val();
        $.ajax({
          url: delete_url,
          type:"POST", 
          data: {"id":id,_token: "<?php echo e(csrf_token()); ?>"}, 
          success: function(response){
            alert(response);
            location.reload(); 
          }
        });
      }
      else{
        return false;
      }
    }
  </script>
  
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>