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
                    <label class="form-label fw-bold" for="title[{{$language->name}}]">@lang('admin.title') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="title[{{$language->name}}]" name="title[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('title') || $errors->has('title.*')) is-invalid @endif"
                           autocomplete="off" maxlength="100"
                           value="{{ old('title.'.$language->name, $service->getTranslation('title',$language->name)) }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('title.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="description[{{$language->name}}]">@lang('admin.description') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <textarea id="description[{{$language->name}}]" name="description[{{$language->name}}]"
                           class="form-control @if($errors->has('description') || $errors->has('description.*')) is-invalid @endif"
                              autocomplete="off">{{ old('description.'.$language->name, $service->getTranslation('description',$language->name)) }}</textarea>
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
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="image">@lang('admin.image')
            @if(!$service->exists)
                <sup class="text-danger fs-xs">*</sup>
            @endif
       </label>
        <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror"
               autocomplete="off" accept="image/*"
               {{$service->exists ? '' : 'required'}} value="{{ old('image', $service->image) }}">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if($service->exists)
            <div class="d-flex align-items-center mt-5">
                <b class="me-3">@lang('admin.actual-image') : </b><img src="{{\Storage::url($service->image)}}" width="100" alt="{{$service->name}}">
            </div>
        @endif
    </div>
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="order">@lang('admin.order')</label>
        <input id="order" name="order" type="number" class="form-control @error('order') is-invalid @enderror"
               autocomplete="off" value="{{ old('order', $service->order) }}">
        @error('order')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
