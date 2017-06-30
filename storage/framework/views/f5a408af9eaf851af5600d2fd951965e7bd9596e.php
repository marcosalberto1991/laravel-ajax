    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.jpg')); ?>">

    <!-- CSFR token for ajax call -->
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>

    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    

    <!-- icheck checkboxes -->
    <link rel="stylesheet" href="<?php echo e(asset('icheck/square/yellow.css')); ?>">
    

    <!-- toastr notifications -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <!-- Font Awesome -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .panel-heading {
            padding: 0;
        }
        .panel-heading ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .panel-heading li {
            float: left;
            border-right:1px solid #bbb;
            display: block;
            padding: 14px 16px;
            text-align: center;
        }
        .panel-heading li:last-child:hover {
            background-color: #ccc;
        }
        .panel-heading li:last-child {
            border-right: none;
        }
        .panel-heading li a:hover {
            text-decoration: none;
        }

        .table.table-bordered tbody td {
            vertical-align: baseline;
        }
    </style>
<!--
</head>

<body>
-->
<?php $__env->startSection('content'); ?>

<section class="col-lg-11 connectedSortable">
       

     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-nombre">Lista de Comentarios</h3>
            </div>
            <!-- /.box-header -->
      <div class="box-body">
       <div class="">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <li><i class="fa fa-file-text-o"></i> All the current Posts</li>
                    <a href="#" class="add-modal"><li>Add a Post</li></a>
                </ul>
            </div>
        
            <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover" id="postTable" style="visibility: hidden;">
                        <thead>
                            <tr>
                                <th valign="middle">#</th>
                                <th>Nombre</th>
                                <th>Mensajec</th>
                                <th>puntos?</th>
                                <th>respuesta?</th>
                                <th>idcomentario?</th>
                                <th>Last updated</th>
                                <th>Actions</th>
                            </tr>
                            <?php echo e(csrf_field()); ?>

                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $listmysql; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indexKey => $lists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="item<?php echo e($lists->id); ?> <?php if($lists->is_published): ?> warning <?php endif; ?>">
                                    <td class="col1"><?php echo e($indexKey+1); ?></td>
                                    <td><?php echo e($lists->nombre); ?></td>
                                    <td>
                                        <?php echo e(App\Post::getExcerpt($lists->mensajec)); ?>

                                    </td>
                                    <td><?php echo e($lists->punto); ?></td>

                                    <td><?php echo e($lists->respuestas); ?></td>
                                    <td><?php echo e($lists->idcomentario); ?></td>
                                    <!--
                                    <td class="text-center"><input type="checkbox" class="published" id="" data-id="<?php echo e($lists->id); ?>" <?php if($lists->is_published): ?> checked <?php endif; ?>></td>
                                    
                                    -->
                                    <td><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lists->updated_at)->diffForHumans()); ?></td>
                                    <td>
                                        <button class="show-modal btn btn-success" 
                                        data-id="<?php echo e($lists->id); ?>" 
                                        data-nombre="<?php echo e($lists->nombre); ?>" 
                                        data-mensajec="<?php echo e($lists->mensajec); ?>"
                                        data-punto="<?php echo e($lists->punto); ?>"
                                        data-respuestas="<?php echo e($lists->respuestas); ?>"
                                        data-idcomentario="<?php echo e($lists->idcomentario); ?>"
                                        >

                                        <span class="glyphicon glyphicon-eye-open"></span> Show</button>
                                        <button class="edit-modal btn btn-info" 
                                        data-id="<?php echo e($lists->id); ?>" 
                                        data-nombre="<?php echo e($lists->nombre); ?>"
                                        data-punto="<?php echo e($lists->punto); ?>"  
                                        data-mensajec="<?php echo e($lists->mensajec); ?>"
                                        data-respuestas="<?php echo e($lists->respuestas); ?>"
                                        data-idcomentario="<?php echo e($lists->idcomentario); ?>"
                                        >
                                        
                                        <span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button class="delete-modal btn btn-danger" 
                                        data-id="<?php echo e($lists->id); ?>" 
                                        data-nombre="<?php echo e($lists->nombre); ?>"
                                        data-punto="<?php echo e($lists->punto); ?>" 
                                        data-mensajec="<?php echo e($lists->mensajec); ?>"
                                        data-respuestas="<?php echo e($lists->respuestas); ?>"
                                        data-idcomentario="<?php echo e($lists->idcomentario); ?>"

                                        >

                                        
                                        <span class="glyphicon glyphicon-trash"></span> Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
       </div>
       </div>
       </div>
       </section>




       

