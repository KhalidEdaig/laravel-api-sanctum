@component('mail::message')
# Hi there, <br>
Welcome to our application.

{{ $testEmail['body'] }}

<img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/storage/attachments/' . $testEmail['attachments'])))}}">

Thanks,<br>
{{ config('app.name') }}
@endcomponent
