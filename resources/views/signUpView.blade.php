@component('mail::message')
signup here sir {{ $name }}

@component('mail::button', ['url' => 'https://google.fr'])
Click here
@endcomponent

@endcomponent