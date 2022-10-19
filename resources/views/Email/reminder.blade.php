@component('mail::message')
# This is just to remind you !!!

You have {{count($trips)}} trip with {{$siteSettings[9]->value}} Today. The Detail of the trip is Below.

@foreach($trips as $trip)
#Booking ID: {{$trip->booking->ref_id}}

Journey Date: {{$trip->journey_date}}

@if($trip->journey_type == 'origin')
Pick-Up Time: {{$trip->booking->pickup_time}}
@else
Pick-Up Time: {{$trip->booking->return_time}}
@endif

@if($trip->booking->from_to == 'loc')
Pick-Up Address:
@if($trip->journey_type == 'origin'){{$trip->booking->pickup_address.' '}}  {{ '('.$trip->booking->location->display_name.')'}}
@else{{$trip->booking->return_pickup_address.' '}}  {{ '('.$trip->booking->airport->display_name.')'}}
@endif

Destination Address:
@if($trip->journey_type == 'origin'){{$trip->booking->dropoff_address.' '}}  {{'('.$trip->booking->airport->display_name.')'}}
@else{{$trip->booking->return_dropoff_address.' '}}  {{'('.$trip->booking->location->display_name.')'}}
@endif
@else
Pick-Up Address:
@if($trip->journey_type == 'origin'){{$trip->booking->pickup_address.' '}}  {{ '('.$trip->booking->airport->display_name.')'}}
@else{{$trip->booking->return_pickup_address.' '}}  {{ '('.$trip->booking->location->display_name.')'}}
@endif

Destination Address:
@if($trip->journey_type == 'origin'){{$trip->booking->dropoff_address.' '}}  {{'('.$trip->booking->location->display_name.')'}}
@else{{$trip->booking->return_dropoff_address.' '}}  {{'('.$trip->booking->airport->display_name.')'}}
@endif
@endif

Driver Name: {{$trip->driver->name}}
@endforeach


Thanks,<br>
{{ config('app.name') }}
@endcomponent
