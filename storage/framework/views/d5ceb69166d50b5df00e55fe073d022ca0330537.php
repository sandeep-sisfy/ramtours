 <div class="row info_form" >
     <div class="col-md-12">
        <?php echo show_flash_msg(); ?>

        <div class="contact-time-icon"><img src="<?php echo e(url('/assets/front/images')); ?>/contact-form-icon.jpg" alt=""></div>
        <div class="contact-heading">טופס קשר מהיר</div>
        <div class="contact-yellow-border"></div>
        <div class="contact-rtform" lang="he-IL" dir="rtl">
        <form action="<?php echo e(url('submit-contact-page')); ?>" method="post" class="rt_form" id="#contect_form">
          <?php echo e(csrf_field()); ?>

        <div class="term-input-box">
          <input type="text" name="first_name" value="" size="40" class="form-control contact-input" placeholder="*שם פרטי">
           <?php echo get_form_error_msg($errors, 'first_name'); ?>

        </div>
        <div class="term-input-box">
          <input type="text" name="last_name" value="" size="40" class="form-control contact-input" placeholder="*שם משפחה">
          <?php echo get_form_error_msg($errors, 'last_name'); ?>

        </div>
        <div class="term-input-box">         
          <input type="text" name="phone" value="" size="40" class="form-control contact-input" placeholder="*טלפון">
          <?php echo get_form_error_msg($errors, 'phone'); ?>

          </div>
        <div class="term-input-box-last">
          <input type="email" name="email" value="" size="40" class="form-control contact-input" placeholder="*דוא״ל">
           <?php echo get_form_error_msg($errors, 'email'); ?>

        </div>
        <div class="term-textBox">
          <textarea name="message" cols="40" rows="10" class="form-control" placeholder="תוכן הודעה..."></textarea>
          <?php echo get_form_error_msg($errors, 'message'); ?>

        </div>
        <div class="term-select-box">
        <div class="contactselection">
         <select name="interested_in" class="form-control">
          <option value="אני מעוניין במידע על...">אני מעוניין במידע על...</option>
          <option value="חבילת נופש ליער השחור">חבילת נופש ליער השחור  </option>
          <option value="לינה ביער השחור">לינה ביער השחור  </option>
          <option value="חבילת נופש לאוסטריה">חבילת נופש לאוסטריה  </option>
          <option value="צימרים באוסטריה">צימרים באוסטריה  </option>
          <option value="חבילת נופש לאירופה">חבילת נופש לאירופה</option>
          <option value="שייט בעולם">שייט בעולם  </option>
          <option value="טיסה סדירה">טיסה סדירה</option>
          <option value="השכרת רכב בעולם">השכרת רכב בעולם</option>
          <option value="טיול מאורגן לחו&quot;ל">טיול מאורגן לחו"ל</option>
        </select>
        <?php echo get_form_error_msg($errors, 'interested_in'); ?>

       </div>
        <div class="contact-check-box">          
          <div class="checker">
            <span class="">הוסף אותי למועדון לקוחות לצורך קבלת מבצעים ופרסומות</span>
            <input type="checkbox" name="club_member[]" value="הוסף אותי למועדון לקוחות לצורך קבלת מבצעים ופרסומות" >
          </div>
        </div>
        <p><input type="submit" value="שלח" class="contact-submit">
        </p></div>       
       </form>
        </div>     
       </div>
     </div><?php /**PATH /home/eli/ramtours/resources/views/frontend/pages/page_contact.blade.php ENDPATH**/ ?>