<div class="app-content flex-column-fluid">
    <div class="app-container container-xxl">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title tw-flex tw-flex-col">
                    <div class="tw-grid tw-grid-cols-8 tw-gap-x-5">
                        <div>
                            <label for="" class="tw-text-gray-500 tw-text-base">Item Type</label>
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
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
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
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
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
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
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
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)"
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
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)"
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
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)"
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
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)"
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
                    <div class="tw-flex tw-justify-start tw-w-full tw-mt-4">
                        <div>
                            <div x-data="{ stats: [] }" x-init="stats = {{ json_encode($searchStat) }}">
                                <div class="tw-flex tw-items-center tw-space-x-3">
                                    <button
                                        x-on:click="if(!!!stats.find(stat=> stat.name == document.getElementById('statsSelection').value  )){stats.push({ name: document.getElementById('statsSelection').value ,value: 0})}"
                                        class="tw-px-4 tw-py-3 btn btn-primary tw-flex tw-items-center">{!! Mdi::mdi('plus', 'tw-text-white', 20, [
                                            'fill' => '#fff',
                                        ]) !!}
                                        <span>Add
                                            Stats</span></button>
                                    <div style="width:200px" wire:ignore>
                                        <select id="statsSelection" class="form-select form-select-solid fw-bold"
                                            data-placeholder="Select category">

                                            @foreach ($itemStatsList as $statName)
                                                <option value="{{ $statName }}">
                                                    {{ $statName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div
                                    class="tw-grid tw-grid-cols-8 tw-gap-2 tw-p-4 tw-rounded-lg tw-bg-blue-100 tw-mt-2">
                                    <template x-for="(stat,index) in stats" :key="stat.name">
                                        <div class="tw-relative">
                                            <label class="tw-text-gray-500 tw-uppercase tw-text-xs"
                                                x-text="stat.name"></label>
                                            <div class="d-flex align-items-center position-relative my-1">
                                                <input x-model="stat.value" value="0" type="number"
                                                    class="form-control form-control-solid" placeholder="Value" />
                                            </div>
                                            <button
                                                x-on:click="stats = stats.filter((item) => item.name !== stat.name); $wire.clearStat(stat)"
                                                class="tw-italic tw-text-gray-500 tw-text-xs">Remove</button>

                                        </div>
                                    </template>
                                </div>
                                <template x-if="stats.length > 0">
                                    <button class="btn btn-primary btn-sm tw-mt-2"
                                        x-on:click="$wire.setStats(stats)">Search</button>
                                </template>


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
                                                        $bytePairs = str_split($hexValue, 2);
                                                        $reversedBytePairs = array_reverse($bytePairs);
                                                        $reversedHexValue = implode('', $reversedBytePairs);
                                                        $decimalValue = hexdec($reversedHexValue);
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
        <div class="d-flex justify-content-end tw-mt-10 tw-p-10">
            <div>
                {{ $items->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script nonce="{{ csp_nonce() }}">
        $(document).ready(() => {
            $('.form-select').select2();
        })
    </script>
@endpush
