
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
        <?php echo show_flash_msg(); ?>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card car_price_list">
                    <div class="header">
                        <h4>Car Price for "<?php echo e($car_name); ?>" &nbsp;<span class="badge badge-primary"><?php echo e($all_count); ?></span></h4>
                            <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="<?php echo e(url('admin/car/'.$car_id.'/car_prices/create')); ?>">Add-Car-Price</a></button> 
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
                                    <?php if(!empty($car_prices)): ?>
                                    <?php $__currentLoopData = $car_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                   
                                    <tr>
                                        <td><?php echo e(++$loop->index); ?></td> 
                                        <td><span class="text-muted">
                                                <?php echo e($price->price_start_date); ?>

                                            </span></td>
                                        <td><span class="text-muted">
                                                <?php echo e($price->price_end_date); ?></span></td>
                                        </td>
                                        <td><span class="text-muted">
                                            <?php echo e(get_currency_symbol($price->price_currency)); ?></span>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(url('admin/car_prices/'.$price->id.'/edit')); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="zmdi zmdi-edit" title="Edit"></i>
                                            </a>                                        
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red car_del_btn" item_id="<?php echo e($price->id); ?>">
                                                <i class="zmdi zmdi-delete" title="delete"></i>
                                            </a>
                                        </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    <?php endif; ?>
                            </tbody>
                        </table>
                    </div>        
                </div>
                <?php if(!empty($car_prices)): ?>
                <form id='del_car_form' method="POST" action="<?php echo e(url('admin/car_prices')); ?>" style="display:none">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                </form>
                <?php endif; ?>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_jscript'); ?>
##parent-placeholder-2d0251e083d4100c37156c98d7aab22e7bea6042##
    <script src="<?php echo e($assets_admin); ?>/bundles/footable.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="<?php echo e($assets_admin); ?>/js/pages/tables/footable.js"></script><!-- Custom Js --> 
    <script type="text/javascript">
        $('.car_price_list').on('click','.car_del_btn', function(event) {
            event.preventDefault();           
            var id = $(this).attr('item_id');
            if(confirm('Are you sure to delete this price.')){   
                var action=$('#del_car_form').attr('action');
                $('#del_car_form').attr('action', action+'/'+id);
                $('#del_car_form').submit();
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/car/car_price.blade.php ENDPATH**/ ?>