<x-mail::message>

Click here to verify your email address.

<x-mail::button :url="route('advertiser-verification.verify',['token'=>$token])">
Verify Email
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
