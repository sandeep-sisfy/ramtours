
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/jquery-datatable/dataTables.bootstrap4.min.css"> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_container'); ?>
    <div class="container-fluid">
        <?php echo show_flash_msg(); ?>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card room_list">
                    <div class="header">
                        <h4>Rooms &nbsp;<span class="badge badge-primary"><?php echo e($all_count); ?></span></h4>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="<?php echo e(url('admin/room/create')); ?>">Add-Room</a></button>
                        <?php if(!empty($trash_count)): ?>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="<?php echo e(url('admin/room/trash')); ?>">View Trash &nbsp;<span class="badge badge-danger"><?php echo e($trash_count); ?></span></a></button>
                       <?php endif; ?>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Old room id</th>
                                    <th>Room code</th> 
                                    <th>Hotel Name</th>
                                    <th>Room Type</th>         
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td><?php echo e(++$loop->index); ?></td>      
                                    <td>
                                        <span class="text-muted"><?php echo e($room->room_title); ?></span>
                                    </td>
                                    <td>
                                        <?php echo e($room->old_room_id); ?>

                                    </td>
                                    <td>
                                        <?php echo e($room->id); ?>

                                    </td>
                                    <td>
                                        <span class="text-muted">
                                        <?php if(!empty($room->hotel)): ?>
                                            <?php echo e($room->hotel->hotel_name); ?>

                                        <?php endif; ?>
                                        </span></td>
                                    <td>
                                        <span class="text-muted">
                                        <?php if(!empty($room->room_type_name)): ?>
                                            <?php echo e($room->room_type_name->room_type); ?>

                                        <?php endif; ?></span>
                                    </td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="<?php echo e(url('admin/room/'.$room->id.'/edit')); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="zmdi zmdi-edit" title="Edit"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="<?php echo e(url('admin/room/gallery/'.$room->id)); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="zmdi zmdi-image" title="Gallery"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">    
                                        <a href="<?php echo e(url('admin/room/'.$room->id.'/room_stock')); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="material-icons" title="Room Stock">local_hotel</i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">    
                                        <a href="<?php echo e(url('admin/room/'.$room->id.'/room_prices')); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="material-icons" title="price">euro_symbol</i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red room_del_btn" item_id="<?php echo e($room->id); ?>">
                                            <i class="zmdi zmdi-delete" title="delete"></i>
                                        </a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                         
                            </tbody>
                        </table>
                    </div>        
                </div>
                <form id='del_room_form' method="POST" action="<?php echo e(url('admin/room')); ?>" style="display: none">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                </form>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_jscript'); ?>
##parent-placeholder-2d0251e083d4100c37156c98d7aab22e7bea6042##
    <!-- Jquery DataTable Plugin Js --> 
    <script src="<?php echo e($assets_admin); ?>/bundles/datatablescripts.bundle.js"></script>
    <script src="<?php echo e($assets_admin); ?>/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="<?php echo e($assets_admin); ?>/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo e($assets_admin); ?>/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="<?php echo e($assets_admin); ?>/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="<?php echo e($assets_admin); ?>/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="<?php echo e($assets_admin); ?>/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
    <script type="text/javascript">
        $('.room_list').on('click', '.room_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to move this room into trash container.')){   
             var action=$('#del_room_form').attr('action');
             $('#del_room_form').attr('action', action+'/'+id);
             $('#del_room_form').submit();
           }
        });
        $('.pack_table').DataTable();
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/room/all_room.blade.php ENDPATH**/ ?>