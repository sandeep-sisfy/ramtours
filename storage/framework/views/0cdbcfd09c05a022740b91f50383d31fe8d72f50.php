
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
                <div class="card setting_list">
                    <div class="header">
                        <h4>All Package Settings via Location &nbsp;<span class="badge badge-primary"><?php echo e($all_count); ?></span></h4>
                        <button type="button" class="btn btn-raised btn-primary waves-effect "><a href="<?php echo e(url('admin/location/'.$loc_id.'/package-setting/'.$pkg_type.'/page_content')); ?>">Add Location Page Content</a></button>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn restore_all_btn"><a href="<?php echo e(url('admin/location')); ?>">All Locations</a></button>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_right_btn rami_admin_btn force_del_all_btn"><a href="<?php echo e(url('admin/location/'.$loc_id.'/package-setting/'.$pkg_type.'/create')); ?>">Add-new-Settings</a></button>                        
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Location Name</th>
                                    <th>Package Type</th>
                                    <th>Sequence</th>
                                    <th>Month</th>
                                    <th>Title</th>
                                    <th>Skip dates</th>
									<th data-breakpoints="sm xs">Action</th>
								</tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $all_pkg_settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkg_setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr> 
                                    <td><?php echo e(++$loop->index); ?></td>
                                    <td><h5><?php echo e(get_location_name($pkg_setting->loc_id)); ?></h5></td>
                                    <td><?php echo e(get_package_type($pkg_setting->pkg_type)); ?></td>
                                    <td>
                                       <?php echo e($pkg_setting->sequence); ?>

                                    </td>
                                    <td>
                                       <?php echo e(get_month_name($pkg_setting->month)); ?>

                                    </td>
                                    <td>
                                       <?php echo e($pkg_setting->title); ?>

                                    </td>
                                    <td>
                                       <?php echo e($pkg_setting->skip_date); ?>

                                    </td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="<?php echo e(url('admin/package-setting/'.$pkg_setting->pkg_type.'/edit/'.$pkg_setting->id)); ?>" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit" title="Edit"></i></a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red set_del_btn" item_id="<?php echo e($pkg_setting->id); ?>"><i class="zmdi zmdi-delete" title="delete"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div> 
                    <form id='del_set_form' method="POST" action="<?php echo e(url('admin/package-setting')); ?>" style="display: none">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                </form>       
                </div>
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
        $('.setting_list').on('click', '.set_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to delete this setting.')){   
             var action=$('#del_set_form').attr('action');
             $('#del_set_form').attr('action', action+'/'+id);
             $('#del_set_form').submit();
            }
        });
        $('.pack_table').DataTable();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/admin/location/all_loc_pkg_dis_setting.blade.php ENDPATH**/ ?>