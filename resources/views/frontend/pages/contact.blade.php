@extends('frontend.home_main')
@section('rami_front_container')
<section class="rt_frames">
  <div class="container">
    <div class="row contact-heading-box">
      <div class="col-md-6">
        <p>צור קשר</p>
      </div>
      <div class="col-md-6"><img src="{{url('/assets/front/images')}}/map-icon.jpg" alt=""></div>
    </div>
  </div>
</section>
<section class="rt_frames">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="contact-content">
          <div class="contact-content-inner">
            <div class="content-right col-md-6">
              <div class="contact-time-icon">
                <img src="https://www.ramtours.com/wp-content/themes/ramtours/images/contact-form-icon.jpg" alt="">
              </div>
              <div class="contact-heading">טופס קשר מהיר</div>
              <div class="contact-yellow-border"></div>
              {!!show_flash_msg()!!}
              <div class="contact-rtform" lang="he-IL" dir="rtl">
                <form action="{{ url('submit-contact')}}" method="post" class="rt_form">
                  {{ csrf_field() }}
                  <div class="contact-input-box">
                    <input type="text" name="first_name" value="" size="40" class="form-control contact-input"
                      placeholder="*שם פרטי">
                    {!! get_form_error_msg($errors, 'first_name') !!}
                  </div>
                  <div class="contact-input-box-left">
                    <input type="text" name="last_name" value="" size="40" class="form-control contact-input"
                      placeholder="*שם משפחה">
                    {!! get_form_error_msg($errors, 'last_name') !!}
                  </div>
                  <div class="contact-input-box">
                    <input type="text" name="phone" value="" size="40" class="form-control contact-input"
                      placeholder="*טלפון">
                    {!! get_form_error_msg($errors, 'phone') !!}
                  </div>
                  <div class="contact-input-box-left">
                    <input type="email" name="email" value="" size="40" class="form-control contact-input"
                      placeholder="*דוא״ל">
                    {!! get_form_error_msg($errors, 'email') !!}
                  </div>
                  <div class="contact-input-box clear"></div>
                  <div class="xcontact-input-box">
                    <textarea rows="4" class="form-control" name="msg_contact"></textarea>
                  </div>
                  <div class="clear"></div>
                  <div class="contactselection">
                    <select name="interested_in" class="form-control wpcf7-select">
                      <option value="">אני מעוניין במידע על...</option>
                      <option value="חבילת נופש ליער השחור">חבילת נופש ליער השחור</option>
                      <option value="לינה ביער השחור">לינה ביער השחור</option>
                      <option value="חבילת נופש לאוסטריה">חבילת נופש לאוסטריה</option>
                      <option value="צימרים באוסטריה">צימרים באוסטריה</option>
                      <option value="חבילת נופש לאירופה">חבילת נופש לאירופה</option>
                      <option value="שייט בעולם">שייט בעולם</option>
                      <option value="טיסה סדירה">טיסה סדירה</option>
                      <option value="השכרת רכב בעולם">השכרת רכב בעולם</option>
                      <option value="טיול מאורגן לחו&quot;ל">טיול מאורגן לחו"ל</option>
                      <option value="חבילות נופש להולנד">חבילות נופש להולנד</option>
                      <option value="לינה בהולנד">לינה בהולנד</option>
                      <option value="כפרי נופש בהולנד">כפרי נופש בהולנד</option>
                    </select>
                    {!! get_form_error_msg($errors, 'interested_in') !!}
                  </div>
                  <div class="clear"></div>
                  <div class="contact-check-box">
                    <span class="check_label">הוסף אותי למועדון לקוחות לצורך קבלת מבצעים ופרסומות</span>
                    <input type="checkbox" name="checkbox-11"
                      value="הוסף אותי למועדון לקוחות לצורך קבלת מבצעים ופרסומות" style="opacity: 1;">
                  </div>
                  <input type="submit" value="שלח" class="wpcf7-form-control wpcf7-submit contact-submit"><span
                    class="ajax-loader">
              </div>
              </form>
            </div>
            <div class="contact-left col-md-6">
              <div class="content-height">
                <div class="contact-time-icon"><img src="{{url('/assets/front/images')}}/location-icon.jpg" alt="">
                </div>
                <div class="contact-heading">כתובתנו</div>
                <div class="contact-yellow-border"></div>
                <div class="contact-content-box">
                  <p class="font16">גוש עציון 11 גבעת שמואל קומה 6</p>
                </div>
              </div>
              <div class="contact-border"></div>
              <div class="urgent-call">
                <div class="urgent-call-icon"><img src="{{url('/assets/front/images')}}/email-icon.jpg" alt=""></div>
                <div class="contact-content-box"> ליצירת קשר מהיר מלאו הטופס או פנו ישירות במייל:<br>
                  <div class="contact-number"><a href="mailto:contact@ramtours.com">contact@ramtours.com</a></div>
                </div>
              </div>
            </div>
            <div class="clear"></div>
            <div class="contact-border"></div>
            <div class="content-right col-md-6">
              <div class="content-height">
                <div class="contact-time-icon"><img src="{{url('/assets/front/images')}}/contact-time-icon.jpg" alt="">
                </div>
                <div class="contact-heading">זמני פעילות</div>
                <div class="contact-yellow-border"></div>
                <div class="contact-content-box">
                  <p class="font16">להלן שעות הפעילות שלנו במשרד: <br>
                    וימים א-ה | 09:00-17:00 <br>
                    יום ו' | 08:00-12:30 <br>
                    (קבלת קהל בתיאום מראש בלבד )
                  </p>
                </div>
              </div>
              <div class="contact-border"></div>
              <!-- <div class="urgent-call">
                <div class="urgent-call-icon"><img src="{{url('/assets/front/images')}}/phone-icon.jpg" alt=""></div>
                <div class="contact-content-box">
                  <span>*</span> כאשר המשרד סגור ובמקרים דחופים, ניתן להתקשר למספר<br>
                  <div style="display: inline-block" class="contact-number">072-372-6240</div>
                  <p style="display:inline;">ולהשאיר הודעה וסוכן תורן יתקשר בחזרה בהקדם</p>
                </div>
              </div>
              <div class="border-phone"></div> -->
            </div>
            <div class="contact-left col-md-6">
              <div class="contact-time-icon"><img src="{{url('/assets/front/images')}}/i-icon.png" alt=""></div>
              <div class="contact-heading">שירות לקוחות</div>
              <div class="contact-yellow-border"></div>
              <p>היכן בוצעה ההזמנה? <br>
                אם בסניף - לאחר הזמנה, ולכל שאלה, תוכלו ליצור קשר בו עמנו בנוגע להזמנתכם, בשעות הפעילות.
                אם באמצעות האתר או במוקד הטלפוני-&nbsp;&nbsp;לאחר הזמנה לטיסה/נופש לחו"ל, ולכל שאלה צרו קשר עם מוקד
                השירות
                072-372-6240 בשעות הפעילות.
              </p>
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>

  </div>
  </div>
</section>
@endsection