<div id="kt_app_content_container" class="app-container  container-xxl tw-px-0">
    <div class="table-responsive ">
        <div class="tw-flex tw-justify-start tw-p-5">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <input wire:model.live.debounce.500ms="search" type="text"
                    class="form-control form-control-solid  ps-14" placeholder="Search" />
            </div>
        </div>
        <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9 ">
            <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-250px ps-9">Date</th>
                    <th class="min-w-150px px-0">Name</th>
                    <th class="min-w-350px">Description</th>
                    <th class="min-w-150px px-0">Stack</th>
                    <th>Amount <span class="badge badge-primary tw-bg-gray-400 tw-text-xs tw-py-1">RPS</span></th>
                </tr>
            </thead>
            <tbody class="fs-6 fw-semibold text-gray-600">
                @forelse ($transactions as $transaction)
                    <tr>
                        <td class="ps-9">{{ (new Carbon($transaction->created_at))->toDayDateTimeString() }}</td>
                        <td>{{ $transaction->item->name }}</td>
                        <td>{{ $transaction->item->description }}</td>
                        <td>
                            <span class="badge badge-secondary">{{ $transaction->stacks }}</span>
                        </td>
                        <td class="text-success">

                            <span>{{ $transaction->amount }}</span>
                            @if ($transaction->discount > 0)
                                <s class="tw-italic tw-text-xs text-danger">{{ $transaction->original_amount }}</s>
                            @endif
                        </td>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="tw-text-center">
                            No Transactions
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    <div class="d-flex justify-content-end tw-py-5 tw-pr-5">
        <div>
            {{ $transactions->links() }}
        </div>
    </div>

</div>


@push('scripts')
    <script nonce="{{ csp_nonce() }}" src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endpush
