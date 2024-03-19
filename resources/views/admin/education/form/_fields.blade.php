<div class="col-12">
    <div class="small mb-3"><i><b>@lang('admin.advice-translations')</b></i></div>
    <div class="languages">
        <div class="mb-3">
            <div class="form-selectgroup">
                @foreach($languages as $language)
                    <label class="form-selectgroup-item">
                        <input type="radio" name="language" data-action="input->form#changeLanguage" value="{{$language->name}}" class="form-selectgroup-input" {{app()->getLocale() == $language->name ? 'checked' : ''}}/>
                        <span class="form-selectgroup-label"><img src="{{image_url($language->image)}}" alt="{{$language->name}}" width="24" height="24"/></span>
                    </label>
                @endforeach
            </div>
        </div>
        @foreach($languages as $key => $language)
            <div data-language="{{$language->name}}" class="{{$key <= 0 ? '' : 'd-none'}}">
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="school[{{$language->name}}]">@lang('admin.school') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="school[{{$language->name}}]" name="school[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('school') || $errors->has('school.*')) is-invalid @endif"
                           autocomplete="off" maxlength="100"
                           value="{{ old('school.'.$language->name, $education->getTranslation('school',$language->name)) }}">
                    @error('school')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('school.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="degree[{{$language->name}}]">@lang('admin.degree') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="degree[{{$language->name}}]" name="degree[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('degree') || $errors->has('degree.*')) is-invalid @endif"
                           autocomplete="off" maxlength="100"
                           value="{{ old('degree.'.$language->name, $education->getTranslation('degree',$language->name)) }}">
                    @error('degree')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('degree.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="discipline[{{$language->name}}]">@lang('admin.discipline') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="discipline[{{$language->name}}]" name="discipline[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('discipline') || $errors->has('discipline.*')) is-invalid @endif"
                           autocomplete="off" maxlength="100"
                           value="{{ old('discipline.'.$language->name, $education->getTranslation('discipline',$language->name)) }}">
                    @error('discipline')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('discipline.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="description[{{$language->name}}]">@lang('admin.description')
                        <sup class="text-danger fs-xs">*</sup></label>
                    <textarea id="description[{{$language->name}}]" name="description[{{$language->name}}]" type="text"
                              class="form-control @if($errors->has('description') || $errors->has('description.*')) is-invalid @endif"
                              autocomplete="off">{{ old('description.'.$language->name, $education->getTranslation('description',$language->name)) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('description.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-12 row mb-3">
        <div class="col-6">
            <label class="form-label fw-bold" for="start_date">@lang('admin.start_date') <sup class="text-danger fs-xs">*</sup></label>
            <input id="start_date" name="start_date" type="date"
                   class="form-control @error('start_date') is-invalid @enderror"
                   autocomplete="off"
                   required value="{{ old('start_date', !is_null($education->start_date) ? $education->start_date->format('Y-m-d') : '') }}">
            @error('start_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-6">
            <label class="form-label fw-bold" for="finish_date">@lang('admin.finish_date') <sup
                    class="text-danger fs-xs">*</sup></label>
            <input id="finish_date" name="finish_date" type="date"
                   class="form-control @error('finish_date') is-invalid @enderror"
                   autocomplete="off"
                   required value="{{ old('start_date', !is_null($education->finish_date) ? $education->finish_date->format('Y-m-d') : '') }}">
            @error('finish_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <label class="form-label fw-bold" for="skills">@lang('admin.skills')</label>
        </div>
        <select id="skills" name="skills[]" class="select2-container" multiple="multiple" data-form-target="select2">
            @foreach($skills as $skill)
                <option value="{{$skill->id}}" @if($education->skills()->where('skill_id','=',$skill->id)->exists()) selected @endif>{{$skill->name}}</option>
            @endforeach
        </select>
    </div>
</div>
