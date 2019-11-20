
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
                <div class="card package_list">
                    <div class="header">
                        <h4>Packages &nbsp;<span class="badge badge-primary"><?php echo e($all_count); ?></span></h4>
                        <?php if(!empty($all_count)): ?>
                            <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn restore_all_btn"><a href="<?php echo e(url('admin/hotel/restore')); ?>">Restore All</a></button>
                            <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_right_btn rami_admin_btn force_del_all_btn"><a href="<?php echo e(url('admin/hotel/destroy')); ?>">Delete All</a></button>
                        <?php endif; ?>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Package Type</th>                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $trash_package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$loop->index); ?></td>                                    
                                    <td><span class="text-muted"><?php echo e($package->package_title); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($package->package_start_date); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($package->package_end_date); ?></span></td>

                                    <?php                                      
                                        if($package->package_type=='1'){
                                            $package_type='Flight+Hotel+Car';
                                        }elseif($package->package_type=='2'){
                                            $package_type='Flight+Hotel';
                                        }elseif($package->package_type=='3'){
                                            $package_type='Flight+Car';
                                        }else{
                                            $package_type='';
                                        }                                        
                                    ?>
                                    <td><span class="text-muted"><?php echo e($package_type); ?></span></td>
                                    <td>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-green restore_single_btn" item_id="<?php echo e($package->id); ?>">
                                                <i class="zmdi zmdi-edit" title="Restore"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red delete_single_btn" item_id="<?php echo e($package->id); ?>">
                                                <i class="zmdi zmdi-delete" title="Delete"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                
                            </tbody>
                        </table>
                    </div>        
                </div>
                <form id='del_form' method="POST" action="<?php echo e(url('admin/package/destroy')); ?>" style="display: none">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                </form>
                <form id='res_form' method="POST" action="<?php echo e(url('admin/package/restore')); ?>" style="display: none">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PATCH')); ?>

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
        $('.package_list').on('click', '.package_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are You sure to delete this Package.')){   
                var action=$('#del_package_form').attr('action');
                $('#del_package_form').attr('action', action+'/'+id);
                $('#del_package_form').submit();
            }
        });
    </script>
    <script type="text/javascript">
        $('.package_list').on('click', '.delete_single_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to delete this package details permanently.')){   
                var action=$('#del_form').attr('action');
                $('#del_form').attr('action', action+'/'+id);
                $('#del_form').submit();
            }
        });
        $('.package_list').on('click', '.force_del_all_btn', function(event) {
            event.preventDefault(); 
            if(confirm('Are you sure to delete all trash Packages.')){   
                var action=$('#del_form').attr('action');
                $('#del_form').submit();
            }
        });
        $('.package_list').on('click', '.restore_all_btn', function(event) {
            event.preventDefault(); 
            if(confirm('Are you sure to restore all trash packages.')){   
                var action=$('#res_form').attr('action');
                $('#res_form').submit();
            }
        });
        $('.package_list').on('click', '.restore_single_btn', function(event) {
            event.preventDefault(); 
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to restore this package.')){   
                var action=$('#res_form').attr('action');
                $('#res_form').attr('action', action+'/'+id);
                $('#res_form').submit();
            }
        });
        $('.pack_table').DataTable();
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/package/all_trashed_package.blade.php ENDPATH**/ ?>