    <option value="">Select Season</option>
@foreach($season_list as $i => $season)    
    <option value="{{ $season->id }}">{{ $season->season_name }}</option>    
@endforeach