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
                    <label class="form-label fw-bold" for="question[{{$language->name}}]">@lang('admin.question') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="question[{{$language->name}}]" name="question[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('question') || $errors->has('question.*')) is-invalid @endif"
                           autocomplete="off" maxlength="150"
                           value="{{ old('question.'.$language->name, $faq->getTranslation('question',$language->name)) }}">
                    @error('question')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('question.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="answer[{{$language->name}}]">@lang('admin.answer') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <textarea id="answer[{{$language->name}}]" name="answer[{{$language->name}}]"
                           class="form-control @if($errors->has('answer') || $errors->has('answer.*')) is-invalid @endif"
                              autocomplete="off">{{ old('answer.'.$language->name, $faq->getTranslation('answer',$language->name)) }}</textarea>
                    @error('answer')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('answer.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="order">@lang('admin.order')</label>
        <input id="level" name="order" type="number" class="form-control @error('order') is-invalid @enderror"
               autocomplete="off"
               value="{{ old('order', $faq->order) }}" max="9999999999">
        @error('order')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
