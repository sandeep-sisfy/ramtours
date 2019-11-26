<div id="contact_popup" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">תיצור איתנו קשר</h4>
      </div>
      <div class="modal-body">
        <form id="contact_popup_form">
          <div class="form-group">
            <label class="control-label">שם פרטי <span class="required">*</span></label>
            <input type="text" class="form-control" name="first_name_contact" required="">
          </div>
          <div class="form-group">
            <label class="control-label">שם משפחה <span class="required">*</span></label>
            <input type="text" class="form-control" name="last_name_contact" required="">
          </div>
          <div class="form-group">
            <label class="control-label">דוא"ל <span class="required">*</span></label>
            <input type="email" class="form-control" name="email_contact" equired="">
          </div>
          <div class="form-group">
            <label class="control-label"> מספר טלפון <span class="required">*</span></label>
            <input type="text" class="form-control" name="phone_contact" required="">
          </div>
          <div class="form-group">
            <label class="control-label">הההודעה שלך <span class="required">*</span></label>
            <textarea rows="4" class="form-control" name="msg_contact" required=""></textarea>
          </div>
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"></div>
            @if ($errors->has('g-recaptcha-response'))
            <span class="invalid-feedback" style="display: block;">
              <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group rt_submitbtn">
            <button type="submit" class="btn btn-primary" id="contact_popup_btn">שלח </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>