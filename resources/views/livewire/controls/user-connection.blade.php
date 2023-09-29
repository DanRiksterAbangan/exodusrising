<div class="app-content flex-column-fluid">
    <div class="app-container container-xxl">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title tw-flex tw-justify-between tw-w-full">
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

                            <th class="min-w-125px">MACHINE ID</th>
                            <th class="min-w-125px">PCODE</th>
                            <th class="min-w-125px">LOGIN ID</th>
                            <th class="min-w-125px">CHARACTER NAME</th>
                            <th class="min-w-125px">STATUS</th>
                            <th class="min-w-125px">REMOTE ADDRESS</th>
                            <th class="min-w-125px">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold" wire:loading.remove wire:target="searchData">
                        @forelse($userLogins as $userLogin)
                            <tr>
                                <td class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary mb-1 tw-text-sm">{{ $userLogin->machine_id }}</a>
                                    </div>
                                </td>
                                <td>
                                    <span>{{ $userLogin->pcode }}</span>
                                </td>
                                <td>
                                    <span>{{ $userLogin->login_id }}</span>
                                </td>
                                <td>
                                    <span>{{ $userLogin->character_name }}</span>
                                </td>

                                <td>
                                    @if ($userLogin->status == 'online')
                                        <div class="badge badge-success">
                                            <span>{{ ucfirst($userLogin->status) }}</span>
                                        </div>
                                    @elseif($userLogin->status == 'offline')
                                        <div class="badge badge-secondary">
                                            <span>{{ ucfirst($userLogin->status) }}</span>
                                        </div>
                                    @else
                                        <div class="badge badge-danger">
                                            <span>{{ ucfirst($userLogin->status) }}</span>
                                        </div>
                                    @endif
                                </td>


                                <td>
                                    <span>{{ $userLogin->remote_address }}</span>
                                </td>

                                <td></td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center tw-text-gray-600">
                                    No Connections
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tbody class="text-gray-600 fw-semibold" wire:loading>
                        <tr>
                            <td colspan="8" class="text-center tw-text-gray-600">
                                Loading...
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="d-flex justify-content-end tw-py-5 tw-pr-5">
                <div>
                    {{-- {{ $giftcodes->links() }} --}}
                </div>
            </div>
        </div>

    </div>


</div>





@push('scripts')
    <script>
        $(document).ready(function() {
            $('.form-select').select2();
            $('.form-select').on('change', function(e) {
                @this.set('category', e.target.value);
            });

            Livewire.on('alert', response => {
                $(`#createGiftCodes`).modal('hide');
                Swal.fire(
                    response[0].type,
                    response[0].message,
                    response[0].type
                )
                if (response[0].create) {
                    @this.giftcodesData();
                }
            })

        });
    </script>
@endpush
