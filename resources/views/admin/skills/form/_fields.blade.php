<div class="col-12 row">
    <div class="col-6 mb-3">
        <label class="form-label fw-bold" for="name">@lang('admin.name') <sup class="text-danger fs-xs">*</sup></label>
        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
               autocomplete="off"
               required value="{{ old('name', $skill->name) }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="col-3 mb-3">
        <label class="form-label fw-bold" for="level">@lang('admin.level') <sup
                class="text-danger fs-xs">*</sup></label>
        <input id="level" name="level" type="number" class="form-control @error('level') is-invalid @enderror"
               autocomplete="off"
               required value="{{ old('level', $skill->level) }}" min="1" max="100">
        @error('level')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="col-3 mb-3">
        <label class="form-label fw-bold" for="order">@lang('admin.order')</label>
        <input id="level" name="order" type="number" class="form-control @error('order') is-invalid @enderror"
               autocomplete="off"
               value="{{ old('order', $skill->order) }}">
        @error('order')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="col-12 mb-3">
        <label class="form-label fw-bold" for="image">@lang('admin.image') <sup
                class="text-danger fs-xs">*</sup></label>
        <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror"
               autocomplete="off" accept="image/*"
               {{$skill->exists ? '' : 'required'}} value="{{ old('image', $skill->image) }}">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
        @if($skill->exists)
            <div class="d-flex align-items-center mt-5">
                <b class="me-7">@lang('admin.actual') @lang('admin.image'): </b><img src="{{\Storage::url($skill->image)}}" width="40" height="40" alt="{{$skill->name}}">
            </div>
        @endif
    </div>
</div>
