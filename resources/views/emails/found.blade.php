@component('mail::message')
    # Introduction

    The body of your message.

    @component('mail::button', ['url' => 'https://www.google.com'])
        Button Text
    @endcomponent

    @component('mail::panel')
        This is the panel content.
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
