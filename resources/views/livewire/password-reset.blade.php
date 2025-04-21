<div>
    <form class="form w-100" novalidate="novalidate" wire:submit.prevent="submit">
        <div class="text-center mb-11">
            <h1 class="text-dark fw-bolder mb-3 tw-text-xl">Change your password</h1>
            <span>Enter your new password</span>
        </div>
        @if (session()->has('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

        <div class="fv-row mb-4">
            <input type="text" placeholder="Email" value="{{ $email }}" readonly name="email"
                autocomplete="off" class="form-control bg-transparent" />
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="fv-row mb-4">
            <input type="password" placeholder="Password" wire:model="password" name="password" autocomplete="off"
                class="form-control bg-transparent" />
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="fv-row mb-4">
            <input type="password" placeholder="Confirm Password" wire:model="password_confirmation"
                name="password_confirmation" autocomplete="off" class="form-control bg-transparent" />
            @error('password_confirmation')
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


@push('scripts')
    <script nonce="{{ csp_nonce() }}">
        $(document).ready(function() {
            Livewire.on('alert', function(response) {
                Swal.fire(
                    response[0].type,
                    response[0].message,
                    response[0].type
                )
            })
        });
    </script>
@endpush
