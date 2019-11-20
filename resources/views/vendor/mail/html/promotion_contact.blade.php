<table class="promotion" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="right">
            <strong>'ששם פרטי  : '</strong>{{$first_name}}<br>
            <strong>'ששם משפחה  : '</strong>{{$last_name}}<br>
            <strong>'שדוא"ל : '</strong>{{$email}}<br>
            <strong>'שמכשיר טלפון : '</strong>{{$phone}}<br>
            @if(!empty($interested_in))
            <strong>'שאינטרס לקוחות   : '</strong>{{$interested_in}}<br> 
 			@endif
 			 @if(!empty($interested_in))
            <strong>'הודעת לקוח  : '</strong>{{$msg}}<br> 
 			@endif
        </td>
    </tr>
</table>
