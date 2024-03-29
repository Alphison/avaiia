<x-mail::message>

{{ __("mail.text") }}<br>

<x-mail::button :url="'https://www.avaiia.com/'">
Avaiia.ru
</x-mail::button>

{{ __("mail.text5") }}<br>
{{ config('app.name') }}
</x-mail::message>
