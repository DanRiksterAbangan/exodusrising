<div class="app-content flex-column-fluid">
    <div class="app-container container-xxl">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <input wire:loading.attr="disabled" wire:model="search" type="text"
                            wire:keydown.enter="searchData" class="form-control form-control-solid w-250px ps-14"
                            placeholder="Search" />
                    </div>
                </div>

            </div>
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                            <th class="min-w-125px">Ref #</th>
                            <th class="min-w-125px">Username</th>
                            <th class="min-w-125px">Amount (RPS)</th>
                            <th class="min-w-125px">Status</th>
                            <th class="min-w-125px">Receipt</th>
                            <th class="min-w-125px">Processed By</th>
                            <th class="min-w-125px">Date Processed</th>
                            <th class="min-w-125px">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold" wire:loading.remove>
                        @forelse($topups as $topup)
                            <tr>
                                <td>
                                    <div class="tw-text-gray-500 tw-italic">
                                        {{ $topup->ref_id }}
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-light fw-bold">{{ $topup->user->login_id }}</div>
                                </td>

                                <td>
                                    {{ number_format($topup->amount) }} <span
                                        class="badge badge-secondary">({{ number_format($topup->rps_amount) }})</span>
                                </td>
                                <td>
                                    @if ($topup->status == 'pending')
                                        <span class="badge badge-warning">{{ ucfirst($topup->status) }}</span>
                                    @elseif ($topup->status == 'approved')
                                        <span class="badge badge-success">{{ ucfirst($topup->status) }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ ucfirst($topup->status) }}</span>
                                    @endif
                                </td>

                                <td x-data="{}">
                                    <button class="tw-p-2 tw-rounded-lg hover:tw-bg-gray-100"
                                        x-on:click="viewReceipt('{{ route("topup.image",$topup->image) }}')">
                                        {!! Mdi::mdi('receipt-text-outline', '', 20, ['fill' => '#555']) !!}
                                    </button>
                                </td>
                                <td>
                                    <div class="badge badge-light fw-bold">{{ $topup->processedBy?->login_id ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="badge badge-light fw-bold">
                                        {{ (new Carbon($topup->processed_date))->format('Y-m-d H:m:s') }}</div>
                                </td>
                                <td x-data="{}">
                                    @if ($topup->status == 'pending')
                                        <button class="btn btn-primary tw-px-4 tw-py-2 tw-text-sm"
                                            x-on:click="confirmApprove({{ $topup }})">
                                            Approve</button>
                                        <button x-on:click="confirmReject({{ $topup }})"
                                            class="btn btn-danger tw-px-4 tw-py-2 tw-text-sm">Reject</button>
                                    @endif
                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center tw-text-gray-600">
                                    No topup transctions
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tbody class="text-gray-600 fw-semibold" wire:loading>
                        <tr>
                            <td colspan="5" class="text-center tw-text-gray-600">
                                Loading...
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="d-flex justify-content-end tw-py-5 tw-pr-5">
                <div>
                    {{ $topups->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        function viewReceipt(image) {
            Swal.fire({
                imageUrl: image,
                imageHeight: 500,
                imageWidth: 600,
                width: 600,
                showConfirmButton: false,
                html: `<a href="${image}" class="btn btn-primary" download>Download image</a>`
            })
        }

        function confirmApprove(data) {
            Swal.fire({
                title: 'Are you sure you wan to approve this topup?',
                html: `<div>REF ID: ${data.ref_id}</div><div class="alert alert-primary tw-my-3 tw-relative">${data.rps_amount} RPS</div><div>USER: <span class="badge badge-primary">${data.user.login_id}</span></div>`,
                showCancelButton: true,
                confirmButtonText: 'Yes, approve it!',
                input: "number",
                inputPlaceholder: "Confirm RPS Amount",
                preConfirm: (amount) => {
                    if (!amount) {
                        Swal.showValidationMessage(
                            `Please specify the confirmed RPS amount`
                        )
                        return;
                    }
                    return @this.approveTopup(data.id, amount)
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {

                }
            })
        }

        function confirmReject(data) {
            Swal.fire({
                title: 'Are you sure you wan to reject this topup?',
                html: `<div>REF ID: ${data.ref_id}</div><div class="alert alert-primary tw-my-3">${data.amount} RPS</div><div>USER: <span class="badge badge-primary">${data.user.login_id}</span></div>`,
                showCancelButton: true,
                confirmButtonText: 'Yes, Reject it!',
                confirmButtonColor: '#dc3545',
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.rejectTopup(data.id)
                }
            })
        }
        $(document).ready(() => {

            @this.on('alert', response => {
                if (response[0].type == "success") {
                    Swal.fire(
                        'Success',
                        response[0].message,
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Warning',
                        response[0].message,
                        'warning'
                    )
                }

            })
        })
    </script>
@endpush
