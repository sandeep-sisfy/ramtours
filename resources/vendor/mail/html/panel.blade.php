<table class="panel" width="100%" cellpadding="0" cellspacing="0" role="presentation" dir="rtl">
    <tr>
        <td class="panel-content">
            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td class="panel-item">
                         ה יקר, {{$payee_name}} <br>
                         ההזמנה שלך הושלמה, נא למצוא את ההזמנה שלך מכה:
                        {{ Illuminate\Mail\Markdown::parse($slot) }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
