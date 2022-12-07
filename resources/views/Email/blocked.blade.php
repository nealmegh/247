@component('mail::message')
# This is just to remind you !!!

You have been blocked from getting new trips in {{$siteSettings[9]->value}} due to expired documents.
Please update your documents and/or contact admin for further assistance.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
