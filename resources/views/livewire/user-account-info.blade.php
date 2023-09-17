<div class="card card-flush ">
    <div class="card-header">
        <div class="card-title d-flex flex-column">
            Account
        </div>
    </div>
    <hr class="tw-border-gray-400">
    <div class="card-body pt-4 tw-relative">

        <div class="tw-flex tw-items-center">
            <span class="tw-text-lg tw-font-semibold tw-text-gray-500">
                {{ $user->login_id }} <span class="badge badge-primary">{{ $user->user_id }}</span></span>
        </div>

        <div class="tw-absolute tw-top-4 tw-right-4 tw-text-gray-500 tw-text-sm tw-italic">
            Last login: {{ (new Carbon($user->session_date))->diffForHumans() }}
        </div>

        <div class="tw-mt-10">
            <button class="btn btn-primary btn-sm" wire:ignore data-bs-toggle="modal"
                data-bs-target="#changePasswordModal">
                Change Password
            </button>

            <button class="btn btn-success btn-sm" wire:click="fix5101">
                Fix 5101
            </button>
        </div>


    </div>
</div>


@push('scripts')
    <script>
        Livewire.on('alert', () => {
            Swal.fire({
                title: 'Success!',
                text: '5101 fixed!',
                icon: 'success',
                confirmButtonText: 'OK'
            })
        });
    </script>
@endpush
