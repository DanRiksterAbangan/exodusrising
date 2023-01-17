<div>
    <form class="form w-100" novalidate="novalidate" wire:submit.prevent="submit" >
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            {{-- <div class="text-gray-500 fw-semibold fs-6">Join the battle</div> --}}
            <!--end::Subtitle=-->
        </div>
        <!--begin::Heading-->
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Username" wire:model="username" name="username" autocomplete="off" class="form-control bg-transparent" />
            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
            <!--end::Email-->
        </div>
        <!--end::Input group=-->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            <input type="password" placeholder="Password" wire:model="password" name="password" autocomplete="off" class="form-control bg-transparent" />
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            <!--end::Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
            <!--begin::Link-->
            <a href="reset-password.html" class="link-primary">Forgot Password ?</a>
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">Sign In</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
        <a href="sign-up.html" class="link-primary">Sign up</a></div>
        <!--end::Sign up-->
    </form>
</div>
