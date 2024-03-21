<h3 class="text-5 text-justify">{{$experience->position}}</h3>
<p class="mb-2">
    {{$experience->company}} / {{ $experience->start_date->format('Y') }} - {{ !is_null($experience->finish_date) ? $experience->finish_date->format('Y') : Lang::get('admin.currently') }}
</p>
<p class="text-muted text-justify">{{$experience->description}}</p>
@foreach($experience->skills as $skill)
    <img class="me-3" src="{{ Storage::url($skill->image) }}" alt="{{ $skill->name }}" height="30">
@endforeach
<hr class="my-4">
