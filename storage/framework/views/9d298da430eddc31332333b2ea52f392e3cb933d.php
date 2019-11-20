<table class="panel" width="100%" cellpadding="0" cellspacing="0" role="presentation" dir="rtl">
    <tr>
        <td class="panel-content">
            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td class="panel-item" style="margin:10px">
                         ה יקר, <?php echo e($payee_name); ?> <<?php echo e($email); ?>><br>
                         ההזמנה שלך הושלמה, נא למצוא את ההזמנה שלך מכה:
                        <?php echo e(Illuminate\Mail\Markdown::parse($slot)); ?>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/vendor/mail/html/panel.blade.php ENDPATH**/ ?>