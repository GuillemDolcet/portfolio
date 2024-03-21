<h3 class="text-5 text-justify">{{ $educationModel->degree }}</h3>
<p class="mb-2">{{ $educationModel->school }} / {{$educationModel->start_date->format('Y')}} - {{$educationModel->finish_date->format('Y')}}</p>
<p class="text-muted text-justify">{{ $educationModel->description }}</p>
@foreach($educationModel->skills as $skill)
    <img class="me-3" src="{{ Storage::url($skill->image) }}" alt="{{ $skill->name }}" height="30">
@endforeach
<hr class="my-4">
