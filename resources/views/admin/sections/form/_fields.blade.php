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
        @if(!$section->exists)
            <div class="col-12 mb-3">
                <label class="form-label fw-bold" for="name">@lang('admin.name') <sup class="text-danger fs-xs">*</sup></label>
                <input id="name" name="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       required value="{{ old('name', $section->name) }}" @if($section->exists) {{ 'disabled' }} @endif>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @endif
            </div>
        @endif
        @foreach(\App\Models\Language::orderByLocale()->get() as $key => $language)
            <div data-language="{{$language->name}}" class="{{$key <= 0 ? '' : 'd-none'}}">
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="tag[{{$language->name}}]">@lang('admin.tag') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="tag[{{$language->name}}]" name="tag[{{$language->name}}]" type="text"
                           class="form-control @error('tag.'.$language->name) is-invalid @enderror"
                           autocomplete="off" maxlength="100"
                           value="{{ old('tag.'.$language->name, $section->getTranslation('tag',$language->name)) }}" required>
                    @error('tag.'.$language->name)
                    <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="title[{{$language->name}}]">@lang('admin.title') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="title[{{$language->name}}]" name="title[{{$language->name}}]" type="text"
                           class="form-control @error('title.'.$language->name) is-invalid @enderror"
                           autocomplete="off" maxlength="100"
                           value="{{ old('title.'.$language->name, $section->getTranslation('title',$language->name)) }}" required>
                    @error('title.'.$language->name)
                    <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="description[{{$language->name}}]">@lang('admin.description')</label>
                    <textarea id="description[{{$language->name}}]" name="description[{{$language->name}}]" class="form-control @error('description.'.$language->name) is-invalid @enderror">{{ old('description.'.$language->name, $section->getTranslation('description',$language->name)) }}
                    </textarea>
                    @error('description.'.$language->name)
                    <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
