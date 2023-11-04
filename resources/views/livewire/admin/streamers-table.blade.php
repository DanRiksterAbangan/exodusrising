<div class="app-content flex-column-fluid">
    <div class="app-container container-xxl">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title tw-justify-between tw-w-full">
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
                        <input wire:loading.attr="disabled" wire:model.live.debounce.500ms="search" type="text"
                          class="form-control form-control-solid w-250px ps-14"
                            placeholder="Search" />
                    </div>

                </div>

            </div>
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                            <th class="min-w-125px">STREAMER Code</th>
                            <th class="min-w-125px">USER #</th>
                            <th class="min-w-125px">USER NAME</th>
                            <th class="min-w-125px">STREAMER NAME</th>
                            <th class="min-w-125px">PERCENTAGE</th>
                            <th class="min-w-125px">COMMISSIONS</th>
                            <th class="min-w-125px">STATUS</th>
                            <th class="min-w-125px">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold" wire:loading.remove >
                        @forelse($streamers as $streamer)
                            <tr>
                                <td>
                                    <div class="badge badge-success tw-cursor-pointer" x-clipboard="'{{$streamer->code }}'">
                                        {{ $streamer->code }}
                                    </div>
                                </td>
                                <td class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $streamer->user_id }}</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-light fw-bold">{{ $streamer->user?->login_id }}</div>
                                </td>
                                <td>
                                    <div  class="badge badge-light fw-bold">
                                        {{ $streamer->name }}
                                    </div>
                                </td>

                                <td>
                                    <div class="badge badge-light fw-bold">{{ $streamer->code_percentage }}</div>
                                </td>
                                <td>
                                    <div class="badge badge-light fw-bold">{{ $streamer->topups_sum_amount * ($streamer->code_percentage / 100) }}</div>
                                </td>
                                <td>
                                    @if ($streamer->is_active)
                                        <div class="badge badge-success">Active</div>
                                    @else
                                        <div class="badge badge-warning">Not Active</div>
                                    @endif
                                </td>

                                <td>
                                    @if(($streamer->topups_sum_amount * ($streamer->code_percentage / 100)) > 0)
                                    <button class="btn btn-primary btn-sm tw-px-4 tw-py-2 tw-text-sm"
                                        x-on:click="payout({{ $streamer }})">Payout</button>
                                    @endif


                                    <button class="btn btn-danger btn-sm tw-px-4 tw-py-2 tw-text-sm"
                                        x-on:click="remove({{ $streamer }})">Remove</button>

                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center tw-text-gray-600">
                                    No streamers
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
                    {{ $streamers->links() }}
                </div>
            </div>
        </div>

    </div>

</div>




@push('scripts')
    <script>
        async function remove(streamer) {
            const payoutAmount = await @this.getPayoutAmount(streamer)
            Swal.fire({
                title: `Are you sure you want to remove ${streamer.name} as streamer ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                showLoaderOnConfirm: true,
                preConfirm: (data) => {
                    return @this.removeAsStreamer(streamer)
                },
                allowOutsideClick: () => !Swal.isLoading(),

            })
        }

        function payout(streamer){
            Swal.fire({
                title: `Are you sure you want to Payout ${streamer.name} as streamer with amount (${streamer.topups_sum_amount * (streamer.code_percentage / 100)})?`,
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                showLoaderOnConfirm: true,
                preConfirm: (data) => {
                    return @this.removeAsStreamer(streamer)
                },
                allowOutsideClick: () => !Swal.isLoading(),

            })
        }

        $(document).ready(function() {
            Livewire.on('alert', response => {
                Swal.fire(
                    response[0].type,
                    response[0].message,
                    response[0].type
                )
            })

        });
    </script>
@endpush
