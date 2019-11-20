<table class="promotion" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="right">
            <?php echo e(Illuminate\Mail\Markdown::parse($slot)); ?>

            <strong>'שם המשלם  : '</strong><?php echo e($payee_name); ?><br>
            <strong>'שדוא"ל המשלם   : '</strong><?php echo e($email); ?><br>
            <?php if(!empty($start_date)): ?>
            <strong>'שתאריך התחלה   : '</strong><?php echo e($start_date); ?><br>
            <?php endif; ?>
            <?php if(!empty($end_date)): ?>
            <strong>'שתאריך סיום : '</strong><?php echo e($end_date); ?><br>
            <?php endif; ?>
            <strong>'שרכיבי החבילה   : '</strong><?php echo e($pakage_components); ?><br>
            <strong>'שעמים  : '</strong><?php echo e($total_peoples); ?><br>
            <strong>'מבוגרים  : '</strong><?php echo e($adults); ?><br>
            <strong>'ילדים   : '</strong><?php echo e($childs); ?><br>
            <strong>'מזהה עסקה  1  : '</strong><?php echo e($tran1); ?><br>
            <strong>'מזהה עסקה  2  : '</strong><?php echo e($tran2); ?><br>
            <strong>'סה"כ מחיר בשקלים  : '</strong>₪<?php echo e($total_price_in_skl); ?><br>
            <strong>'סה"כ מחיר ביורו   : '</strong>€<?php echo e($total_price_in_euro); ?><br>
            <strong>'שולמו באתר באשראי  : '</strong>₪<?php echo e($amount_paid_in_skl); ?><br>
            <?php if(!empty($remaining_amount_in_skl)): ?>
            <strong>'כמות שנותרה  : '</strong>₪<?php echo e($remaining_amount_in_skl); ?><br>
            <?php endif; ?>
        </td>
    </tr>
</table>
<?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/vendor/mail/html/promotion.blade.php ENDPATH**/ ?>