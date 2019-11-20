<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <style type="text/css">
            @media  print
            {@page
               {margin:0 !important;padding:0;size:1560px 2040px;}
             }
            table{margin:0;padding:0;border-spacing:0;}
            table.order_pdf td h2{font-size:23px!important;margin-top:5px;}
            table.order_pdf td p{font-size:17px;font-weight:normal;}
            table.order_inner td.order_inner_head{font-weight:bold;border-top:1px solid #ccc;border-bottom:1px solid #ccc;}
            table.order_inner{width:100%;padding:5px;}
            table.info_side{width:100%;}
            td.order_heading.side h2{padding:15px;font-size:18px!important;font-weight:bold;}
            td.order_heading.side p{padding:0 15px;}
            table.order_total{width:100%;padding-top:10px;}
            table.order_total td{font-size:13px;font-weight:600;padding:5px 0!important;}
            span.rt_tmm{font-size: 16px!important;color:#000!important;margin-bottom:0;font-weight:600;display:block;}
            table.info_side td.order_inner_head {font-weight: bold;padding: 4px 10px;border-top: 1px solid #ccc!important;border-bottom: 1px solid #ccc!important;}
            table.c_details,table.cust_info{border-top:1px solid #ccc;border-right: 1px solid #ccc;border-bottom: 1px solid #ccc;}
            table.c_details td,table.cust_info td {border-left: 1px solid #ccc;}
            span.fltt-info {font-weight: bold;}
        </style>
   </head>
   <body>
       <table class="order_pdf" border="0" cellspacing="0">
          <tbody>
            <tr>
               <td>
                  <h2>פרטי הזמנה:  -<?php echo e($title); ?> </h2>
                  <p>מסמך זה אינו מהווה אישור סופי להזמנתך, הזמנתך כרוכה באישור סופי מול ספקי התיירות וחברת התעופה, נציגי רם נסיעות ותיירות יחזרו אליכם תוך 48
                     שעות לאישורה הסופי  
                  </p>
               </td>
            </tr>
            <tr>
               <td colspan="2" valign="middle">
                  <table style="padding:10px 0 5px 0;">
                   <tr>
                     <td width="40" height="40"><img width="40" height="40" src="<?php echo e(base_path().'/public/assets/pdf/images/passenger.png'); ?>" class="img-fluid" alt="">
                    </td>
                    <td align="right" height="40"><h2 style="line-height:30px"> פרטי הנוסעים </h2> </td>
                      </tr>
                  </table>
               </td>
            </tr>
            <tr>
              <td width="69%" style="border: 1px solid #ccc;">
                     <table class="order_inner" width="100%" cellspacing="0" border="0">
                            <tbody>
                                <?php $__currentLoopData = $pack_passenger['adults']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td class="order_inner_head" colspan="4">
                                     מבוגרים  <?php echo e(++$loop->index); ?>

                                   </td>
                                </tr>
                                <tr>
                                      <td width="40%">
                                        <strong>שם הנוסע   </strong><br />
                                        <span class="order_inner_data"><?php echo e($adult['name']); ?></span>
                                      </td>
                                      <td width="20%">
                                        <strong>שם משפחה  </strong><br>
                                        <span class="order_inner_data"><?php echo e($adult['family_name']); ?> </span>
                                      </td>

                                      <td width="20%">
                                        <strong>ממין </strong><br />
                                         <?php if($adult['sex'] == 'male'): ?>
                                            זכר
                                         <?php else: ?>
                                            נקבה
                                         <?php endif; ?>
                                      </td>
                                      <td width="20%">
                                        <strong>תאריך לידה  </strong><br />
                                         <?php echo e($adult['dob_day'].'-'.$adult['dob_month'].'-'.$adult['dob_year']); ?>

                                      </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $pack_passenger['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td class="order_inner_head" colspan="4">
                                     ילדים  <?php echo e(++$loop->index); ?>

                                   </td>
                                </tr>
                                <tr>
                                      <td width="40%">
                                        <strong>שם הנוסע   </strong><br />
                                        <span class="order_inner_data"><?php echo e($child['name']); ?></span>
                                      </td>
                                      <td width="20%">
                                        <strong>שם משפחה  </strong><br>
                                        <span class="order_inner_data"><?php echo e($child['family_name']); ?> </span>
                                      </td>

                                      <td width="20%">
                                        <strong>ממין </strong><br />
                                         <?php if($child['sex'] == 'male'): ?>
                                            זכר
                                         <?php else: ?>
                                            נקבה
                                         <?php endif; ?>
                                      </td>
                                      <td width="20%">
                                        <strong>תאריך לידה  </strong><br />
                                         <?php echo e($child['dob_day'].'-'.$child['dob_month'].'-'.$child['dob_year']); ?>

                                      </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php if(!empty($pack_passenger['infants'])): ?>
                                 <?php $__currentLoopData = $pack_passenger['infants']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td class="order_inner_head" colspan="4">
                                     תינוק  <?php echo e(++$loop->index); ?>

                                   </td>
                                </tr>
                                <tr>
                                      <td width="40%">
                                        <strong>שם הנוסע   </strong><br />
                                        <span class="order_inner_data"><?php echo e($infant['name']); ?></span>
                                      </td>
                                      <td width="20%">
                                        <strong>משם משפחה  </strong><br>
                                        <span class="order_inner_data"><?php echo e($infant['family_name']); ?> </span>
                                      </td>

                                      <td width="20%">
                                        <strong>ממין </strong><br />
                                         <?php if($infant['sex'] == 'male'): ?>
                                            זכר
                                         <?php else: ?>
                                            נקבה
                                         <?php endif; ?>
                                      </td>
                                      <td width="20%">
                                        <strong>תאריך לידה  </strong><br />
                                         <?php echo e($infant['dob_day'].'-'.$infant['dob_month'].'-'.$infant['dob_year']); ?>

                                      </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                     </table>
              </td>
              <td valign="top" width="31%" cellspacing="0" cellpadding="0" bgcolor="#e8e8ea" style="border-width: 1px 0 1px 1px;border-style: solid;border-color:#ccc;">
                             <table class="info_side order_inner" border="0" cellspacing="0" width="100%">
                                 <tbody>
                                 <tr>
                                    <td colspan="2" class="order_inner_head">מספר נוסעים  </td>
                                 </tr>
                                 <tr>
                                    <td width="50%"><strong>מבוגרים : </strong></td>
                                    <td width="50%"><?php echo e($adults); ?></td>
                                 </tr>
                                 <tr>
                                    <td><strong>ילדים : </strong></td>
                                    <td><?php echo e($kids); ?></td>
                                 </tr>
                                 <tr>
                                    <td><strong>תינוקות  </strong></td>
                                    <td><?php echo e($infants); ?></td>
                                 </tr>

                                 <tr>
                                   <td colspan="2" class="order_inner_head">פרטים כלליים  </td>
                                 </tr>
                                 <tr>
                                    <td><strong>תאריך ההזמנה  : </strong></td>
                                    <td><?php echo e($order_date); ?></td>
                                 </tr>
                                 <tr>
                                    <td><strong>סוג הזמנה  : </strong></td>
                                    <td><?php echo e($order_type); ?> </td>
                                 </tr>                                 
                              </tbody></table>
                           </td>
                  </tr>
        </tbody>
      </table>
    </body>
  </html>
<?php /**PATH /home/newssurl/domains/new.s248.upress.link/public_html/resources/views/pdf/passenger.blade.php ENDPATH**/ ?>