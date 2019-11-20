<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##   
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_container'); ?>
<?php 
    if(empty($flight_schedules ))
    $flight_schedules ='';
?>
    <div class="container-fluid">
        <?php echo show_flash_msg(); ?>

        <div class="row clearfix">
            <div class="col-lg-12">                
                <div class="card flight_sche_list">
                    <div class="header">
                       <h4>Flights Schedule&nbsp;<span class="badge badge-primary"><?php echo e($all_count); ?></span></h4>
                       <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="<?php echo e(url('admin/flight-schedule/create')); ?>">Add-Schedule</a></button>
                        <?php if(!empty($trash_count)): ?>                           
                           <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="<?php echo e(url('admin/flight-schedule/trash')); ?>">view Trash &nbsp;<span class="badge badge-danger"><?php echo e($trash_count); ?></span></a></button>
                        <?php endif; ?>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Flight Name</th>
                                    
                                    <th>Airline</th>
                                    <th>PNR Number</th>
                                    <th>Total Seat</th>
                                    <th>Available</th>
                                    <th>Price/person</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $flight_schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flight_schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$loop->index); ?></td>
                                    <td><span class="text-muted">
                                       <?php echo e($flight_schedule->flight_sche_title); ?>

                                        </span>
                                    </td>
                                    
                                    <td><span class="text-muted">
                                        <?php if(!empty($flight_schedule->airline_name)): ?>
                                        <?php echo e($flight_schedule->airline_name->airl_title); ?>

                                        <?php endif; ?>
                                        </span>
                                    </td>
                                    <td><span class="text-muted"><?php echo e($flight_schedule->flight_pnr_no); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($flight_schedule->num_total_seat); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($flight_schedule->num_available_seat); ?></span></td>
                                    <td><span class="text-muted">$ <?php echo e(get_rami_flight_price_for_single_flight($flight_schedule->id)); ?></span></td>
                                    <?php
                                        if($flight_schedule->flight_sche_status==1){
                                          $flight_sche_status='Active';
                                        }else{
                                          $flight_sche_status='In Active';
                                        }
                                    ?>
                                    <td>
                                    	<div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a target="_blank" href="<?php echo e(url('flight-detail/'.$flight_schedule->id)); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="material-icons" title="view" style="top:0px">pageview</i>
                                            </a>
                                        </div>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a href="<?php echo e(url('admin/flight-schedule/'.$flight_schedule->id.'/edit')); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="zmdi zmdi-edit" title="Edit"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red flight_sche_del_btn" item_id="<?php echo e($flight_schedule->id); ?>">
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
                <form id='del_flight_sche_form' method="POST" action="<?php echo e(url('admin/flight-schedule')); ?>" style="display: none">
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
        $('.flight_sche_list').on('click', '.flight_sche_del_btn', function(event) {
            event.preventDefault();
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to move this flight schedule into trash container.')){
                var action=$('#del_flight_sche_form').attr('action');
                $('#del_flight_sche_form').attr('action', action+'/'+id);
                $('#del_flight_sche_form').submit();
            }
        });
        $('.pack_table').DataTable();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/flight_schedule/all_flight_schedule.blade.php ENDPATH**/ ?>