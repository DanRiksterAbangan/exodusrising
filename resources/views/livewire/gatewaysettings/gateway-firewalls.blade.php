<div>
    <div class="tw-mb-10">
        <div class="tw-text-lg tw-mb-2">Firewall</div>
        <div class="tw-mb-2 tw-flex tw-justify-between">
            <label class="tw-text-sm">Add Rules</label>
        </div>

        <div class="tw-grid md:tw-grid-cols-5 tw-gap-2">
            <input type="number" class="form-control tw-col-span-2" wire:model="packet_type" placeholder="Packet Type">

            <div wire:ignore>
                <select class="form-select form-select-solid fw-bold" data-placeholder="Select rule">
                    @foreach ($ruletypes as $key => $ruletype)
                        <option @if ($key == 'block') selected @endif value="{{ $key }}">
                            {{ ucfirst($ruletype) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button class="btn btn-primary" wire:click="addRule">Add Rule</button>
            </div>
        </div>
    </div>

    <div>
        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0 tw-relative">
            <thead class="tw-bg-white tw-w-full">
                <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                    <th class="p-0 pb-3 w-150px text-start">Packet Type</th>
                    <th class="p-0 pb-3 w-125px text-start">Rules</th>
                    <th class="p-0 pb-3 w-125px text-start">Status</th>
                    <th class="p-0 pb-3 w-125px text-start">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rules as $rule)
                    <tr>
                        <td class="p-0 py-1">
                            <a href="#">{{ $rule->packet_type }}</a>
                        </td>
                        <td class="p-0 py-1">
                            <a href="#">{{ $ruletypes[$rule->packet_rule] }}</a>
                        </td>
                        <td class="p-0 py-1">
                            @if ($rule->status == 'active')
                                <span class="badge badge-light-success">Active</span>
                            @else
                                <span class="badge badge-light-danger">Inactive</span>
                            @endif

                        </td>
                        <td class="p-0 py-1">
                            <a class="btn btn-danger btn-sm" wire:click="deleteRule({{ $rule->id }})">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="tw-text-center">No Rules</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
    <script nonce="{{ csp_nonce() }}">
        $(document).ready(function() {
            $('.form-select').select2();
            $('.form-select').on('change', function(e) {
                @this.set('packet_rule', e.target.value);
            });
        });
    </script>
@endpush
