@component('mail::message')
# Weekly phone appointments

These are the people you need to call.

@foreach ($appointments as $appointment)
<p>{{ $appointment->start }} with {{ $appointment->customer->name }}</p>
@endforeach

@component('mail::button', ['url' => ''])
See Appointments
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
