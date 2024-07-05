<x-mail::message>
Hello {{ $name }},

A user account has been
<b>created</b> for you on <strong>{{ env('APP_NAME') }}</strong> with the following credentials;

<strong>Email:</strong> {{ $email }}<br>
<strong>Password:</strong> {{ $password }}

Regards,<br>
{{ env('APP_NAME') }} Team
</x-mail::message>




