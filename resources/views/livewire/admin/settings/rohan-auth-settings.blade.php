<div class="card card-flush ">
    <div class="card-header tw-flex tw-justify-between tw-items-center">
        <div class="card-title d-flex flex-column">
            Rohan Auth Settings
        </div>
        @if (
            $exeVersion != $originalExeVersion ||
                $nation != $originalNation ||
                $originalValidateExeVersion != $validateExeVersion ||
                $originalValidateNation != $validateNation ||
                $originalMaintenance != $maintenance ||
                $originalAllowedOnMaintenance != $allowedOnMaintenance)
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


        <div class="row tw-mb-4">
            <div class="tw-mb-2 col-md-12 col-12">
                <label>Maintenance</label>
                <div class="tw-mt-4">
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" wire:model.live.debounce.200ms="maintenance">
                    </div>
                </div>
            </div>

            <div class="tw-mb-2 col-md-12 col-12">
                <label>Allowed GMS</label>
                <div class="tw-mt-4">
                    <textarea class="form-control" type="text" wire:model.live.debounce.200ms="allowedOnMaintenance"></textarea>
                </div>
            </div>
        </div>
        <div class="tw-my-4">
            <button class="btn btn-primary btn-sm" wire:click="addServer">Add Server</button>
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
                @forelse($serverList as $key => $server)
                    <tr>
                        <td>{{ $server['name'] }}</td>
                        <td>{{ $server['ip'] }}</td>
                        <td>{{ $server['status'] }}</td>
                        <td>{{ $server['message'] }}</td>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox"
                                    wire:change="toggleServer({{ $key }})"
                                    @if ($server['show']) checked @endif>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#updateServermodal{{ $key }}">Update</button>
                            <span x-data="{}">
                                <button class="btn btn-danger btn-sm" x-on:click="removeServer({{ $key }})">
                                    Remove</button></span>

                            <div class="modal fade" id="updateServermodal{{ $key }}" tabindex="-1"
                                aria-modal="true" role="dialog" data-bs-backdrop='static'>
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="fw-bolder">Update Server</h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">x</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row tw-gap-y-4">
                                                <div class="col-md-6">
                                                    <label for="">Server Name</label>
                                                    <input type="text"
                                                        wire:model="serverList.{{ $key }}.name"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">IP</label>
                                                    <input type="text" wire:model="serverList.{{ $key }}.ip"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Status</label>
                                                    <input type="text"
                                                        wire:model="serverList.{{ $key }}.status"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Message</label>
                                                    <textarea wire:model="serverList.{{ $key }}.message" class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="tw-mt-4">
                                                <div class="btn btn-primary"
                                                    wire:click="saveServer({{ $key }})">Save</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
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

@push('scripts')
    <script>
        function removeServer(key) {
            Swal.fire({
                title: `Are you sure you want to remove this server ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                showLoaderOnConfirm: true,
                preConfirm: (data) => {
                    return @this.removeServer(key)
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        }
    </script>
@endpush
