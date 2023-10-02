<div class="card card-flush ">
    <div class="card-header">
        <div class="card-title d-flex flex-column">
            Account
        </div>
    </div>
    <hr class="tw-border-gray-400">
    <div class="card-body pt-4 tw-relative">

        <div>
            <div class="tw-flex tw-items-center">
                <span class="tw-text-lg tw-font-semibold tw-text-gray-500">
                    {{ $user->name }}</span>
            </div>

            <div class="tw-flex tw-items-center">
                <span class="tw-text-lg tw-font-semibold tw-text-gray-500">
                    {{ $user->email }}</span>
            </div>
            <div class="tw-flex tw-items-center">
                <span class="tw-italic tw-text-base tw-text-gray-500">
                    {{ $user->login_id }}#{{ $user->user_id }}</span>
            </div>
        </div>

        @if ($user->session_date > new Carbon('2023-10-01'))
            <div class="tw-absolute tw-top-4 tw-right-4 tw-text-gray-500 tw-text-sm tw-italic">
                Last login: {{ (new Carbon($user->session_date))->diffForHumans() }}
            </div>
        @endif

        <div class="tw-mt-10">
            <button class="btn btn-primary btn-sm" wire:ignore data-bs-toggle="modal"
                data-bs-target="#changePasswordModal">
                Change Password
            </button>

            <button class="btn btn-success btn-sm" wire:click="fix5101">
                Fix 5101
            </button>

            <button class="btn btn-warning btn-sm" x-on:click="claimGiftCode">
                Claim Gift Code
            </button>
        </div>


    </div>

    {{-- MODALS --}}
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-modal="true" role="dialog"
        data-bs-backdrop='static'>
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                @livewire('modal.reset-password')
            </div>
        </div>
    </div>
</div>




@push('scripts')
    <script>
        function claimGiftCode() {
            Swal.fire({
                title: `Claim Gift code`,
                input: "text",
                inputAttributes: {
                    autocapitalize: "off",
                    placeholder: "Enter gift code"
                },
                showCancelButton: true,
                confirmButtonText: 'Claim it!',
                showLoaderOnConfirm: true,
                preConfirm: async (data) => {
                    const response = await @this.claimGiftCode(data)
                    if (response.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Gift code claimed!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })
                    } else {
                        Swal.showValidationMessage(
                            `${response.message}`
                        )
                    }

                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        }
        $(document).ready(function() {
            Livewire.on('alert', () => {
                Swal.fire({
                    title: 'Success!',
                    text: '5101 fixed!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
            });
        });
    </script>
@endpush
