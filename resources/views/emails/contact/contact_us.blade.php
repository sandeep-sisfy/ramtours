@component('mail::message')
@component('mail::panel_contact')

@endcomponent

@php
 if(empty($interested_in))
 $interested_in='';
 if(empty($msg))
 $msg='';
@endphp
@component('mail::promotion_contact', ['first_name'=>$first_name, 'email'=>$email, 'last_name'=>$last_name,'interested_in'=>$interested_in,'phone'=>$phone, 'msg'=>$msg])
@endcomponent

@component('mail::subcopy')

@endcomponent
@endcomponent


