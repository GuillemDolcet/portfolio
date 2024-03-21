<div class="row d-flex justify-content-center mb-4">
    <div class="col-1 d-flex justify-content-center align-items-center"><img src="{{ Storage::url($skill->image) }}" height="30" alt="{{ $skill->name }}"></div>
    <div class="col-11">
        <p class="fw-500 text-start mb-2">{{ $skill->name }} <span class="float-end">{{ $skill->level }}%</span></p>
        <div class="progress progress-sm">
            <div class="progress-bar" role="progressbar" style="width: {{ $skill->level }}%" aria-valuenow="{{ $skill->level }}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>
