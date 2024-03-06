<p class="fw-500 text-start mb-2">{{ $skill->name }} <span class="float-end">{{ $skill->level }}%</span></p>
<div class="progress progress-sm mb-4">
    <div class="progress-bar" role="progressbar" style="width: {{ $skill->level }}%" aria-valuenow="{{ $skill->level }}" aria-valuemin="0" aria-valuemax="100"></div>
</div>
