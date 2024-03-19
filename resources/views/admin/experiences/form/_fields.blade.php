<div class="col-12">
    <div class="small mb-3"><i><b>@lang('admin.advice-translations')</b></i></div>
    <div class="languages">
        <div class="mb-3">
            <div class="form-selectgroup">
                @foreach($languages as $language)
                    <label class="form-selectgroup-item">
                        <input type="radio" name="language" data-action="input->form#changeLanguage"
                               value="{{$language->name}}"
                               class="form-selectgroup-input" {{app()->getLocale() == $language->name ? 'checked' : ''}}/>
                        <span class="form-selectgroup-label"><img src="{{image_url($language->image)}}"
                                                                  alt="{{$language->name}}" width="24"
                                                                  height="24"/></span>
                    </label>
                @endforeach
            </div>
        </div>
        @foreach($languages as $key => $language)
            <div data-language="{{$language->name}}" class="{{$key <= 0 ? '' : 'd-none'}}">
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="position[{{$language->name}}]">@lang('admin.position') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="position[{{$language->name}}]" name="position[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('position') || $errors->has('position.*')) is-invalid @endif"
                           autocomplete="off" maxlength="100"
                           value="{{ old('position.'.$language->name, $experience->getTranslation('position',$language->name)) }}">
                    @error('position')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('position.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="company[{{$language->name}}]">@lang('admin.company') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="company[{{$language->name}}]" name="company[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('company') || $errors->has('company.*')) is-invalid @endif"
                           autocomplete="off" maxlength="100"
                           value="{{ old('company.'.$language->name, $experience->getTranslation('company',$language->name)) }}">
                    @error('company')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('company.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="location[{{$language->name}}]">@lang('admin.location') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="location[{{$language->name}}]" name="location[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('location') || $errors->has('location.*')) is-invalid @endif"
                           autocomplete="off" maxlength="100"
                           value="{{ old('location.'.$language->name, $experience->getTranslation('location',$language->name)) }}">
                    @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('location.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="description[{{$language->name}}]">@lang('admin.description')
                        <sup class="text-danger fs-xs">*</sup></label>
                    <textarea id="description[{{$language->name}}]" name="description[{{$language->name}}]"
                              class="form-control @if($errors->has('description') || $errors->has('description.*')) is-invalid @endif"
                              autocomplete="off">{{ old('description.'.$language->name, $experience->getTranslation('description',$language->name)) }}</textarea>
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
                   class="form-control @error('start_date') is-invalid @enderror" autocomplete="off" required
                   value="{{ old('start_date', !is_null($experience->start_date) ? $experience->start_date->format('Y-m-d') : '') }}">
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
                   required @if(is_null($experience->finish_date)) disabled
                   @else value="{{ old('finish_date', $experience->finish_date->format('Y-m-d')) }}" @endif>
            @error('finish_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <label class="form-check form-switch">
            <input type="checkbox" id="currently" name="currently" value="1"
                   class="form-check-input @error('currently') is-invalid @enderror"
                   data-action="input->form#ableDisableFinishDate"
                   @if(is_null($experience->finish_date)) checked @endif>
            <span class="form-check-label">@lang('admin.currently')</span>
        </label>
        @error('currently')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <label class="form-label fw-bold" for="skills">@lang('admin.skills')</label>
        </div>
        <select id="skills" name="skills[]" class="select2-container" multiple="multiple" data-form-target="select2">
            @foreach($skills as $skill)
                <option value="{{$skill->id}}"
                        @if($experience->skills()->where('skill_id','=',$skill->id)->exists()) selected @endif>{{$skill->name}}</option>
            @endforeach
        </select>
    </div>
</div>
