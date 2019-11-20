
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
                <div class="card page_lists">
                    <div class="header">
                       <h4>Pages&nbsp;<span class="badge badge-primary"><?php echo e($all_count); ?></span></h4>
                       <button type="button" class="btn btn-raised btn-primary waves-effect rami_admin_add_new_btn"><a href="<?php echo e(url('admin/page/create')); ?>">Add Page</a></button>
                       
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable pack_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                     <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
                                <tr>
                                    <td><?php echo e(++$loop->index); ?></td>  
                                    <td><span class="text-muted"><?php echo e($page->page_title); ?></span></td>
                                    <td><span class="text-muted"><?php echo e($page->slug); ?></span></td>
                                    <?php
                                    if ($page->page_status == '1') {
                                        $page_status = 'Active';
                                    } elseif ($page->page_status == '0') {
                                        $page_status = 'Deactive';
                                    }else {
                                        $page_status = '';
                                    }
                                    ?>
                                    <td><span class="text-muted"><?php echo e($page_status); ?></span></td>
                                    <td>
                                        <?php if($page->page_status == '1'): ?> 
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a target="_blank" href="<?php echo e(url($page->id)); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="material-icons" title="view" style="top:0px">pageview</i>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a href="<?php echo e(url('admin/page/'.$page->id.'/edit')); ?>" class="btn btn-default waves-effect waves-float waves-green">
                                                <i class="zmdi zmdi-edit" title="Edit"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group">
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red page_del_btn" item_id="<?php echo e($page->id); ?>">
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
                <form id='del_page_form' method="POST" action="<?php echo e(url('admin/page')); ?>" style="display: none">
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
        $('.page_lists').on('click', '.page_del_btn', function(event) {
            event.preventDefault();           
            var id= $(this).attr('item_id');
            if(confirm('Are you sure to delete this page.')){   
             var action=$('#del_page_form').attr('action');
             $('#del_page_form').attr('action', action+'/'+id);
             $('#del_page_form').submit();
           }
        });
        $('.pack_table').DataTable();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/admin/page/all_page.blade.php ENDPATH**/ ?>