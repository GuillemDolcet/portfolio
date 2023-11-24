<div class="col-12">
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="position">@lang('admin.position') <sup class="text-danger fs-xs">*</sup></label>
        <input id="position" name="position" type="text" class="form-control @error('position') is-invalid @enderror"
               autocomplete="off"
               required value="{{ old('position', $experience->position) }}">
        @error('position')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="company">@lang('admin.company') <sup class="text-danger fs-xs">*</sup></label>
        <input id="company" name="company" type="text" class="form-control @error('company') is-invalid @enderror"
               autocomplete="off"
               required value="{{ old('company', $experience->company) }}">
        @error('company')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="location">@lang('admin.location') <sup class="text-danger fs-xs">*</sup></label>
        <input id="location" name="location" type="text" class="form-control @error('location') is-invalid @enderror"
               autocomplete="off"
               required value="{{ old('location', $experience->location) }}">
        @error('location')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="name">@lang('admin.name') <sup class="text-danger fs-xs">*</sup></label>
        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
               autocomplete="off"
               required value="{{ old('name', $experience->name) }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="description">@lang('admin.description') <sup class="text-danger fs-xs">*</sup></label>
        <textarea id="description" name="description" type="text" class="form-control @error('description') is-invalid @enderror"
               autocomplete="off">{{ old('description', $experience->description) }}</textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="col-12 row mb-3">
        <div class="col-6">
            <label class="form-label fw-bold" for="start_date">@lang('admin.start_date') <sup class="text-danger fs-xs">*</sup></label>
            <input id="start_date" name="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror"
                   autocomplete="off"
                   required value="{{ old('start_date', $experience->start_date) }}">
            @error('start_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
        <div class="col-6">
            <label class="form-label fw-bold" for="finish_date">@lang('admin.finish_date') <sup class="text-danger fs-xs">*</sup></label>
            <input id="finish_date" name="finish_date" type="date" class="form-control @error('finish_date') is-invalid @enderror"
                   autocomplete="off"
                   required value="{{ old('finish_date', $experience->finish_date) }}">
            @error('finish_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
    </div>
    <div class="col-12">
        <label class="form-check form-switch">
            <input type="checkbox" id="currently" name="currently" value="1"
                   class="form-check-input @error('currently') is-invalid @enderror"
                   data-controller="experience" data-action="input->experience#ableDisableFinishDate"
                {{ !!old('active', $experience->currently) ? 'checked="checked"' : '' }}>
            <span class="form-check-label">@lang('admin.currently')</span>
        </label>
        @error('currently')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <label class="form-label fw-bold" for="skills">@lang('admin.skills')</label>
        </div>
        <select id="skills" name="skills[]" class="select2-container" multiple="multiple" data-form-target="select2">
            @foreach($skills as $skill)
                <option value="{{$skill->id}}">{{$skill->name}}</option>
            @endforeach
        </select>
    </div>
</div>
