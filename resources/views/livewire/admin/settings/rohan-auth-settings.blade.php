<div class="card card-flush ">
    <div class="card-header tw-flex tw-justify-between tw-items-center">
        <div class="card-title d-flex flex-column">
            Rohan Auth Settings
        </div>
        @if (
            ($exeVersion != $originalExeVersion ||
                $nation != $originalNation ||
                $originalValidateExeVersion != $validateExeVersion ||
                $originalValidateNation != $validateNation) &&
                auth()->user()->isSuperAdmin())
            <div>
                <button wire:click="save" class="btn btn-primary">Save</button>
            </div>
        @endif
    </div>
    <hr class="tw-border-gray-400">
    <div class="card-body pt-4 tw-relative">
        <div class="row tw-mb-4">
            <div class="tw-mb-2 col-md-6 col-12">
                <label>EXE VERSION</label>
                <div>
                    <input wire:model.live.debounce.200ms="exeVersion" type="text" class="form-control"
                        placeholder="EXE VERSION">
                </div>
            </div>

            <div class="tw-mb-2 col-md-6 col-12">
                <label>VALIDATE EXE VERSION</label>
                <div class="tw-mt-4">
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox"
                            wire:model.live.debounce.200ms="validateExeVersion">
                    </div>
                </div>
            </div>
        </div>
        <div class="row tw-mb-4">
            <div class="tw-mb-2 col-md-6 col-12">
                <label>NATION</label>
                <div>
                    <input wire:model.live.debounce.200ms="nation" type="text" class="form-control"
                        placeholder="EXE VERSION">
                </div>
            </div>

            <div class="tw-mb-2 col-md-6 col-12">
                <label>VALIDATE NATION</label>
                <div class="tw-mt-4">
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" wire:model.live.debounce.200ms="validateNation">
                    </div>
                </div>
            </div>
        </div>

        <table class="table align-middle table-row-dashed fs-6 gy-2">
            <thead>
                <tr>
                    <th>SERVER NAME</th>
                    <th>IP</th>
                    <th>STATUS</th>
                    <th>MESSAGE</th>
                    <th>SHOW</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($serverList as $server)
                    <tr>
                        <td>{{ $server['name'] }}</td>
                        <td>{{ $server['ip'] }}</td>
                        <td>{{ $server['status'] }}</td>
                        <td>{{ $server['message'] }}</td>
                        <td>{{ $server['show'] }}</td>
                        <td></td>
                    </tr>
                @empty
                    <tr>
                        <th>NO SERVER</th>
                    </tr>
                @endforelse
            </tbody>
        </table>



    </div>

</div>
