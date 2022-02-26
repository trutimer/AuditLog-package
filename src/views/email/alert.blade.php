@component('mail::message')
# Alert

{{ $message }}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
