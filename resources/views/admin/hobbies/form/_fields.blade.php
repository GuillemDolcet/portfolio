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
                           class="form-control @error('position.'.$language->name) is-invalid @enderror"
                           autocomplete="off" maxlength="100"
                           value="{{ old('name.'.$language->name, $hobby->getTranslation('name',$language->name)) }}">
                    @error('name.'.$language->name)
                    <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-12 row">
        <div class="col-10 mb-3">
            <label class="form-label fw-bold" for="image">@lang('admin.image') <sup
                    class="text-danger fs-xs">*</sup></label>
            <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror"
                   autocomplete="off" accept="image/*"
                   {{$hobby->exists ? '' : 'required'}} value="{{ old('image', $hobby->image) }}">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
            @if($hobby->exists)
                <div class="d-flex align-items-center mt-5">
                    <b class="me-7">@lang('admin.actual') @lang('admin.image'): </b><img src="{{\Storage::url($hobby->image)}}" width="40" height="40" alt="{{$hobby->name}}">
                </div>
            @endif
        </div>
        <div class="col-2 mb-3">
            <label class="form-label fw-bold" for="order">@lang('admin.order')</label>
            <input id="level" name="order" type="number" class="form-control @error('order') is-invalid @enderror"
                   autocomplete="off"
                   value="{{ old('order', $hobby->order) }}" max="9999999999">
            @error('order')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
    </div>
</div>
