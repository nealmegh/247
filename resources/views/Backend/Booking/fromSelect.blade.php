@if($booking->from_to == 'other')
    <select id="selectFrom" name="selectFrom" class="form-control selectFrom">
        <option value="other" selected>{{__('Other')}}</option>
    </select>
@else
    <select id="selectFrom" name="selectFrom" class="form-control selectFrom">
        <option>Choose a Pick-Up Point</option>
        <optgroup label="Airports">
            @foreach($airports as $airport)
                @if($booking->from_to != 'loc' && $booking->airport->id == $airport->id)
                    <option value="{{'air'.$airport->id}}" selected>{{$airport->display_name}}</option>
                @else
                    <option value="{{'air'.$airport->id}}">{{$airport->display_name}}</option>
                @endif
            @endforeach
        </optgroup>
        <optgroup label="Area">
            @foreach($locations as $location)
                @if($booking->from_to == 'loc' && $booking->location->id == $location->id)
                    <option value="{{'loc'.$location->id}}" selected>{{$location->display_name}}</option>
                @else
                    <option value="{{'loc'.$location->id}}">{{$location->display_name}}</option>
                @endif
            @endforeach
        </optgroup>
    </select>
@endif
