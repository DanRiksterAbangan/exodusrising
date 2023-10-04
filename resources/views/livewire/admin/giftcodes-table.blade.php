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
                    <div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createGiftCodes">Create
                            Giftcode</button>

                    </div>
                </div>

            </div>
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                            <th class="min-w-125px">CODE</th>
                            <th class="min-w-125px">AMOUNT</th>
                            <th class="min-w-125px">STATUS</th>
                            <th class="min-w-125px">CLAIMED BY</th>
                            <th class="min-w-125px">CREATED BY</th>
                            <th class="min-w-125px">DESCRIPTION</th>
                            <th class="min-w-125px">CREATED DATE</th>
                            <th class="min-w-125px">EXPIRED</th>
                            <th class="min-w-125px">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold" wire:loading.remove wire:target="searchData">
                        @forelse($giftcodes as $giftcode)
                            <tr>
                                <td class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $giftcode->code }}</a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{ $giftcode->rps_amount }}
                                    </div>
                                </td>
                                <td>
                                    @if ($giftcode->status == 'active' && $giftcode->expired_at > now())
                                        <div class="badge badge-success">
                                            {{ $giftcode->status }}
                                        </div>
                                    @elseif($giftcode->status == 'claimed')
                                        <div class="badge badge-warning">
                                            {{ $giftcode->status }}
                                        </div>
                                    @else
                                        <div class="badge badge-danger">
                                            Expired
                                        </div>
                                    @endif

                                </td>
                                <td>
                                    @if ($giftcode->claimedBy)
                                        <div class="badge badge-success">
                                            {{ $giftcode->claimedBy?->name }}
                                        </div>
                                    @else
                                        <div class="badge badge-danger">
                                            Not Claimed
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="badge badge-light fw-bold">{{ $giftcode->createdBy?->name }}</div>
                                </td>

                                <td>
                                    <div class="tw-text-sm">{{ $giftcode->description }}</div>
                                </td>

                                <td>
                                    <div class="badge badge-light fw-bold">{{ $giftcode->created_at }}</div>

                                </td>
                                <td>
                                    @if (!$giftcode->claimedBy)
                                        <div class="badge badge-light fw-bold">
                                            {{ (new Carbon($giftcode->expired_at))->diffForHumans() }}
                                        </div>
                                    @else
                                        <div class="badge badge-light fw-bold">-</div>
                                    @endif
                                </td>
                                <td>
                                    <button>
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            wire:click="deleteGiftCode({{ $giftcode->id }})">
                                            {!! Mdi::mdi('delete', '', 20, ['fill' => '#555']) !!}
                                        </div>
                                    </button>
                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center tw-text-gray-600">
                                    No users
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
                    {{ $giftcodes->links() }}
                </div>
            </div>
        </div>

    </div>



    <div class="modal fade" id="createGiftCodes" tabindex="-1" aria-modal="true" role="dialog"
        data-bs-backdrop='static'>
        <div class="modal-dialog modal-dialog-centered mw-450px">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="fw-bold tw-text-xl">Create Giftcode
                    </h1>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        {!! Mdi::mdi('close', '', 20, ['fill' => '#555']) !!}
                    </div>
                </div>
                @livewire('admin.create-giftcode')
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
