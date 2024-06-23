<x-mail::message>
Hello {{ $name }},

A user account has been
<b>created</b> for you on {{ env('APP_NAME') }} with the following credentials.

<strong>Email:</strong> {{ $email }}<br>
<strong>Password:</strong> {{ $password }}

Regards,<br>
PC Team
</x-mail::message>




