@component('mail::message')
# Weekly phone appointments

@if($appointments->count())
These are the people you need to call.
@foreach ($appointments as $appointment)
<p>{{ $appointment->customer->name }} @ {{ $appointment->start }} </p>
@endforeach
@else
No phone appointments required
@endif
@component('mail::button', ['url' => route('appointments.index')])
View Appointments
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
