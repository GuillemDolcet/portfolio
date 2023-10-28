<div class="mb-3">
    <label class="form-label fw-bold" for="name">Name <sup class="text-danger fs-xs">*</sup></label>
    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
           autocomplete="off"
           required value="{{ old('name', $user->name) }}">
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
<div class="mb-3">
    <label class="form-label fw-bold" for="password">Password <sup class="text-danger fs-xs">*</sup></label>
    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"
           autocomplete="off" min="8"
           {{$user->exists ? '' : 'required'}}>
    @error('password')
    <div class="invalid-feedback">{{ $message }}</div>
    @endif
</div>
<div class="mb-3">
    <label class="form-label fw-bold" for="password_confirmation">Confirm Password <sup class="text-danger fs-xs">*</sup></label>
    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control"
           autocomplete="off"
        {{$user->exists ? '' : 'required'}}>
    @error('password_confirmation ')
    <div class="invalid-feedback">{{ $message }}</div>
    @endif
</div>
<div class="mb-3">
    <label class="form-label fw-bold" for="role">Role <sup class="text-danger fs-xs">*</sup></label>
    <select id="role" name="role" class="form-select" required>
        @foreach($roles as $role)
            <option value="{{$role->id}}" {{$user->exists && $user->hasRole($role->name) ? 'selected' : ''}}>{{ucfirst($role->name)}}</option>
        @endforeach
    </select>
</div>
