<table class="panel" width="100%" cellpadding="0" cellspacing="0" role="presentation" dir="rtl">
    <tr>
        <td class="panel-content">
            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td class="panel-item">
                        {{$payee_name}} <br>
                        ההזמנה שלך הושלמה, נא ראו מסמך מצורף:
                        {{ Illuminate\Mail\Markdown::parse($slot) }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>