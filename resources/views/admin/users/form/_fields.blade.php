<div class="col-12 row">
    <div class="col-8">
        <div class="mb-3 text-center mt-2 mb-2">
            <div class="mb-3">
                <span class="avatar avatar-xl rounded" style="background-image: url('data:image/jpg;base64,{{ $user->avatar }}')"></span>
                <h3 class="mb-0 mt-2">{{ $user->name }}</h3>
                <div class="text-muted">{{ $user->email }}</div>
            </div>
        </div>
        <div class="col-12 row align-bottom mt-4">
            <div class="col-6 align-bottom">
                <label class="form-label fw-bold" for="password">@lang('admin.password')</label>
                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       autocomplete="off" min="8"
                    {{$user->exists ? '' : 'required'}}>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @endif
            </div>
            <div class="col-6 align-bottom">
                <label class="form-label fw-bold" for="password_confirmation">@lang('admin.confirm') @lang('admin.password')</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control"
                       autocomplete="off"
                    {{$user->exists ? '' : 'required'}}>
                @error('password_confirmation ')
                <div class="invalid-feedback">{{ $message }}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="mb-3">
            <label class="form-label fw-bold" for="name">@lang('admin.name') <sup class="text-danger fs-xs">*</sup></label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   autocomplete="off"
                   required value="{{ old('name', $user->name) }}" minlength="3" maxlength="50">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold" for="email">Email <sup class="text-danger fs-xs">*</sup></label>
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   autocomplete="off"
                   {{$user->exists ? 'disabled' : 'required'}} value="{{ old('email', $user->email) }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
        @if(current_user()->hasRole(['admin']))
            <div class="mb-3">
                <label class="form-label fw-bold" for="role">@lang('admin.role') <sup class="text-danger fs-xs">*</sup></label>
                <select id="role" name="role" class="form-select" required>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}" {{$user->exists && $user->hasRole($role->name) ? 'selected' : ''}}>{{ucfirst($role->name)}}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
</div>
<div class="col-12 row mt-2">
        <div class="col-12 mb-3">
            <label class="form-label fw-bold" for="location">@lang('admin.location')</label>
            <input id="location" name="location" type="text" class="form-control @error('location') is-invalid @enderror"
                   autocomplete="off"
                   value="{{ old('location', $user->location) }}" minlength="3" maxlength="50">
            @error('location')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
        <div class="col-6 mb-3">
            <label class="form-label fw-bold" for="date_of_birth">@lang('admin.date_of_birth')</label>
            <input id="date_of_birth" name="date_of_birth" type="date"
                   class="form-control @error('date_of_birth') is-invalid @enderror"
                   autocomplete="off"
                   value="{{ old('date_of_birth', !is_null($user->date_of_birth) ? $user->date_of_birth->format('Y-m-d') : '') }}">
            @error('date_of_birth')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
        <div class="col-6 mb-3">
            <label class="form-label fw-bold" for="phone">@lang('admin.phone')</label>
            <input id="phone" name="phone" type="text" class="form-control @error('location') is-invalid @enderror"
                   autocomplete="off"
                   value="{{ old('phone', $user->phone) }}" minlength="3" maxlength="50">
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
        <div class="col-6 mb-3">
            <label class="form-label fw-bold" for="linkedin">Linkedin</label>
            <input id="linkedin" name="linkedin" type="text"
                   class="form-control @error('linkedin') is-invalid @enderror"
                   autocomplete="off"
                   value="{{ old('x', $user->linkedin) }}">
            @error('linkedin')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
        <div class="col-6 mb-3">
            <label class="form-label fw-bold" for="x">X/Twitter</label>
            <input id="x" name="x" type="text"
                   class="form-control @error('x') is-invalid @enderror"
                   autocomplete="off"
                   value="{{ old('x', $user->x) }}">
            @error('x')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
        <div class="col-6 mb-3">
            <label class="form-label fw-bold" for="instagram">Instagram</label>
            <input id="instagram" name="instagram" type="text"
                   class="form-control @error('instagram') is-invalid @enderror"
                   autocomplete="off"
                   value="{{ old('instagram', $user->instagram) }}">
            @error('instagram')
            <div class="invalid-feedback">{{ $message }}</div>
            @endif
        </div>
</div>

