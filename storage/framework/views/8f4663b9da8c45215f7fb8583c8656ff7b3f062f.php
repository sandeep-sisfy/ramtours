
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/footable-bootstrap/css/footable.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/footable-bootstrap/css/footable.standalone.min.css">
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/css/ecommerce.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_container'); ?>
    <div class="container-fluid">
<?php

   if(empty($room_name))

    $room_name='';

?>
        <?php echo show_flash_msg(); ?>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card room_price_list">
                    <ul class="nav nav-tabs">
                        <?php $__env->startSection('nav-tabs'); ?>
                            <li class="nav-item"><a class="nav-link " data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/room/'.$room_id.'/edit')); ?>'">Room Info</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="<?php echo e(url('admin/room/gallery/'.$room_id)); ?>" onclick="window.location.href='<?php echo e(url('admin/room/gallery/'.$room_id)); ?>'">Gellery</a></li>
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/room/'.$room_id.'/room_prices')); ?>'">Room Price</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/room-alert/'.$room_id)); ?>'">Room Alerts</a></li>
                        <?php echo $__env->yieldSection(); ?>
                    </ul>
                    <div class="header">
                        <h4>Room Price for "<?php echo e($room_name); ?>" &nbsp;<span class="badge badge-primary"><?php echo e($all_count); ?></span></h4>
                            <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="<?php echo e(url('admin/room/'.$room_id.'/room_prices/create')); ?>">Add-Room-Price</a></button>
                            
                        <?php if(!empty($trash_count)): ?>
                        <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_left_btn rami_admin_btn"><a href="<?php echo e(url('admin/room/trash')); ?>">view Trash &nbsp;<span class="badge badge-danger"><?php echo e($trash_count); ?></span></a></button>
                       <?php endif; ?>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>    
                                    <th>Price Currency</th>         
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                    <?php $__currentLoopData = $room_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$loop->index); ?></td>
                                        <td><span class="text-muted">
                                                <?php echo e($price->price_start_date); ?>

                                            </span></td>
                                        <td><span class="text-muted">
                                                <?php echo e($price->price_end_date); ?></span></td>
                                        <td><span class="text-muted">
                                            <?php echo get_currency_symbol($price->price_currency); ?></span>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(url('admin/room_prices/'.$price->id.'/edit')); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="zmdi zmdi-edit" title="Edit"></i>
                                            </a>                                        
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red room_del_btn" item_id="<?php echo e($price->id); ?>">
                                                <i class="zmdi zmdi-delete" title="delete"></i>
                                            </a>
                                        </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                            </tbody>
                        </table>
                    </div>        
                </div>
                <form id='del_room_form' method="POST" action="<?php echo e(url('admin/room_prices')); ?>" style="display:none">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                </form>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_jscript'); ?>
##parent-placeholder-2d0251e083d4100c37156c98d7aab22e7bea6042##
    <script src="<?php echo e($assets_admin); ?>/bundles/footable.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="<?php echo e($assets_admin); ?>/js/pages/tables/footable.js"></script><!-- Custom Js --> 
    <script type="text/javascript">
        $('.room_price_list').on('click','.room_del_btn', function(event) {
            event.preventDefault();           
            var id = $(this).attr('item_id');
            if(confirm('Are you sure to delete this price.')){   
                var action=$('#del_room_form').attr('action');
                $('#del_room_form').attr('action', action+'/'+id);
                $('#del_room_form').submit();
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/room/room_price.blade.php ENDPATH**/ ?>