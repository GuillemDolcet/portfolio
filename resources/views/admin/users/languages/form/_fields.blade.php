<div class="col-12">
    <div class="small mb-3"><i><b>@lang('admin.advice-translations')</b></i></div>
    <div class="languages">
        <div class="mb-3">
            <div class="form-selectgroup">
                @foreach(\App\Models\Language::orderByLocale()->get() as $language)
                    <label class="form-selectgroup-item">
                        <input type="radio" name="language" data-action="input->form#changeLanguage" value="{{$language->name}}" class="form-selectgroup-input" {{app()->getLocale() == $language->name ? 'checked' : ''}}/>
                        <span class="form-selectgroup-label"><img src="{{image_url($language->image)}}" alt="{{$language->name}}" width="24" height="24"/></span>
                    </label>
                @endforeach
            </div>
        </div>
        @foreach(\App\Models\Language::orderByLocale()->get() as $key => $language)
            <div data-language="{{$language->name}}" class="{{$key <= 0 ? '' : 'd-none'}}">
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="name[{{$language->name}}]">@lang('admin.name') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="name[{{$language->name}}]" name="name[{{$language->name}}]" type="text"
                           class="form-control @error('name.'.$language->name) is-invalid @enderror"
                           autocomplete="off"
                           value="{{ old('name.'.$language->name, $userLanguage->getTranslation('name',$language->name)) }}" maxlength="100">
                    @error('name.'.$language->name)
                    <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="level">@lang('admin.level') <sup
                class="text-danger fs-xs">*</sup></label>
        <input id="level" name="level" type="number" class="form-control @error('level') is-invalid @enderror"
               autocomplete="off"
               required value="{{ old('level', $userLanguage->level) }}" min="1" max="100">
        @error('level')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
</div>
