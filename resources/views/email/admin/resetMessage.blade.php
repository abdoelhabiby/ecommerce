@component('mail::message')
#Welcome

Password Reset Password

 
{{$data['admin']->name}}

@component('mail::button', ['url' => url("dashboard/resetPassword/".$data['token'])])
Change My Password
@endcomponent

or copy this link

{{url("dashboard/resetPassword/".$data['token'])}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
