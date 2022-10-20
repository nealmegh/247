@if($booking->from_to == 'other')
    <select id="selectTo" name="selectTo" class="form-control selectTo">
        <option value="other" selected>{{__('Other')}}</option>
    </select>
@else
<select id="selectTo" name="selectTo" class="form-control selectTo">
    <option selected>Choose a Drop-Off Point</option>
    @if($booking->from_to == 'loc')
        <optgroup label="Airports">

            @foreach($airports as $airport)
                @if( $booking->airport->id == $airport->id)
                    <option value="{{$airport->id}}" selected>{{$airport->display_name}}</option>
                @else
                    <option value="{{$airport->id}}">{{$airport->display_name}}</option>
                @endif
            @endforeach
        </optgroup>
    @else
        <optgroup label="Area">
            @foreach($locations as $location)
                @if($booking->location->id == $location->id)
                    <option value="{{$location->id}}" selected>{{$location->display_name}}</option>
                @else
                    <option value="{{$location->id}}">{{$location->display_name}}</option>
                @endif
            @endforeach
        </optgroup>
    @endif
</select>
@endif