<?php $__env->stopSection(); ?>


    <!-- Modal form to add a post -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-nombre"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_add" autofocus>
                                <small>Min: 2, Max: 32, only text</small>
                                <p class="errorNombre text-center alert alert-danger hidden"></p>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for="mensajec">Mensajec:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="mensajec_add" cols="40" rows="5"></textarea>
                                <small>Min: 2, Max: 128, only text</small>
                                <p class="errorMensajec text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="punto">Punto:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="punto_add" autofocus>
                                <small>Min: 2, Max: 32, only text</small>
                                <p class="errorPunto text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                          <div class="form-group">
                            <label class="control-label col-sm-2" for="respuestas">respuestas:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="respuestas_add" autofocus>
                                <small>Min: 2, Max: 32, only text</small>
                                <p class="errorRespuestas text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                          <div class="form-group">
                            <label class="control-label col-sm-2" for="idcomentario">idcomentario:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="idcomentario_add" autofocus>
                                <small>Min: 2, Max: 32, only text</small>
                                <p class="errorIdcomentario text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal form to show a post -->
    <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-nombre"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_show" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="nombre_show" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="mensajec">Mensajec:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="mensajec_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="punto">punto:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="punto_show" disabled>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label col-sm-2" for="respuestas">respuestas:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="respuestas_show" disabled>
                            </div>
                        </div>

                          <div class="form-group">
                            <label class="control-label col-sm-2" for="idcomentario">idcomentario:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="idcomentario_show" disabled>
                            </div>
                        </div>

                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal form to edit a form -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-nombre"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_edit" autofocus>
                                <p class="errorNombre text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="mensajec">Mensajec:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="mensajec_edit" cols="40" rows="5"></textarea>
                                <p class="errorMensajec text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label col-sm-2" for="punto">punto:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="punto_edit" autofocus>
                                <p class="errorPunto text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label col-sm-2" for="respuestas">respuestas:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="respuestas_edit" autofocus>
                                <p class="errorRespuestas text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label col-sm-2" for="idcomentario">idcomentario:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="idcomentario_edit" autofocus>
                                <p class="errorIdcomentario text-center alert alert-danger hidden"></p>
                            </div>
                        </div>


                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Edit
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal form to delete a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-nombre"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following post?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="nombre_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery 
    
    -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>
     -->

    <!-- toastr notifications -->
    
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="<?php echo e(asset('icheck/icheck.min.js')); ?>"></script>

    <!-- Delay table load until everything else is loaded -->
    <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script>

    <script>
        $(document).ready(function(){
            $('.published').iCheck({
                checkboxClass: 'icheckbox_square-yellow',
                radioClass: 'iradio_square-yellow',
                increaseArea: '20%'
            });
            $('.published').on('ifClicked', function(event){
                id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(URL::route('changeStatus')); ?>",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id
                    },
                    success: function(data) {
                        // empty
                    },
                });
            });
            $('.published').on('ifToggled', function(event) {
                $(this).closest('tr').toggleClass('warning');
            });
        });
        
    </script>

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        // add a new post
        $(document).on('click', '.add-modal', function() {
            $('.modal-nombre').text('Add');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'Comentario',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'nombre': $('#nombre_add').val(),
                    'mensajec': $('#mensajec_add').val(),
                    'respuestas': $('#respuestas_add').val(),
                    'punto': $('#punto_add').val(),
                    'idcomentario': $('#idcomentario_add').val()
                    /*
                    */
                },
                success: function(data) {
                    $('.errorNombre').addClass('hidden');
                    $('.errorMensajec').addClass('hidden');
                    $('.errorPunto').addClass('hidden');
                    $('.errorRespuestas').addClass('hidden');
                    $('.errorIdcomentario').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.nombre) {
                            $('.errorNombre').removeClass('hidden');
                            $('.errorNombre').text(data.errors.nombre);
                        }
                        if (data.errors.mensajec) {
                            $('.errorMensajec').removeClass('hidden');
                            $('.errorMensajec').text(data.errors.mensajec);
                        }
                        if (data.errors.punto) {
                            $('.errorPunto').removeClass('hidden');
                            $('.errorPunto').text(data.errors.punto);
                        }
                        if (data.errors.respuestas) {
                            $('.errorRespuestas').removeClass('hidden');
                            $('.errorRespuestas').text(data.errors.respuestas);
                        }
                        if (data.errors.idcomentario) {
                            $('.errorIdcomentario').removeClass('hidden');
                            $('.errorIdcomentario').text(data.errors.idcomentario);
                        }

                       
                    } else {
                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                        $('#postTable').append(
//add
    "<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td>"+
    "<td>" + data.nombre + "</td>"+
    "<td>" + data.mensajec + "</td>"+
    "<td>" + data.punto + "</td>"+
    "<td>" + data.respuestas + "</td>"+
    "<td>" + data.idcomentario + "</td>"+

    "<td>Right now</td><td><button class='show-modal btn btn-success' data-id='" + data.id + 
    "' data-nombre='" + data.nombre + 
    "' data-mensajec='" + data.mensajec + 
    "' data-punto='" + data.punto + 
    "'data-respuestas='" + data.respuestas + 
    "'data-idcomentario='" + data.idcomentario +

    "' ><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id +
    "' data-nombre='" + data.nombre + 
    "' data-mensajec='" + data.mensajec + 
    "' data-punto='" + data.punto + 
    "' data-respuestas='" + data.respuestas + 
    "' data-idcomentario='" + data.idcomentario +

    "' ><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + 
    "' data-nombre='" + data.nombre + 
    "' data-mensajec='" + data.mensajec + 
    "' data-punto='" + data.punto + 
    "' data-respuestas='" + data.respuestas + 
    "' data-idcomentario='" + data.idcomentario + 

    "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                        $('.new_published').iCheck({
                            checkboxClass: 'icheckbox_square-yellow',
                            radioClass: 'iradio_square-yellow',
                            increaseArea: '20%'
                        });
                        $('.new_published').on('ifToggled', function(event){
                            $(this).closest('tr').toggleClass('warning');
                        });
                        $('.new_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo e(URL::route('changeStatus')); ?>",
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id
                                },
                                success: function(data) {
                                    // empty
                                },
                            });
                        });
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                },
            });
        });

        // Show a post
        $(document).on('click', '.show-modal', function() {
            $('.modal-nombre').text('Show');
            $('#id_show').val($(this).data('id'));
            $('#nombre_show').val($(this).data('nombre'));
            $('#mensajec_show').val($(this).data('mensajec'));
            
            $('#punto_show').val($(this).data('punto'));
            $('#respuestas_show').val($(this).data('respuestas'));
            $('#idcomentario_show').val($(this).data('idcomentario'));


            $('#showModal').modal('show');
        });


        // Edit a post
        $(document).on('click', '.edit-modal', function() {
            $('.modal-nombre').text('Edit');
            $('#id_edit').val($(this).data('id'));
            $('#nombre_edit').val($(this).data('nombre'));
            $('#mensajec_edit').val($(this).data('mensajec'));
            $('#punto_edit').val($(this).data('punto'));
            $('#respuestas_edit').val($(this).data('respuestas'));
            $('#idcomentario_edit').val($(this).data('idcomentario'));




            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'Comentario/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'nombre': $('#nombre_edit').val(),
                    'mensajec': $('#mensajec_edit').val(),
                    'punto': $('#punto_edit').val(),
                    'respuestas': $('#respuestas_edit').val(),
                    'idcomentario': $('#idcomentario_edit').val()

                },
                success: function(data) {
                    //$('.errorNombre').addClass('hidden');
                    //$('.errorMensajec').addClass('hidden');
                    $('.errorNombre').addClass('hidden');
                    $('.errorMensajec').addClass('hidden');
                    $('.errorPunto').addClass('hidden');
                    $('.errorRespuestas').addClass('hidden');
                    $('.errorIdcomentario').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validacion errorea!', 'Alerta de Error ', {timeOut: 5000});
                        }, 500);

                       
                        if (data.errors.nombre) {
                            $('.errorNombre').removeClass('hidden');
                            $('.errorNombre').text(data.errors.nombre);
                        }
                        if (data.errors.mensajec) {
                            $('.errorMensajec').removeClass('hidden');
                            $('.errorMensajec').text(data.errors.mensajec);
                        }
                        if (data.errors.punto) {
                            $('.errorPunto').removeClass('hidden');
                            $('.errorPunto').text(data.errors.punto);
                        }
                        if (data.errors.respuestas) {
                            $('.errorRespuestas').removeClass('hidden');
                            $('.errorRespuestas').text(data.errors.respuestas);
                        }
                        if (data.errors.idcomentario) {
                            $('.errorIdcomentario').removeClass('hidden');
                            $('.errorIdcomentario').text(data.errors.idcomentario);
                        }





                    } else {
                        toastr.success('Successfully updated comentario!', 'Success Alert', {timeOut: 5000});

                        $('.item' + data.id).replaceWith("<tr class='item" + data.id +"'><td class='col1'>" + data.id +
                            "</td>"+
                            "<td>"+ data.nombre + "</td>"+
                            "<td>"+ data.mensajec + "</td>"+
                            "<td>"+ data.punto + "</td>"+
                            "<td>"+ data.respuestas + "</td>"+
                            "<td>"+ data.idcomentario + "</td> <td>Right now</td><td>"+

                            "<button class='show-modal btn btn-success' data-id='" + data.id +
                            "' data-nombre='"+ data.nombre +
                            "' data-mensajec='"+ data.mensajec +
                            "' data-punto='"+ data.punto +
                            "' data-respuestas='"+ data.respuestas +
                            "'  data-idcomentario='"+ data.idcomentario +
                            "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='"+ data.id + 
                            "' data-nombre='"+ data.nombre +
                            "' data-mensajec='"+ data.mensajec + 
                            "' data-punto='"+ data.punto + 
                            "' data-respuestas='"+ data.respuestas + 
                            "' data-idcomentario='"+ data.idcomentario + 

                            "' ><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='"+ data.id + 
                            "' data-nombre='"+ data.nombre + 
                            "' data-mensajec='"+ data.mensajec + 
                            "' data-punto='"+ data.punto + 
                            "' data-respuestas='"+ data.respuestas + 
                            "' data-idcomentario='"+ data.idcomentario + 

                            "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

                        if (data.is_published) {
                            $('.edit_published').prop('checked', true);
                            $('.edit_published').closest('tr').addClass('warning');
                        }
                        $('.edit_published').iCheck({
                            checkboxClass: 'icheckbox_square-yellow',
                            radioClass: 'iradio_square-yellow',
                            increaseArea: '20%'
                        });
                        $('.edit_published').on('ifToggled', function(event) {
                            $(this).closest('tr').toggleClass('warning');
                        });
                        $('.edit_published').on('ifChanged', function(event){
                            id = $(this).data('id');
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo e(URL::route('changeStatus')); ?>",
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id
                                },
                                success: function(data) {
                                    // empty
                                },
                            });
                        });
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                }
            });
        });
        
        // delete a post
        $(document).on('click', '.delete-modal', function() {
            $('.modal-nombre').text('Delete');
            $('#id_delete').val($(this).data('id'));
            $('#nombre_delete').val($(this).data('nombre'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'Comentario/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            });
        });
    </script>



</body>
</html>



 

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>