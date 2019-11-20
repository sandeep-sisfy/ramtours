
<?php $__env->startSection('edit_page_id', '/'.$page->id); ?>
<?php $__env->startSection('nav-tabs'); ?>
    <li class="nav-item"><a class="nav-link active"  href="javascript:void(0)" data-toggle="tab">page Info</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='<?php echo e(url('admin/page-meta/'.$page->id)); ?>'">Meta data</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('method_field'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_img'); ?>
<?php if(!empty($page->page_img)): ?>
<div class="form-group">
    <label for="previous">Car Image: </label>
	<img src="<?php echo e(rami_get_file_url($page->page_img)); ?>" width="75" height="75" alt="page Image">
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_other_link'); ?>
	<div class="form-group form-float">
        <label class="profit">Page having right side Links : </label>
        <input type="radio" name="is_having_link" id="having_link" class="with-gap radio-col-amber page_link_radio" value="1" <?php echo get_edit_select_check_pvr_old_value_with_obj('is_having_link',$page,'is_having_link',1, 'chacked'); ?>>
        <label for="having_link" class="m-l-10 m-r-10">yes</label>
        <input type="radio" name="is_having_link"  id="not_having_link" class="with-gap radio-col-amber page_link_radio" value="0" <?php echo get_edit_select_check_pvr_old_value_with_obj('is_having_link',$page,'is_having_link',0, 'chacked'); ?>>
        <label for="not_having_link" class="m-l-10 m-r-10">No</label>
        <?php echo get_form_error_msg($errors, 'is_having_link'); ?>

    </div>
    <a class="btn btn-success btn-primary waves-effect m-t-20 
     m-r-10 m-l-10 add_link_btn" href="<?php echo e(url('/admin/pagelink/'.$page->id)); ?>" style="display: none;" target="_blank">Add Links
    </a> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admin_jscript'); ?>
##parent-placeholder-2d0251e083d4100c37156c98d7aab22e7bea6042##
    <script type="text/javascript">
    	$(document).ready(function() {
    		$('.page_link_radio').click(function(event) {
	            if($(this).val() == 1){
	                $('.add_link_btn').slideDown('slow');
	            }else{
	                $('.add_link_btn').slideUp('slow'); 
	            }
       		});
    	});
    	
    </script>       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.page.add_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/admin/page/edit_page.blade.php ENDPATH**/ ?>