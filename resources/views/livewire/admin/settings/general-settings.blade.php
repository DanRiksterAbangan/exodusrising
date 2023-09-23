<div class="card card-flush ">
    <div class="card-header tw-flex tw-items-center tw-justify-between">
        <div class="card-title d-flex flex-column">
            General Settings
        </div>
        @if (
            ($originalGenderCost != $changeGenderCost || $originalNameCost != $changeNameCost) &&
                auth()->user()->isSuperAdmin())
            <div class="tw-mt-3">
                <button wire:click="save" class="btn btn-primary">Save</button>
            </div>
        @endif
    </div>
    <hr class="tw-border-gray-400">
    <div class="card-body pt-4 tw-relative">

        <div class="tw-mb-2">
            <label for="">Change name cost</label>
            <div>
                <input wire:model.live.debounce.200ms="changeNameCost" type="number" class="form-control">
            </div>
        </div>

        <div>
            <label for="">Change gender cost</label>
            <div>
                <input wire:model.live.debounce.200ms="changeGenderCost" type="number" class="form-control">
            </div>
        </div>

    </div>

</div>


@push('scripts')
    <script>
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
