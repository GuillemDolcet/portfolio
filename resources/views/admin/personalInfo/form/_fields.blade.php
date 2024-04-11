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
        <div class="col-12 row mb-3">
            <div class="col-6">
                <label class="form-label fw-bold" for="firstName">@lang('admin.first_name')</label>
                <input id="firstName" name="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror"
                       autocomplete="off" value="{{ old('firstName', $personalInfo->firstName) }}" required>
                @error('firstName')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label fw-bold" for="lastName">@lang('admin.last_name')</label>
                <input id="lastName" name="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror"
                       autocomplete="off" value="{{ old('lastName', $personalInfo->lastName) }}" required>
                @error('lastName')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12 row mb-3">
            <div class="col-4">
                <label class="form-label fw-bold" for="email">@lang('admin.email')</label>
                <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                       autocomplete="off" value="{{ old('email', $personalInfo->email) }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label class="form-label fw-bold" for="phone">@lang('admin.phone')</label>
                <input id="phone" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                       autocomplete="off" value="{{ old('phone', $personalInfo->phone) }}" required>
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label class="form-label fw-bold" for="date_of_birth">@lang('admin.date_of_birth')</label>
                <input id="date_of_birth" name="date_of_birth" type="date"
                       class="form-control @error('date_of_birth') is-invalid @enderror"
                       autocomplete="off" required
                       value="{{ old('date_of_birth', !is_null($personalInfo->date_of_birth) ? $personalInfo->date_of_birth->format('Y-m-d') : '') }}">
                @error('date_of_birth')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12 row mb-3">
            <div class="col-4">
                <label class="form-label fw-bold" for="linkedin">Linkedin</label>
                <input id="linkedin" name="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror"
                       autocomplete="off" value="{{ old('linkedin', $personalInfo->linkedin) }}">
                @error('linkedin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label class="form-label fw-bold" for="twitter">Twitter/X</label>
                <input id="twitter" name="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror"
                       autocomplete="off" value="{{ old('twitter', $personalInfo->twitter) }}">
                @error('twitter')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label class="form-label fw-bold" for="github">Github</label>
                <input id="github" name="github" type="text" class="form-control @error('github') is-invalid @enderror"
                       autocomplete="off" value="{{ old('github', $personalInfo->github) }}">
                @error('github')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        @foreach($languages as $key => $language)
            <div data-language="{{$language->name}}" class="{{$key <= 0 ? '' : 'd-none'}}">
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="location[{{$language->name}}]">@lang('admin.location') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="location[{{$language->name}}]" name="location[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('location') || $errors->has('location.*')) is-invalid @endif"
                           autocomplete="off" maxlength="100"
                           value="{{ old('location.'.$language->name, $personalInfo->getTranslation('location',$language->name)) }}">
                    @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('location.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="image">@lang('admin.image') <sup
                class="text-danger fs-xs">*</sup></label>
        <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror"
               autocomplete="off" accept="image/*"
               {{$personalInfo->exists ? '' : 'required'}} value="{{ old('image', $personalInfo->image) }}">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if($personalInfo->exists)
            <div class="d-flex align-items-center mt-5">
                <b class="me-3">@lang('admin.actual-image') : </b><img src="{{\Storage::url($personalInfo->image)}}" width="100" alt="{{$personalInfo->name}}">
            </div>
        @endif
    </div>
    @foreach($languages as $language)
        <div class="col-12 mb-3">
            <label class="form-label fw-bold" for="cv[{{$language->name}}]">
                <img src="{{image_url($language->image)}}" alt="{{$language->name}}" width="24" height="24"/> @lang('admin.cv') <sup class="text-danger fs-xs">*</sup>
            </label>
            <input id="cv[{{$language->name}}]" name="cv[{{$language->name}}]" type="file"
                   class="form-control @if($errors->has('cv') || $errors->has('cv.*')) is-invalid @endif" accept="application/pdf"
                   autocomplete="off" maxlength="100" {{$personalInfo->exists ? '' : 'required'}}>
            @error('cv')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @error('cv.*')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    @endforeach
</div>
