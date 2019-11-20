
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_container'); ?>
<?php
    if(empty($trash_count))
    $trash_count='';
?>
    <div class="container-fluid">
        <?php echo show_flash_msg(); ?>

        <div class="row clearfix">
            <div class="col-lg-12">                
                <div class="card airline_list">
                    <div class="header">
                        <h4>Airlines&nbsp;<span class="badge badge-primary"><?php echo e($all_count); ?></span></h4>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="<?php echo e(url('admin/airline/create')); ?>">Add-Airline</a></button>
                        <?php if(!empty($trash_count)): ?>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="<?php echo e(url('admin/airline/trash')); ?>">view Trash &nbsp;<span class="badge badge-danger"><?php echo e($trash_count); ?></span></a></button>
                        <?php endif; ?>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Title</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                <?php $__currentLoopData = $airlines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $airline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$loop->index); ?></td>
                                    <td><img src="<?php echo e(rami_get_file_url($airline->airl_logo_img)); ?>" width="50" height="50" alt="airline logo img"></td>
                                    <td><?php echo e($airline->airl_title); ?></td>
                                    <td><?php echo e($airline->airl_cont_1); ?></td>
                                    <td><?php echo e($airline->airl_email); ?></td>
                                    <td>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="<?php echo e(url('admin/airline/'.$airline->id.'/edit')); ?>" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit" title="Edit"></i></a>
                                        </div>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red airl_del_btn" item_id="<?php echo e($airline->id); ?>"><i class="zmdi zmdi-delete" title="delete"></i></a>
                                    </div>                                    
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>        
                </div>
                <form id='del_airl_form' method="POST" action="<?php echo e(url('admin/airline')); ?>" style="display: none">
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
        $('.airline_list').on('click', '.airl_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to move Airline into Trash Container.')){   
             var action=$('#del_airl_form').attr('action');
             $('#del_airl_form').attr('action', action+'/'+id);
             $('#del_airl_form').submit();
           }
        });
        $('.pack_table').DataTable();
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/admin/airline/all_airline_suplier.blade.php ENDPATH**/ ?>