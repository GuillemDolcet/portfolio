<div class="col-12">
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
               autocomplete="off">{{ old('name', $experience->description) }}</textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="col-12 row mb-3">
        <div class="col-5">
            <label class="form-label fw-bold" for="start_at">@lang('admin.start_at') <sup class="text-danger fs-xs">*</sup></label>
            <input id="start_at" name="start_at" type="date" class="form-control @error('start_at') is-invalid @enderror"
                   autocomplete="off"
                   required value="{{ old('start_at', $experience->start_at) }}">
            @error('start_at')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
        <div class="col-5">
            <label class="form-label fw-bold" for="finish_at">@lang('admin.finish_at') <sup class="text-danger fs-xs">*</sup></label>
            <input id="finish_at" name="finish_at" type="date" class="form-control @error('finish_at') is-invalid @enderror"
                   autocomplete="off"
                   required value="{{ old('finish_at', $experience->finish_at) }}">
            @error('finish_at')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
        <div class="col-2 d-flex align-items-center justify-content-center">
            <label class="form-check form-switch">
                <input type="checkbox" id="currently" name="currently" value="1"
                       class="form-check-input @error('active') is-invalid @enderror"
                    {{ !!old('active', $experience->currently) ? 'checked="checked"' : '' }}>
                <span class="form-check-label">@lang('admin.currently')</span>
            </label>
        </div>
    </div>
    <div class="col-12">
        <label for="skills">@lang('admin.skills')</label>
        <select id="skills" name="skills" class="select2-container" multiple="multiple" data-form-target="select2">
            @foreach($skills as $skill)
                <option value="{{$skill->id}}">{{$skill->name}}</option>
            @endforeach
        </select>
    </div>
</div>
