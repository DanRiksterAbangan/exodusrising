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
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end " style="align-items:flex-start">
                        <div style="width:200px" wire:ignore>
                            <select class="form-select form-select-solid fw-bold" data-placeholder="Select category">
                                <option style="color: #fff; background-color: #333; padding-top: 10px" value="all"
                                    selected>
                                    All</option>
                                @foreach ($categories as $category)
                                    <option value="{{ strtolower($category ?? '') }}">{{ $category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

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
                                <td class="d-flex align-items-center">
                                    <div class="symbol symbol-50px overflow-hidden me-3">
                                        <a href="#">
                                            <div class="symbol-label">
                                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                                    class="w-100" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $item->name }}</a>
                                        <small>{{ $item->description }} </small>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-light fw-bold">{{ $item->stack }}</div>
                                </td>
                                <td>
                                    <div class="badge badge-success">
                                        {{ $item->category }}
                                    </div>
                                </td>
                                <td>
                                    <span> {{ $item->discounted_price }}</span>
                                    @if ($item->discount > 0)
                                        <div class="badge badge-warning fw-bold">-{{ $item->discount }}%
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary me-3 btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#kt_customers_export_modal{{ $item->id }}">
                                        Buy Now</button>
                                    <button type="button" class="btn btn-warning me-3 btn-sm"
                                        wire:click="addtocart({{ $item }})">
                                        Add to cart</button>
                                </td>

                            </tr>
                            <div class="modal fade" id="kt_customers_export_modal{{ $item->id }}" wire:ignore
                                tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="fw-bold">Item Details </h2>
                                            <div id="kt_customers_export_close" data-bs-toggle="modal"
                                                class="btn btn-icon btn-sm btn-active-icon-primary">
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137"
                                                            width="16" height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-body scroll-y my-2">
                                            <div class="card">
                                                <div class="card-body ">
                                                    <div class="mb-5">
                                                        <div class="symbol symbol-75px d-flex flex-center flex-column">
                                                            <img src="{{ Storage::url($item->image) }}"
                                                                alt="{{ $item->name }}" class="w-full" />
                                                        </div>
                                                    </div>
                                                    <div class="fs-4 text-gray-800 fw-bold mb-0 text-center">
                                                        {{ $item->name }}</div>
                                                    <div class="fw-semibold text-gray-400 mb-6 text-center">
                                                        {{ $item->description }} The stats ass ed 22+ STR and
                                                        30+ AGI
                                                    </div>
                                                    <div class=" mb-5">
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">

                                                            <div class="fw-semibold text-gray-400">RPS:
                                                                <div class="fs-6 fw-bold text-gray-700">
                                                                    {{ number_format($item->amount, 2, '.', ',') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-10">
                                                        <label for="Stack">Quantity:</label>
                                                        <select class="form-control" wire:model.live="quantity"
                                                            name="stack" id="">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <button data-bs-toggle="modal"
                                                            wire:click="buyItem({{ $item }})"
                                                            class="btn btn-sm btn-primary fw-bold ">Buy
                                                            Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center tw-text-gray-600">
                                    No records
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end tw-py-5 tw-pr-5">
                <div>
                    {{ $items->links() }}
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

            Livewire.on('buy_response', response => {
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

            Livewire.on('addtocart', response => {
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
        });
    </script>
@endpush
