<div>
    <form class="form w-100" novalidate="novalidate" wire:submit.prevent="submit">
        <div class="text-center mb-11">
            <h1 class="text-dark fw-bolder mb-3 tw-text-xl">Forgot Password? </h1>
            <span>Enter your email to reset your password</span>
        </div>
        @if (session()->has('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

        <div class="fv-row mb-8">
            <input type="email" placeholder="Email" wire:model="email" name="email" autocomplete="off"
                class="form-control bg-transparent" />
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>

    </form>
</div>
