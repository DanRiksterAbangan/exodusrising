<div>
    <form class="form w-100" novalidate="novalidate" wire:submit="submit">
        <div class="text-center mb-11">
            <h1 class="text-dark fw-bolder mb-3">Login </h1>
            <span>Welcome to rohan</span>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif
        <div class="fv-row mb-8">
            <input type="text" placeholder="Username" wire:model.live="username" name="username" autocomplete="off"
                class="form-control bg-transparent" />
        </div>
        <div class="fv-row mb-3">
            <input type="password" placeholder="Password" wire:model.live="password" name="password" autocomplete="off"
                class="form-control bg-transparent" />
            {{-- @error('password') <span class="text-danger">{{ $message }}</span> @enderror --}}

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
        <div class="text-gray-500 text-center fw-semibold fs-6">Not a Registered?
            <a href="/register" class="link-primary">Register</a>
        </div>
    </form>
</div>
