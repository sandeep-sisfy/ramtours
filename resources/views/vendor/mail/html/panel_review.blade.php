<table class="panel" width="100%" cellpadding="0" cellspacing="0" role="presentation" dir="rtl">
    <tr>
        <td class="panel-content">
            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td class="panel-item">
                        שלום, <br>
                        התקבלה המלצה ממבקר באתר:
                        {{ Illuminate\Mail\Markdown::parse($slot) }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>