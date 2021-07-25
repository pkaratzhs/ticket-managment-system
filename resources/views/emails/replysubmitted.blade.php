@component('mail::message')
## New reply from admin {{ $reply->user->email }}

{{ $reply->reply_text }}

@component('mail::button', ['url' => $ticketURL])
See ticket
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
