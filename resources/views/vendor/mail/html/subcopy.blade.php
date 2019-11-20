<table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation" dir="rtl">
    <tr>
        <td>
            {{ Illuminate\Mail\Markdown::parse($slot) }}
	        Thanks,<br>
			{{ config('app.name') }}
        </td>
    </tr>
</table>
