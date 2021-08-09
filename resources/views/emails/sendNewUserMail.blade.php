@component('mail::message')
# Introduction

New User has been created.

Name : {{ $data->name }}
Email : {{ $data->email }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
