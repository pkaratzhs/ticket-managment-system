@component('mail::message')
# Hello

You've been invited to register on the TMS
The button bellow will take you to the registation page.

@component('mail::button', ['url' => $invitationLink])
Register
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
