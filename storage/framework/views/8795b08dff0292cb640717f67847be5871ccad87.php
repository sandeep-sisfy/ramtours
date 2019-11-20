<?php $__env->startComponent('mail::message'); ?>


<?php $__env->startComponent('mail::panel',['payee_name'=>$payee_name, 'email'=>$email]); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::promotion', ['payee_name'=>$payee_name, 'email'=>$email, 'tran1'=>$tran1,'tran2'=>$tran2,'start_date'=>$start_date, 'end_date'=>$end_date,'pakage_components'=>$pakage_components,'adults'=>$adults,'childs'=>$childs, 'total_peoples'=>$total_peoples, 'total_price_in_skl'=>$total_price_in_skl, 'total_price_in_euro'=>$total_price_in_euro, 'amount_paid_in_skl'=>$amount_paid_in_skl, 'remaining_amount_in_skl'=>$remaining_amount_in_skl]); ?>
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('mail::subcopy'); ?>

<?php echo $__env->renderComponent(); ?>
<?php echo $__env->renderComponent(); ?>


<?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/emails/orders/order_completed.blade.php ENDPATH**/ ?>