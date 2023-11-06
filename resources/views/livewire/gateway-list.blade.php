<div class="card card-flush ">
    <div class="card-header tw-flex tw-items-center tw-justify-between tw-pb-0">
        <div class="card-title d-flex flex-column">
            Gateways
        </div>
    </div>
    <hr class="tw-border-gray-400">
    <div class="card-body pt-4  tw-text-sm">

        @foreach ($gateways as $gateway)
            <div class="tw-border tw-border-gray-200 tw-rounded-lg tw-p-4 tw-mb-2">
                <div class="tw-flex tw-justify-between tw-items-center">
                    <div>
                        <div class="tw-mb-2 tw-font-bold tw-text-lg tw-text-gray-700">
                            GATEWAY {{ $gateway->server_id }}
                        </div>
                        @if ($gateway->status == 'offline')
                            <span class="badge badge-secondary">Offline</span>
                        @else
                            <span class="badge badge-success">Online</span>
                        @endif
                    </div>
                    <div>
                        @if ($gateway->status == 'online')
                            <button class="btn btn-sm btn-light-primary tw-px-5 tw-py-2 tw-text-xs">SHOW</button>
                            <button class="btn btn-sm btn-light-danger tw-px-5 tw-py-2 tw-text-xs"
                                x-on:click="shutdown({{ $gateway->id }})">SHUTDOWN</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

@push('scripts')
    <script nonce="{{ csp_nonce() }}">
        function shutdown(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to shutdown this gateway?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, shutdown it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.shutdownGatway(id)
                }
            })
        }
    </script>
@endpush
