<table class="promotion" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="right">
            {{ Illuminate\Mail\Markdown::parse($slot) }}
            <strong>'שם המשלם  : '</strong>{{$payee_name}}<br>
            <strong>'שדוא"ל המשלם   : '</strong>{{$email}}<br>
            @if(!empty($start_date))
            <strong>'שתאריך התחלה   : '</strong>{{$start_date}}<br>
            @endif
            @if(!empty($end_date))
            <strong>'שתאריך סיום : '</strong>{{$end_date}}<br>
            @endif
            <strong>'שרכיבי החבילה   : '</strong>{{$pakage_components}}<br>
            <strong>'שעמים  : '</strong>{{$total_peoples}}<br>
            <strong>'מבוגרים  : '</strong>{{$adults}}<br>
            <strong>'ילדים   : '</strong>{{$childs}}<br>
            <strong>'מזהה עסקה  1  : '</strong>{{$tran1}}<br>
            <strong>'מזהה עסקה  2  : '</strong>{{$tran2}}<br>
            <strong>'סה"כ מחיר בשקלים  : '</strong>₪{{$total_price_in_skl}}<br>
            <strong>'סה"כ מחיר ביורו   : '</strong>€{{$total_price_in_euro}}<br>
            <strong>'שולמו באתר באשראי  : '</strong>₪{{$amount_paid_in_skl}}<br>
            @if(!empty($remaining_amount_in_skl))
            <strong>'כמות שנותרה  : '</strong>₪{{$remaining_amount_in_skl}}<br>
            @endif
        </td>
    </tr>
</table>
