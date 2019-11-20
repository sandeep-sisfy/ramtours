<table class="promotion" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="right">
            {{ Illuminate\Mail\Markdown::parse($slot) }}
            <strong>'שם המשלם  : '</strong>{{$payee_name}}<br>
            <strong>'דוא"ל המשלם   : '</strong>{{$email}}<br>
            <strong>'תאריך התחלה   : '</strong>{{$start_date}}<br>
            <strong>'תאריך סיום : '</strong>{{$end_date}}<br>
            <strong>'רכיבי החבילה   : '</strong>{{$pakage_components}}<br>
            <strong>'כמות  : '</strong>{{$total_peoples}}<br>
            <strong>'מבוגרים  : '</strong>{{$adults}}<br>
            <strong>'ילדים   : '</strong>{{$childs}}<br>
            <strong>'מזהה עסקה  1  : '</strong>{{$tran1}}<br>
            <strong>'מזהה עסקה  2  : '</strong>{{$tran2}}<br>
            <strong>'סה"כ מחיר בשקלים  : '</strong>₪{{$total_price_in_skl}}<br>
            <strong>'סה"כ מחיר ביורו   : '</strong>€{{$total_price_in_euro}}<br>
 
        </td>
    </tr>
</table>
