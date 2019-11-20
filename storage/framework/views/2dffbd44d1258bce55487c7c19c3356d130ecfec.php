<table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation" dir="rtl">
    <tr>
        <td>
            <?php echo e(Illuminate\Mail\Markdown::parse($slot)); ?>

	        Thanks,<br>
			<?php echo e(config('app.name')); ?>

        </td>
    </tr>
</table>
<?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/vendor/mail/html/subcopy.blade.php ENDPATH**/ ?>