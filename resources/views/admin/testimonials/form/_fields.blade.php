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
        <div class="col-12 mb-3">
            <label class="form-label fw-bold" for="name">@lang('admin.name') <sup class="text-danger fs-xs">*</sup></label>
            <input id="name" name="name" type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   autocomplete="off"
                   required value="{{ old('name', $testimonial->name) }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        @foreach($languages as $key => $language)
            <div data-language="{{$language->name}}" class="{{$key <= 0 ? '' : 'd-none'}}">
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="job[{{$language->name}}]">@lang('admin.job') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="job[{{$language->name}}]" name="job[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('job') || $errors->has('job.*')) is-invalid @endif"
                           autocomplete="off" maxlength="100"
                           value="{{ old('job.'.$language->name, $testimonial->getTranslation('job',$language->name)) }}">
                    @error('job')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('job.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="comment[{{$language->name}}]">@lang('admin.comment') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="comment[{{$language->name}}]" name="comment[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('comment') || $errors->has('comment.*')) is-invalid @endif"
                           autocomplete="off" maxlength="100"
                           value="{{ old('comment.'.$language->name, $testimonial->getTranslation('comment',$language->name)) }}">
                    @error('comment')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('comment.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="image">@lang('admin.image')</label>
        <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror"
               autocomplete="off" accept="image/*"
               value="{{ old('image', $testimonial->image) }}">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
        @if($testimonial->exists && !is_null($testimonial->image))
            <div class="d-flex align-items-center mt-5">
                <b class="me-7">@lang('admin.actual') @lang('admin.image'): </b><img src="{{\Storage::url($testimonial->image)}}" width="40" height="40" alt="{{$testimonial->name}}">
            </div>
        @endif
    </div>
</div>
