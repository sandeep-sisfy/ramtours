
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
                <div class="card hotel_list">
                    <div class="header">
                       <h4>Hotels&nbsp;<span class="badge badge-primary"><?php echo e($all_count); ?></span></h4>
                       <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="<?php echo e(url('admin/hotel/create')); ?>">Add-Hotel</a></button>
                       <?php if(!empty($trash_count)): ?>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="<?php echo e(url('admin/hotel/trash')); ?>">Private Hotel &nbsp;<span class="badge badge-danger"><?php echo e($trash_count); ?></span></a></button>
                       <?php endif; ?>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>hotel name</th>
                                    <th>hotel code</th>
                                    <th>contact number</th>
                                    <th>Email</th>
                                    <th>website</th>
                                    <th>location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                    
                                <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$loop->index); ?>

                                    </td>
                                    <td><?php echo e($hotel->hotel_name); ?>

                                    </td>
                                    <td><?php echo e($hotel->hotel_code); ?></td>
                                    <td><?php echo e($hotel->hotel_contact); ?></td>
                                    <td><?php echo e($hotel->hotel_email); ?></td>
                                     <td><?php echo e($hotel->hotel_website); ?></td>
                                    <td>                                 
                                       <?php if(!empty($hotel->hotel_loction_name)): ?>
                                       <?php echo e($hotel->hotel_loction_name->loc_name); ?>

                                       <?php endif; ?>
                                    </td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a target="_blank" href="<?php echo e(url('accommodation-detail/'.$hotel->id)); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="material-icons" title="view" style="top:0px">pageview</i>
                                            </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="<?php echo e(url('admin/hotel/'.$hotel->id.'/edit')); ?>" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit" title="Edit"></i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="<?php echo e(url('admin/hotel/gallery/'.$hotel->id)); ?>" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-image" title="Gallery"></i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red hotel_del_btn" item_id="<?php echo e($hotel->id); ?>"><i class="zmdi zmdi-delete" title="Private"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>        
                </div>
                <form id='del_hotel_form' method="POST" action="<?php echo e(url('admin/hotel')); ?>" style="display: none">
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
        $('.hotel_list').on('click','.hotel_del_btn',function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to make this hote Private.')){   
              var action=$('#del_hotel_form').attr('action');
              $('#del_hotel_form').attr('action', action+'/'+id);
              $('#del_hotel_form').submit();
            }
        });
        $('.pack_table').DataTable();          
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/hotel/all_hotel.blade.php ENDPATH**/ ?>