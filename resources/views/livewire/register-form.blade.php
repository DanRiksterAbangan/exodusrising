<div>
    <form class="form w-100" novalidate="novalidate" wire:submit="submit">
        <div class="text-center mb-11">
            <h1 class="text-dark fw-bolder mb-3">Register </h1>
            <span>Welcome to Global Rohan 2</span>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif

        <div class="fv-row mb-3">
            <input type="text" placeholder="name" wire:model="name" name="name" autocomplete="off"
                class="form-control bg-transparent" />
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="fv-row mb-3">
            <input type="text" placeholder="email" wire:model="email" name="email" autocomplete="off"
                class="form-control bg-transparent" />
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="fv-row mb-3">
            <input type="text" placeholder="Username  (Ingame Login ID)" wire:model="username" name="username"
                autocomplete="off" class="form-control bg-transparent" />
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="fv-row mb-3">
            <input type="password" placeholder="Password" wire:model="password" name="password" autocomplete="off"
                class="form-control bg-transparent" />
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="fv-row mb-3">
            <input type="password" placeholder="Confirm Password" wire:model="password_confirmation" name="password"
                autocomplete="off" class="form-control bg-transparent" />

        </div>
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
            <a href="reset-password.html" class="link-primary">Forgot Password ?</a>
        </div>
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                <span class="indicator-label">Sign In</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <div class="text-gray-500 text-center fw-semibold fs-6">Already registered?
            <a href="/login" class="link-primary">Login</a>
        </div>
    </form>
</div>
