<x-mail::message>

{{__("mail.text") }}<br>


{{ __("mail.text2") }}<br>
{{ __("mail.text3") }} {{ $email }}<br>
{{ __("mail.text4") }} {{ $password }}<br>


<x-mail::button :url="'https://www.avaiia.com/'">
Avaiia.ru
</x-mail::button>

{{ __("mail.text5") }}<br>
{{ config('app.name') }}

</x-mail::message>
