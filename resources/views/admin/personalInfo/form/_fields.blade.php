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
        <div class="col-12 row">
            <div class="col-6">
                <label class="form-label fw-bold" for="firstName">@lang('admin.firstName')</label>
                <input id="firstName" name="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror"
                       autocomplete="off" value="{{ old('firstName', $personalInfo->firstName) }}">
                @error('firstName')
                <div class="invalid-feedback">{{ $message }}</div>
                @endif
            </div>
            <div class="col-6">
                <label class="form-label fw-bold" for="lastName">@lang('admin.lastName')</label>
                <input id="lastName" name="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror"
                       autocomplete="off" value="{{ old('lastName', $personalInfo->lastName) }}">
                @error('lastName')
                <div class="invalid-feedback">{{ $message }}</div>
                @endif
            </div>
        </div>
        <div class="col-12 row">
            <div class="col-6">
                <label class="form-label fw-bold" for="email">@lang('admin.email')</label>
                <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                       autocomplete="off" value="{{ old('firstName', $personalInfo->email) }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @endif
            </div>
            <div class="col-6">
                <label class="form-label fw-bold" for="phone">@lang('admin.phone')</label>
                <input id="phone" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                       autocomplete="off" value="{{ old('phone', $personalInfo->phone) }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @endif
            </div>
        </div>
        <div class="col-12 row">
            <div class="col-4">
                <label class="form-label fw-bold" for="linkedin">@lang('admin.linkedin')</label>
                <input id="linkedin" name="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror"
                       autocomplete="off" value="{{ old('linkedin', $personalInfo->linkedin) }}">
                @error('linkedin')
                <div class="invalid-feedback">{{ $message }}</div>
                @endif
            </div>
            <div class="col-4">
                <label class="form-label fw-bold" for="twitter">@lang('admin.twitter')</label>
                <input id="twitter" name="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror"
                       autocomplete="off" value="{{ old('twitter', $personalInfo->twitter) }}">
                @error('twitter')
                <div class="invalid-feedback">{{ $message }}</div>
                @endif
            </div>
            <div class="col-4">
                <label class="form-label fw-bold" for="github">@lang('admin.github')</label>
                <input id="github" name="github" type="text" class="form-control @error('github') is-invalid @enderror"
                       autocomplete="off" value="{{ old('github', $personalInfo->github) }}">
                @error('github')
                <div class="invalid-feedback">{{ $message }}</div>
                @endif
            </div>
        </div>
        @foreach(\App\Models\Language::orderByLocale()->get() as $key => $language)
            <div data-language="{{$language->name}}" class="{{$key <= 0 ? '' : 'd-none'}}">
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="location[{{$language->name}}]">@lang('admin.location') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="location[{{$language->name}}]" name="location[{{$language->name}}]" type="text"
                           class="form-control @error('location.'.$language->name) is-invalid @enderror"
                           autocomplete="off" maxlength="100"
                           value="{{ old('location.'.$language->name, $personalInfo->getTranslation('location',$language->name)) }}">
                    @error('location.'.$language->name)
                    <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="bio[{{$language->name}}]">@lang('admin.bio') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="bio[{{$language->name}}]" name="bio[{{$language->name}}]" type="text"
                           class="form-control @error('bio.'.$language->name) is-invalid @enderror"
                           autocomplete="off" maxlength="100"
                           value="{{ old('bio.'.$language->name, $personalInfo->getTranslation('bio',$language->name)) }}">
                    @error('bio.'.$language->name)
                    <div class="invalid-feedback">{{ $message }}</div>
                    @endif
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
        @endif
        @if($personalInfo->exists)
            <div class="d-flex align-items-center mt-5">
                <b class="me-3">@lang('admin.actual-image') : </b><img src="{{\Storage::url($personalInfo->image)}}" width="100" alt="{{$personalInfo->name}}">
            </div>
        @endif
    </div>
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="order">@lang('admin.order')</label>
        <input id="order" name="order" type="number" class="form-control @error('order') is-invalid @enderror"
               autocomplete="off" value="{{ old('order', $personalInfo->order) }}">
        @error('order')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
</div>
