<?php $__env->startSection('rami_front_container'); ?>
  <section>
    <div class="container">
     <div class="row">
      <div class="col-md-12">
       <div class="inner-page-breadcrum">
    <strong>::</strong> <a href="https://www.ramtours.com/">דף הבית </a>
    <img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt="">
    מינכן <img src="<?php echo e(url('/assets/front/images')); ?>/bread-crum-arrow.png" alt="">
    <strong>פרטי נוסע / </strong>
    </div>
    </div>
  </section>
  <section class="steps">
    <div class="container">
      <div class="row">
        <div class="stepwizard">
          <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
              <a href="#step-1" class="btn">1</a>
              <p>פרטי המוצר     </p>
            </div>
            <div class="stepwizard-step active">
              <a href="#step-2" class="btn active" disabled="disabled">2</a>
              <p>פרטי הנוסעים     </p>
            </div>
            <div class="stepwizard-step">
              <a href="#step-3" class="btn" disabled="disabled">3</a>
              <p>תשלום    </p>
            </div>
            <div class="stepwizard-step last">
              <a href="#step-3" class="btn" disabled="disabled"><img src="<?php echo e(url('/assets/front/images')); ?>/step-check.png" alt=""></a>
              <p>אישור הזמנה  </p>
            </div>
          </div>
       </div>
      </div>
    </div>
  </section>
  <section class="orpassdtl">
    <div class="container">
      <div class="row">
        <form action="<?php echo e(url('/order-passengers')); ?>" method="POST" accept-charset="utf-8" class="form_image" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

       <div class="col-md-12 orpass-sec">
        <ul>
         <li>אנא מלאו את פרטי הנוסעים באנגלית בלבד כפי שמופיעים בדרכונים. </li>
         <li>איות השמות באחריות המזמין/הנוסעים.</li>
         <li>יש לוודא שהדרכונים בתוקף לפחות 6 חודשים ביום הטיסה.</li>
         <li>לטסים לגרמניה ושוויץ נדרש תוקף דרכון 3 חודשים מיום הטיסה חזרה לארץ.</li>
        </ul>
        <?php for($a=1; $adults >= $a; $a++): ?>
          <div class="order-heading col-md-12 pt-3">מבוגר  <?php echo e($a); ?></div>
            <div class="order-input-lines col-md-12">
              <div class="row">
                <div class="col-md-4">
                    <input name="traveller_adult_<?php echo e($a); ?>_name" type="text" class="contact-input" placeholder="*שם פרטי " value="<?php echo e(get_edit_input_pvr_old_value('traveller_adult_'.$a.'_name')); ?>">
                    <?php echo get_form_error_msg($errors, 'traveller_adult_'.$a.'_name'); ?>

                </div>
                <div class="col-md-4">
                    <input name="traveller_adult_<?php echo e($a); ?>_family_name" type="text" class="contact-input" placeholder=" שם משפחה   " value="<?php echo e(get_edit_input_pvr_old_value('traveller_adult_'.$a.'_family_name')); ?>">
                    <?php echo get_form_error_msg($errors, 'traveller_adult_'.$a.'_family_name'); ?>

                </div>
                <div class="col-md-2">
                <div class="orderselection rt_droparrow">
                  <select name="traveller_adult_<?php echo e($a); ?>_sex">
                    <option value="male" <?php echo e(get_edit_select_check_pvr_old_value('traveller_adult_'.$a.'_sex', '', 'male', 'select')); ?> >זכר</option>
                    <option value="female" <?php echo e(get_edit_select_check_pvr_old_value('traveller_adult_'.$a.'_sex', '', 'female', 'select')); ?>>נקבה</option>
                  </select>
                  <?php echo get_form_error_msg($errors, 'traveller_adult_'.$a.'_sex'); ?>

                </div>
              </div>
              </div>
             <div class="row">
              <div class="col-md-12 text-right py-3">תאריך לידה  </div>
              <div class="col-md-6">
                <div class="orderselection rt_droparrow">
                  <select name="traveller_adult_<?php echo e($a); ?>_dob_year">
                     <option value="">שנת לידה</option>
                    <?php for($i=0; $i <= $year_slot_adults; $i++): ?>
                      <option value="<?php echo e(date('Y')-$i); ?>" <?php echo e(get_edit_select_check_pvr_old_value('traveller_adult_'.$a.'_dob_year', '', date('Y')-$i, 'select')); ?>><?php echo e(date('Y')-$i); ?></option>
                    <?php endfor; ?>
                  </select>
                   <?php echo get_form_error_msg($errors, 'traveller_adult_'.$a.'_dob_year'); ?>

                </div>
              </div>
              <div class="col-md-2">
                <div class="orderselection rt_droparrow">
                    <select name="traveller_adult_<?php echo e($a); ?>_dob_month">
                      <option value="">חודש</option>
                     <?php for($i=1; $i <= 12; $i++): ?>
                        <option value="<?php echo e($i); ?>" <?php echo e(get_edit_select_check_pvr_old_value('traveller_adult_'.$a.'_dob_month', '', $i, 'select')); ?>><?php echo e($i); ?></option>
                      <?php endfor; ?>
                    </select>
                    <?php echo get_form_error_msg($errors, 'traveller_adult_'.$a.'_dob_month'); ?>

                </div>
              </div>
              <div class="col-md-2">
                <div class="orderselection rt_droparrow">
                  <select name="traveller_adult_<?php echo e($a); ?>_dob_day">
                    <option value="">יום  </option>
                    <?php for($i=1; $i <= 31; $i++): ?>
                      <option value="<?php echo e($i); ?>" <?php echo e(get_edit_select_check_pvr_old_value('traveller_adult_'.$a.'_dob_day', '', $i, 'select')); ?>><?php echo e($i); ?></option>
                    <?php endfor; ?>
                  </select>
                  <?php echo get_form_error_msg($errors, 'traveller_adult_'.$a.'_dob_day'); ?>

                  </div>
              </div>
            </div>        
          </div>
          <?php endfor; ?>
          <?php for($a=1; $childs >= $a; $a++): ?>
          <div class="order-heading col-md-12 pt-3">ילד   <?php echo e($a); ?></div>
            <div class="order-input-lines col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <input name="traveller_child_<?php echo e($a); ?>_name" type="text" class="contact-input" placeholder="*שם פרטי "value="<?php echo e(get_edit_input_pvr_old_value('traveller_child_'.$a.'_name')); ?>">
                     <?php echo get_form_error_msg($errors, 'traveller_child_'.$a.'_name'); ?>

                </div>
                <div class="col-md-4">
                  <input name="traveller_child_<?php echo e($a); ?>_family_name" type="text" class="contact-input" placeholder=" שם משפחה   " value="<?php echo e(get_edit_input_pvr_old_value('traveller_child_'.$a.'_family_name')); ?>">
                  <?php echo get_form_error_msg($errors, 'traveller_child_'.$a.'_family_name'); ?>

              </div>
              <div class="col-md-2">
                <div class="orderselection rt_droparrow">
                  <select name="traveller_child_<?php echo e($a); ?>_sex">
                    <option value="male">זכר</option>
                    <option value="female">נקבה</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right py-3">תאריך לידה  </div>
                <div class="col-md-6">
                <div class="orderselection rt_droparrow">
                  <select name="traveller_child_<?php echo e($a); ?>_dob_year">
                     <option value="">שנת לידה</option>
                    <?php for($i=0; $i <= $year_slot_childs; $i++): ?>
                      <option value="<?php echo e(date('Y')-$i); ?>" <?php echo e(get_edit_select_check_pvr_old_value('traveller_child_'.$a.'_dob_year', '', date('Y')-$i, 'select')); ?> ><?php echo e(date('Y')-$i); ?></option>
                    <?php endfor; ?>
                  </select>
                  <?php echo get_form_error_msg($errors, 'traveller_child_'.$a.'_dob_year'); ?>

                </div>
              </div>
              <div class="col-md-2">
                <div class="orderselection rt_droparrow">
                    <select name="traveller_child_<?php echo e($a); ?>_dob_month">
                      <option value="">חודש</option>
                     <?php for($i=1; $i <= 12; $i++): ?>
                        <option value="<?php echo e($i); ?>" <?php echo e(get_edit_select_check_pvr_old_value('traveller_child_'.$a.'_dob_month', '', $i, 'select')); ?>><?php echo e($i); ?></option>
                      <?php endfor; ?>
                    </select>
                    <?php echo get_form_error_msg($errors, 'traveller_child_'.$a.'_dob_month'); ?>

                </div>
              </div>
              <div class="col-md-2">
                <div class="orderselection rt_droparrow">
                  <select name="traveller_child_<?php echo e($a); ?>_dob_day">
                    <option value="">יום</option>
                    <?php for($i=1; $i <= 31; $i++): ?>
                      <option value="<?php echo e($i); ?>" <?php echo e(get_edit_select_check_pvr_old_value('traveller_child_'.$a.'_dob_day', '', $i, 'select')); ?>><?php echo e($i); ?></option>
                    <?php endfor; ?>
                  </select>
                   <?php echo get_form_error_msg($errors, 'traveller_child_'.$a.'_dob_day'); ?>

                  </div>
              </div>
            </div>
          </div>
          <?php endfor; ?>
          <?php for($a=1; $infants >= $a; $a++): ?>
          <div class="order-heading col-md-12 pt-3">תינוק  <?php echo e($a); ?></div>
            <div class="order-input-lines col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <input name="traveller_infant_<?php echo e($a); ?>_name" type="text" class="contact-input" placeholder="*שם פרטי "value="<?php echo e(get_edit_input_pvr_old_value('traveller_infant_'.$a.'_name')); ?>">
                     <?php echo get_form_error_msg($errors, 'traveller_infant_'.$a.'_name'); ?>

                </div>
                <div class="col-md-4">
                  <input name="traveller_infant_<?php echo e($a); ?>_family_name" type="text" class="contact-input" placeholder=" שם משפחה   " value="<?php echo e(get_edit_input_pvr_old_value('traveller_infant_'.$a.'_family_name')); ?>">
                  <?php echo get_form_error_msg($errors, 'traveller_infant_'.$a.'_family_name'); ?>

              </div>
              <div class="col-md-2">
                <div class="orderselection rt_droparrow">
                  <select name="traveller_infant_<?php echo e($a); ?>_sex">
                    <option value="male">זכר</option>
                    <option value="female">נקבה</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right py-3">תאריך לידה  </div>
                <div class="col-md-6">
                <div class="orderselection rt_droparrow">
                  <select name="traveller_infant_<?php echo e($a); ?>_dob_year">
                     <option value="">שנת לידה</option>
                    <?php for($i=0; $i <= $year_slot_infants; $i++): ?>
                      <option value="<?php echo e(date('Y')-$i); ?>" <?php echo e(get_edit_select_check_pvr_old_value('traveller_infant_'.$a.'_dob_year', '', date('Y')-$i, 'select')); ?> ><?php echo e(date('Y')-$i); ?></option>
                    <?php endfor; ?>
                  </select>
                  <?php echo get_form_error_msg($errors, 'traveller_infant_'.$a.'_dob_year'); ?>

                </div>
              </div>
              <div class="col-md-2">
                <div class="orderselection rt_droparrow">
                    <select name="traveller_infant_<?php echo e($a); ?>_dob_month">
                      <option value="">חודש</option>
                     <?php for($i=1; $i <= 12; $i++): ?>
                        <option value="<?php echo e($i); ?>" <?php echo e(get_edit_select_check_pvr_old_value('traveller_infant_'.$a.'_dob_month', '', $i, 'select')); ?>><?php echo e($i); ?></option>
                      <?php endfor; ?>
                    </select>
                    <?php echo get_form_error_msg($errors, 'traveller_infant_'.$a.'_dob_month'); ?>

                </div>
              </div>
              <div class="col-md-2">
                <div class="orderselection rt_droparrow">
                  <select name="traveller_infant_<?php echo e($a); ?>_dob_day">
                    <option value="">יום</option>
                    <?php for($i=1; $i <= 31; $i++): ?>
                      <option value="<?php echo e($i); ?>" <?php echo e(get_edit_select_check_pvr_old_value('traveller_infant_'.$a.'_dob_day', '', $i, 'select')); ?>><?php echo e($i); ?></option>
                    <?php endfor; ?>
                  </select>
                   <?php echo get_form_error_msg($errors, 'traveller_infant_'.$a.'_dob_day'); ?>

                  </div>
              </div>
            </div>
          </div>
          <?php endfor; ?>
        <div class="col-md-12">
          <div class="row">
            <div class="order-heading cht-head pt-3 col-md-12">פרטי הגורם המשלם</div>
          </div>
          <div class="row">
            <div class="checkoutbox col-md-5">
              <input name="payer_firstname" type="text" class="contact-input" placeholder="*שם פרטי"  value="<?php echo e(get_edit_input_pvr_old_value('payer_firstname')); ?>">
               <?php echo get_form_error_msg($errors, 'payer_firstname'); ?>

            </div>
            <div class="checkoutbox col-md-5">
              <input name="payer_surname" type="text" class="contact-input" placeholder="*שם משפחה" value="<?php echo e(get_edit_input_pvr_old_value('payer_surname')); ?>">
              <?php echo get_form_error_msg($errors, 'payer_surname'); ?>

            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="check-b1"><input name="payer_home_phone" type="number" class="contact-input" placeholder="טלפון" value="<?php echo e(get_edit_input_pvr_old_value('payer_home_phone')); ?>" maxlength="7" >
                <?php echo get_form_error_msg($errors, 'payer_home_phone'); ?>

              </div>
              <div class="check-b2 rt_droparrow">
                <select name="home_code">
                  <option value="">בחר</option>
                  <option value="02" <?php echo e(get_edit_select_check_pvr_old_value('home_code', '', '02', 'select')); ?>>02</option>
                  <option value="03" <?php echo e(get_edit_select_check_pvr_old_value('home_code', '', '03', 'select')); ?>>03</option>
                   <option value="04" <?php echo e(get_edit_select_check_pvr_old_value('home_code', '', '03', 'select')); ?>>04</option>
                  <option value="08" <?php echo e(get_edit_select_check_pvr_old_value('home_code', '','08', 'select')); ?>>08</option>
                  <option value="09" <?php echo e(get_edit_select_check_pvr_old_value('home_code', '', '09', 'select')); ?>>09</option>
                  <option value="072" <?php echo e(get_edit_select_check_pvr_old_value('home_code', '', '072', 'select')); ?>>072</option>
                  <option value="073" <?php echo e(get_edit_select_check_pvr_old_value('home_code', '', '073', 'select')); ?>>073</option>
                  <option value="074" <?php echo e(get_edit_select_check_pvr_old_value('home_code', '', '074', 'select')); ?>>074</option>
                  <option value="075" <?php echo e(get_edit_select_check_pvr_old_value('home_code', '', '075', 'select')); ?>>075</option>
                  <option value="076" <?php echo e(get_edit_select_check_pvr_old_value('home_code', '', '076', 'select')); ?>>076</option>
                  <option value="077" <?php echo e(get_edit_select_check_pvr_old_value('home_code', '', '077', 'select')); ?>>077</option>
                </select>
                <?php echo get_form_error_msg($errors, 'home_code'); ?>

              </div>
              <div class="clear"></div>
          </div>
            <div class="col-md-4">
              <div class="check-b1"><input name="payer_mobile_phone" type="number" class="contact-input" placeholder="נייד" maxlength="7" value="<?php echo e(get_edit_input_pvr_old_value('payer_mobile_phone')); ?>">
                 <?php echo get_form_error_msg($errors, 'payer_mobile_phone'); ?>

              </div>
              <div class="check-b2">
              <div class="checkoutselection rt_droparrow">
              <select name="mobile_code">
                <option value="">בחר</option>
                <option value="022" <?php echo e(get_edit_select_check_pvr_old_value('mobile_code', '', 22, 'select')); ?>>022</option>
                <option value="050" <?php echo e(get_edit_select_check_pvr_old_value('mobile_code', '', 50, 'select')); ?>>050</option>
                <option value="052" <?php echo e(get_edit_select_check_pvr_old_value('mobile_code', '', 52, 'select')); ?>>052</option>
                <option value="053" <?php echo e(get_edit_select_check_pvr_old_value('mobile_code', '', 53, 'select')); ?>>053</option>
                <option value="054" <?php echo e(get_edit_select_check_pvr_old_value('mobile_code', '', 54, 'select')); ?>>054</option>
                <option value="055" <?php echo e(get_edit_select_check_pvr_old_value('mobile_code', '', 55, 'select')); ?>>055</option>
                <option value="057" <?php echo e(get_edit_select_check_pvr_old_value('mobile_code', '', 57, 'select')); ?>>057</option>
                <option value="058" <?php echo e(get_edit_select_check_pvr_old_value('mobile_code', '', 58, 'select')); ?>>058</option>
                <option value="066" <?php echo e(get_edit_select_check_pvr_old_value('mobile_code', '', 66, 'select')); ?>>066</option>
                <option value="088" <?php echo e(get_edit_select_check_pvr_old_value('mobile_code', '', 88, 'select')); ?>>088</option>
              </select>
              <?php echo get_form_error_msg($errors, 'mobile_code'); ?>

              </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="col-md-4">
              <input name="payer_email" type="email" class="contact-input" placeholder="*דוא״ל" value="<?php echo e(get_edit_input_pvr_old_value('payer_email')); ?>">
              <?php echo get_form_error_msg($errors, 'payer_email'); ?>

            </div>
          </div>  
          <div class="row">
            <div class="col-md-4">
            <input name="payer_address" type="text" class="contact-input" placeholder="*כתובת"   value="<?php echo e(get_edit_input_pvr_old_value('payer_address')); ?>">
            <?php echo get_form_error_msg($errors, 'payer_address'); ?>

           </div>
           <div class="col-md-4">
            <input name="payer_city" type="text" class="contact-input" placeholder="*עיר / ישוב"  value="<?php echo e(get_edit_input_pvr_old_value('payer_city')); ?>">
            <?php echo get_form_error_msg($errors, 'payer_city'); ?>

          </div>
          <div class="col-md-4">
            <input name="payer_zipcode" type="number" class="contact-input" placeholder="מיקוד" value="<?php echo e(get_edit_input_pvr_old_value('payer_zipcode')); ?>">
            <?php echo get_form_error_msg($errors, 'payer_zipcode'); ?>

          </div>
          </div>        
           <div class="clear"></div>
           <div class="contact-border"></div>
           <div class="row">
             <div class="col-md-12">
               <p class="order-font12">+ באחריותך לקרוא את תנאי השימוש באתר ואת כל התנאים וההגבלות לגבי הזמנתך<br>
                + מסמכי הנסיעה יתקבלו בדואר אלקטרוני, במקרה הצורך יתואם איסוף המסמכים מבית ״רם נסיעות ותיירות״</p>
                <div class="checkout-checkbox">
                <div class="filter_cont custom-control custom-checkbox">
                   <input type="checkbox" class="custom-control-input" id="chk-b1" name="payer_terms" value="1" <?php echo e(get_edit_select_check_pvr_old_value('payer_terms', '', 1, 'check')); ?>>
                   <label class="custom-control-label" for="chk-b1">מאשר/ת שקראתי ומסכים לכל תנאי העסקה בהזמנה זו. </label>
                   <?php echo get_form_error_msg($errors, 'payer_terms'); ?>

                </div>
                </div>
                <div class="checkout-checkbox">
                  <div class="pay_now_cont" style="margin-top: 20px;">
                      <input type="radio" name="pay_partical" value="0" checked="checked">אני רוצה לשלם את מלוא הסכום בכרטיס אשראי כעת  <br>
                      <input type="radio" name="pay_partical" value="1">אני רוצה לשלם מקדמה של 200 כרגע ולשמור את ההזמנה , ואת יתרת התשלום להשלים מיידית טלפונית עם נציג רם נסיעות.
                      <p>את היתרה אפשר להשלים טלפונית בכרטיס אשראי עד 3 תשלומים ללא ריבית ,או במזומן במשרדנו או בהעברה לחשבון בנק הפועלים סניף 552 חשבון 27040 .</p>
                  </div>
                   <div class="filter_cont custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" id="chk-b2" name="payer_news_letter">
                     <label class="custom-control-label" for="chk-b2">  הוסף אותי למועדון לקוחות לצורך קבלת מבצעים ופרסומות
                     </label>
                  </div>
              </div>
          <div class="checkout-button"><input name="" type="submit" value="המשך להזמנה" class="checkout-submit"></div>
             </div>
           </div>


      </div>
    </form>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.home_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eli/ramtours/resources/views/frontend/pages/order_passangers.blade.php ENDPATH**/ ?>