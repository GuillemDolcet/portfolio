<div class="d-flex justify-content-between mb-3">
    <div class="w-25">
        <label class="form-label fw-bold" for="name"> Name <sup class="text-danger fs-xs">*</sup></label>
        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
               autocomplete="off"
               required value="{{ old('name', $user->name) }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="w-25">
        <label class="form-label fw-bold" for="email"> Email <sup class="text-danger fs-xs">*</sup></label>
        <input id="email" name="surname" type="email" class="form-control @error('email') is-invalid @enderror"
               autocomplete="off"
               required value="{{ old('email', $user->email) }}">
        @error('surnames')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
    <div class="w-25">
        <label class="form-label fw-bold" for="password"> Password <sup class="text-danger fs-xs">*</sup></label>
        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"
               autocomplete="off"
               required>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @endif
    </div>
</div>
