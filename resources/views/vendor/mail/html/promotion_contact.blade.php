<table class="promotion" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="right">
            <strong>'שם פרטי : '</strong>{{$first_name}}<br>
            <strong>'שם משפחה : '</strong>{{$last_name}}<br>
            <strong>'דוא"ל : '</strong>{{$email}}<br>
            <strong>' טלפון : '</strong>{{$phone}}<br>
            @if(!empty($interested_in))
            <strong>' מתעניין ב : '</strong>{{$interested_in}}<br>
            @endif
            @if(!empty($msg))
            <strong>'הודעת לקוח : '</strong>{{$msg}}<br>
            @endif
        </td>
    </tr>
</table>