
<?php $__env->startSection('title',$page_title); ?>
<?php $__env->startSection('title_breadcrumb',$page_title); ?>
<?php $__env->startSection('admin_head_css'); ?>
##parent-placeholder-5cdaf8ddda74bde1a4675b99e419826ff2556f48##
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="<?php echo e($assets_admin); ?>/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_container'); ?>
    <div class="container-fluid">
        <?php
            if($payment_status=''){
                $payment_status='';
            }
        ?>
        <?php echo show_flash_msg(); ?>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card order_list">
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>CardCom Deal Number</th>
                                    <th>Transection Id</th>
                                    <th>Customer Names</th>
                                    <th>Payment Status</th>
                                    <th>Total Amount</th>
                                    <th>Amount Paid</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$loop->index); ?></td>
                                    <td><span class="text-muted"><?php echo e(date('d-M-Y' , strtotime($order->created_at))); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($order->internal_deal_number); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($order->tran_id); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($order->payee_name); ?></span></td>
                                    <?php
                                    if($order->payment_status=='1'){
                                        $payment_status='success';
                                    }elseif($order->payment_status=='2'){
                                        $payment_status='pending';
                                    }elseif($order->payment_status=='3'){
                                        $payment_status='failed';
                                    }elseif($order->payment_status=='4'){
                                        $payment_status='Partial Payment';
                                    }
                                    ?>
                                    <td><span class="text-muted"><?php echo e($payment_status); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($order->total_amount_skl); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($order->amount_paid_in_skl); ?></span></td>
                                    <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href=<?php echo e(url('admin/orders-detail/'.$order->id.'/edit')); ?> class="btn btn-default waves-effect waves-float waves-green">
                                            <i class="zmdi zmdi-edit" title="Edit order status"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red order_del_btn" item_id='<?php echo e($order->id); ?>'>
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
                <form id='del_order_form' method="POST" action="<?php echo e(url('admin/orders-detail')); ?>" style="display: none">
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
        $('.pack_table').DataTable();
        $('.order_list').on('click', '.order_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
           if(confirm('Are you sure to delete this Order Details.')){   
             var action=$('#del_order_form').attr('action');
             $('#del_order_form').attr('action', action+'/'+id);
             $('#del_order_form').submit();
           }
        });
        $('.order_list').on('click', '.get_shiping_billing_add', function(event) {
           var order_id=$(this).attr('order_id');
           $.ajax({
               url: '<?php echo e(url("/admin/orders-detail/get_billing_shipping")); ?>',
               type: 'POST',
               data: {_token: $('input[name=_token]').val(), order_id:order_id,type:1},
           })
           .done(function(res) {
              $('#shipp_bill_model_body').empty();
               $('#shipp_bill_model_body').append(res);
               $('#shipp_bill_model').modal('show');
           })
           .fail(function() {
               alert('somrthing Went Wrong');
           })
           
        });
        
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/admin/order/all_order.blade.php ENDPATH**/ ?>