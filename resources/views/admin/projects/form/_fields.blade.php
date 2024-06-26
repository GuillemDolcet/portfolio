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
                    <label class="form-label fw-bold" for="name[{{$language->name}}]">@lang('admin.name') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <input id="name[{{$language->name}}]" name="name[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('name') || $errors->has('name.*')) is-invalid @endif"
                           autocomplete="off"
                           value="{{ old('name.'.$language->name, $project->getTranslation('name',$language->name)) }}" maxlength="100">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('name.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold" for="description[{{$language->name}}]">@lang('admin.description') <sup
                            class="text-danger fs-xs">*</sup></label>
                    <textarea id="description[{{$language->name}}]" name="description[{{$language->name}}]" type="text"
                           class="form-control @if($errors->has('description') || $errors->has('description.*')) is-invalid @endif"
                              autocomplete="off">{{ old('description.'.$language->name, $project->getTranslation('description',$language->name)) }}</textarea>
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
            @if(!$project->exists)
                <sup class="text-danger fs-xs">*</sup>
            @endif
        </label>
        <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror"
               autocomplete="off" accept="image/*"
               {{$project->exists ? '' : 'required'}} value="{{ old('image', $project->image) }}">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if($project->exists)
            <div class="d-flex align-items-center mt-5">
                <b class="me-7">@lang('admin.actual') @lang('admin.image'): </b><img src="{{\Storage::url($project->image)}}" width="40" height="40" alt="{{$project->name}}">
            </div>
        @endif
    </div>
    <div class="col-12 mb-3 row">
        <div class="col-9">
            <label class="form-label fw-bold" for="url">@lang('admin.url')</label>
            <input id="url" name="url" type="text"
                   class="form-control @error('url') is-invalid @enderror"
                   autocomplete="off"
                   value="{{ old('url', $project->url) }}" maxlength="254">
            @error('url')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-3">
            <label class="form-label fw-bold" for="order">@lang('admin.order')</label>
            <input id="order" name="order" type="number"
                   class="form-control @error('order') is-invalid @enderror"
                   value="{{ old('order', $project->order) }}">
            @error('order')
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
                <option value="{{$skill->id}}" @if($project->skills()->where('skill_id','=',$skill->id)->exists()) selected @endif>{{$skill->name}}</option>
            @endforeach
        </select>
    </div>
</div>
