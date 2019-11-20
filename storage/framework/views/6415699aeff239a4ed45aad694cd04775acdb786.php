
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
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="<?php echo e(url('admin/package/create')); ?>">Add-Package</a></button>
                        <?php if(!empty($trash_count)): ?>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="<?php echo e(url('admin/package/trash')); ?>">view Trash &nbsp;<span class="badge badge-danger"><?php echo e($trash_count); ?></span></a></button>
                       <?php endif; ?>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table-bordered table-striped  pack_table dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Package Location</th>
                                    <th>Package Type</th>
                                    <th>Package profit</th>
                                    <th>Hotel</th>
                                    <th>status</th>                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$loop->index); ?></td>                                    
                                    <td><span class="text-muted"><?php echo e($package->package_title); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($package->package_start_date); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($package->package_end_date); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($package->package_flight_location); ?></span></td>
                                    
                                    <td><span class="text-muted"><?php echo e(get_package_type($package->package_type)); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($package->package_profit_fhc); ?></span></td>
                                    <td><span class="text-muted">
                                        <?php if(!empty($package->hotel->hotel_code)): ?>
                                        <?php echo e($package->hotel->hotel_code); ?>

                                        <?php endif; ?>
                                        </span>
                                    </td>
                                    <?php
                                        if($package->package_status==1){
                                            $package_status="active";
                                        }elseif($package->package_status==0){
                                            $package_status="In-active";
                                        }else{
                                            $package_status=" ";
                                        }
                                    ?>
                                    <td><span class="text-muted"><?php echo e($package_status); ?></span></td>
                                    <td>
                                     <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a target="_blank" href="<?php echo e(url('package/'.$package->id)); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="material-icons" title="view" style="top:0px">pageview</i>
                                            </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="<?php echo e(url('admin/package/'.$package->id.'/edit')); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="zmdi zmdi-edit" title="Edit"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red package_del_btn" item_id="<?php echo e($package->id); ?>">
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
                <form id='del_package_form' method="POST" action="<?php echo e(url('admin/package')); ?>" style="display: none">
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
        $('.package_list').on('click', '.package_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are You sure to delete this Package.')){   
             var action=$('#del_package_form').attr('action');
             $('#del_package_form').attr('action', action+'/'+id);
             $('#del_package_form').submit();
           }
        });
        $('.pack_table').DataTable();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/admin/package/all_package.blade.php ENDPATH**/ ?>