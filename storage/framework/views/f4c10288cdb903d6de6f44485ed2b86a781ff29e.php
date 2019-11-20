<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body dir="rtl">
    <style>
        td.header {padding: 0!important;}
        td.header a {top: -16px!important;}
        table.wrapper{width:100%;}
        table.content{width:100%;}
        table.inner-body{width:100%;}
        table.footer{width:100%;}
        /*@media  only screen and (max-width: 600px) {
             table.wrapper{width:100%;}
            .inner-body {width: 100% !important;}
            .footer {width: 100% !important;}
        }
        @media  only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }*/
    </style>
<div class="table table-responsive">
    <table  class="wrapper" cellpadding="0" cellspacing="0" role="presentation" style="margin:0 auto">
        <tr>
            <td align="center">
                <table class="content" cellpadding="0" cellspacing="0" role="presentation">
                    <?php echo e($header ?? ''); ?>


                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" cellpadding="0" cellspacing="0" role="presentation">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        <?php echo e(Illuminate\Mail\Markdown::parse($slot)); ?>


                                        <?php echo e($subcopy ?? ''); ?>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <?php echo e($footer ?? ''); ?>

                </table>
            </td>
        </tr>
    </table>
    </div>
</body>
</html>
<?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/vendor/mail/html/layout.blade.php ENDPATH**/ ?>