@component('mail::message')
Hallo Peserta Ini Pemberitahuan Test

Perserta Bisa Cek Data Di bawah ini

@component('mail::button', ['url' => ''])
Pemberitahun Test
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
