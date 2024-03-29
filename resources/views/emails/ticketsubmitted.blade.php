@component('mail::message')
## New ticket from {{ $ticket->user->email }}

### {{ $ticket->title}}
{{ $ticket->description}}

#### Severity: *{{ $ticket->severity}}*


@component('mail::button', ['url' => $ticketURL])
See ticket
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
