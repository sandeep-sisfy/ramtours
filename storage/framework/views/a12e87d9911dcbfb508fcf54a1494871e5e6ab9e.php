<?php $__env->startComponent('mail::message'); ?>
<?php $__env->startComponent('mail::panel_review'); ?>

<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('mail::promotion_review', ['first_name'=>$request->first_name, 'email'=>$request->email, 'last_name'=>$request->last_name,'title'=>$request->title, 'remark'=>$request->remark, 'link'=>$link]); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::subcopy'); ?>

<?php echo $__env->renderComponent(); ?>
<?php echo $__env->renderComponent(); ?>

<?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/emails/review/review.blade.php ENDPATH**/ ?>