<div class="app-content flex-column-fluid">
    <div class="app-container container-xxl">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="tw-grid tw-grid-cols-5 tw-gap-x-5">
                        <div>
                            <label for="" class="tw-text-gray-500 tw-text-base">Item Type</label>
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                            height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                            fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <input wire:model="itemTypeSearch" type="text" wire:keydown.enter="searchData"
                                    class="form-control form-control-solid  ps-14" placeholder="Search" />
                            </div>
                        </div>
                        <div>
                            <label for="" class="tw-text-gray-500 tw-text-base">Equip Level</label>
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                            height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                            fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <input wire:model="equipLevelSearch" type="text" wire:keydown.enter="searchData"
                                    class="form-control form-control-solid  ps-14" placeholder="Search" />
                            </div>
                        </div>

                        <div>
                            <label for="" class="tw-text-gray-500 tw-text-base">Equip Str</label>
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                            height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                            fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <input wire:model="equipStrSearch" type="text" wire:keydown.enter="searchData"
                                    class="form-control form-control-solid  ps-14" placeholder="Search" />
                            </div>
                        </div>

                        <div>
                            <label for="" class="tw-text-gray-500 tw-text-base">Equip Dex</label>
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                            height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                            fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <input wire:model="equipDexSearch" type="text" wire:keydown.enter="searchData"
                                    class="form-control form-control-solid  ps-14" placeholder="Search" />
                            </div>
                        </div>

                        <div>
                            <label for="" class="tw-text-gray-500 tw-text-base">Equip Int</label>
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                            height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                            fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <input wire:model="equipIntSearch" type="text" wire:keydown.enter="searchData"
                                    class="form-control form-control-solid  ps-14" placeholder="Search" />
                            </div>
                        </div>

                        <div>
                            <label for="" class="tw-text-gray-500 tw-text-base">Stack</label>
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                            height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                            fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <input wire:model="stackSearch" type="text" wire:keydown.enter="searchData"
                                    class="form-control form-control-solid  ps-14" placeholder="Search" />
                            </div>
                        </div>

                        <div>
                            <label for="" class="tw-text-gray-500 tw-text-base">Char Name</label>
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                            height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                            fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <input wire:model="charNameSearch" type="text" wire:keydown.enter="searchData"
                                    class="form-control form-control-solid  ps-14" placeholder="Search" />
                            </div>
                        </div>

                        <div>
                            <label for="" class="tw-text-gray-500 tw-text-base">User ID</label>
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                            height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                            fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <input wire:model="userIdSearch" type="text" wire:keydown.enter="searchData"
                                    class="form-control form-control-solid  ps-14" placeholder="Search" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-125px">ITEM #</th>
                            <th class="min-w-125px">ITEM TYPE</th>
                            <th class="min-w-125px">ATTR</th>
                            <th class="min-w-125px">CHARACTER NAME</th>
                            <th class="min-w-125px">USER NAME</th>
                            <th class="min-w-125px">STACK</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold" wire:loading.remove>
                        @forelse($items as $item)
                            <tr>
                                <td class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $item->id }}</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-light fw-bold">{{ $item->type }}</div>
                                </td>
                                <td>
                                    <div>
                                        <ul class="tw-list-disc">
                                            @php
                                                $hexData = unpack('H*hex', $item->attr)['hex'];
                                                for ($i = 0; $i < strlen($hexData); $i += 6) {
                                                    $hexPair = substr($hexData, $i, 2);
                                                
                                                    if ($hexPair == '00') {
                                                        continue;
                                                    }
                                                    $enumKey = ItemStats::hasValue(Str::upper($hexPair) . '');
                                                    if ($enumKey && $enumKey !== null) {
                                                        $enumKey = ItemStats::getKey(Str::upper($hexPair));
                                                        $hexValue = substr($hexData, $i + 2, 4);
                                                        $reversedHex = strrev($hexValue);
                                                        $decimalValue = hexdec($reversedHex);
                                                        echo "<li>$enumKey : $decimalValue </li>";
                                                    }
                                                }
                                            @endphp
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-light fw-bold">{{ $item->character?->name }}</div>
                                </td>

                                <td>
                                    <div class="badge badge-light fw-bold">{{ $item->user?->login_id }}</div>
                                    <span class="tw-text-sm">#{{ $item->user_id }}</span>
                                </td>

                                <td>
                                    <div class="badge badge-primary fw-bold">{{ $item->stack }}</div>
                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center tw-text-gray-600">
                                    No users
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
        </div>
        <div class="d-flex flex-stack flex-wrap pt-10">
            <div class="fs-6 fw-semibold text-gray-700">
                Showing {{ $page }} to {{ $limit }} of {{ $itemCount }} entries
            </div>
            <!--begin::Pages-->
            <ul class="pagination">

                <li class="page-item previous">
                    <button wire:loading.attr="disabled" {{ $page == 1 ? 'disabled' : '' }}
                        class="page-link tw-space-x-2" wire:click="prevPage"><i class="previous"></i>
                        <span>Prev</span></button>

                </li>
                <li class="page-item next">
                    <button wire:loading.attr="disabled" {{ $page == ceil($itemCount / $limit) ? 'disabled' : '' }}
                        class="page-link tw-space-x-2" wire:click="nextPage"><span>Next</span><i
                            class="next"></i></button>
                </li>
            </ul>
            <!--end::Pages-->
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endpush
