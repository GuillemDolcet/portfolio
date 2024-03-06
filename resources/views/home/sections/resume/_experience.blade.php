<h3 class="text-5">{{$experience->position}}</h3>
<p class="mb-2">
    {{$experience->company}} / {{ $experience->start_date->format('Y') }} - {{ !is_null($experience->finish_date) ? $experience->finish_date->format('Y') : Lang::get('admin.currently') }}
</p>
<p class="text-muted">{{$experience->description}}</p>
<hr class="my-4">
