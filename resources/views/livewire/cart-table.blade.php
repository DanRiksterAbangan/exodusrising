<div class="app-content flex-column-fluid">
    <div class="app-container container-xxl">
        <div class="card tw-mb-0">
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
                        <input wire:model="search" type="text" wire:keydown.enter="searchData"
                            class="form-control form-control-solid w-250px ps-14" placeholder="Search Item"
                            name="search" />
                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9 ">
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                style="width: 29.8906px;">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    @if ($items->count())
                                        <input wire:model.live="selectAll" class="form-check-input" type="checkbox"
                                            data-kt-check="true"
                                            data-kt-check-target="#kt_ecommerce_products_table .form-check-input"
                                            value="1" wfd-id="id18">
                                    @endif
                                </div>
                            </th>
                            <th class="min-w-125px">Item</th>
                            <th class="min-w-125px">Stack(s)</th>
                            <th class="min-w-125px">Category</th>
                            <th class="min-w-125px">Amount</th>
                            <th class="min-w-125px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        @forelse($items as $item)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox"
                                            wire:change="toggleItem({{ $item }})"
                                            @if (in_array($item->id, $itemSelections?->toArray())) checked @endif>
                                    </div>
                                </td>
                                <td class="d-flex align-items-center">
                                    <div class="symbol symbol-50px overflow-hidden me-3">
                                        <a href="#">
                                            <div class="symbol-label">
                                                <img src="{{ Storage::url($item->item->image) }}"
                                                    alt="{{ $item->name }}" class="w-100" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $item->item->name }}</a>
                                        <small>{{ $item->item->description }} </small>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative w-md-200px tw-flex">
                                        <!--begin::Decrease control-->
                                        <button wire:click.throttle.100ms="decrement({{ $item->id }})"
                                            type="button" class="btn" data-kt-dialer-control="decrease">
                                            {!! Mdi::mdi('minus', '', 20, ['fill' => '#555']) !!} </button>
                                        <!--end::Decrease control-->

                                        <!--begin::Input control-->
                                        <input type="text" class="form-control text-center tw-m-0"
                                            data-kt-dialer-control="input" placeholder="Amount" readonly=""
                                            value="{{ $item->stack }}" wfd-id="id21">
                                        <!--end::Input control-->

                                        <!--begin::Increase control-->
                                        <button wire:click.throttle.100ms="increment({{ $item->id }})"
                                            type="button" class="btn" data-kt-dialer-control="increase">
                                            {!! Mdi::mdi('plus', '', 20, ['fill' => '#555']) !!} </button>
                                        <!--end::Increase control-->
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-success">
                                        {{ $item->item->category }}
                                    </div>
                                </td>
                                <td>
                                    <span> {{ number_format($item->discounted_price) }}</span>
                                    @if ($item->item->discount > 0)
                                        <div class="badge badge-warning fw-bold">-{{ $item->item->discount }}%
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger me-3 btn-sm"
                                        wire:click="removeItem({{ $item }})">
                                        Remove</button>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center tw-text-gray-600">
                                    No records
                                </td>
                            </tr>
                        @endforelse
                        @if ($items->count())
                            <tr>
                                <td colspan="3"></td>
                                <td>
                                    Total:
                                </td>
                                <td class="tw-text-lg tw-flex tw-items-center tw-space-x-2">
                                    <span class="badge badge-secondary">RPS</span>
                                    <span> {{ number_format($this->TotalPrice) }}</span>
                                </td>
                            </tr>
                            @if ($this->TotalPrice > 0)
                                <tr>
                                    <td colspan="4"></td>
                                    <td>
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#checkout-items-modal">Checkout</button>
                                    </td>
                                </tr>
                            @endif
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="checkout-items-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">

            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Checkout Items</h2>
                    <div id="kt_customers_export_close" data-bs-toggle="modal"
                        class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y my-2 tw-pt-2">
                    <div class="card">
                        <div class="card-body tw-pt-0">
                            <div class="tw-mb-4 tw-italic">
                                Are you sure you want to checkout these Items?
                            </div>
                            <span class="tw-list-disc tw-py-10 tw-pt-5 tw-grid tw-grid-cols-1">
                                @foreach ($this->selectedItems as $item)
                                    <li><span class="tw-font-semibold">{{ $item->item->name }}</span> - <span
                                            class=" tw-italic">{{ $item->stack }} stack(s)</span>
                                    </li>
                                @endforeach
                            </span>


                            <div>
                                <span class="tw-text-sm"> Total Cost</span>
                                <div class="tw-text-xl"> <span class="badge badge-secondary">RPS</span>
                                    <span> {{ number_format($this->TotalPrice) }}</span>
                                </div>
                            </div>


                            <div class="tw-flex tw-justify-end">
                                <button wire:loading.attr="disabled" wire:click="buyItems"
                                    class="btn btn-sm btn-primary fw-bold ">Checkout
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script nonce="{{ csp_nonce() }}" src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}">
    </script>

    <script nonce="{{ csp_nonce() }}">
        $(document).ready(function() {

            Livewire.on('buy_response', response => {
                $("#checkout-items-modal").modal('hide');
                if (response[0] && response[0].success) {
                    Swal.fire(
                        'Success',
                        response[0].message,
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Warning',
                        response[0] && response[0].message || "Please try again later",
                        'warning'
                    )
                }

            })


            var dialerElement = document.querySelector("#dialerStackChange");

            // Create dialer object and initialize a new instance
            var dialerObject = new KTDialer(dialerElement, {
                min: 1000,
                max: 50000,
                step: 1000,
                prefix: "$",
                decimals: 2
            });

        });
    </script>
@endpush
