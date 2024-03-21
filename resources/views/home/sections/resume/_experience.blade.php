<h3 class="text-5 text-justify">{{$experience->position}}</h3>
<p class="mb-2">
    {{$experience->company}} / {{ $experience->start_date->format('Y') }} - {{ !is_null($experience->finish_date) ? $experience->finish_date->format('Y') : Lang::get('admin.currently') }}
</p>
<p class="text-muted text-justify">{{$experience->description}}</p>
<hr class="my-4">
