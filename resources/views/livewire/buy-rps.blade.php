<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="col-12 col-xxl-8 tw-pr-2">
        <div class="card card-flush pt-3 mb-5 mb-lg-10">
            <form class="card-body" wire:submit="buy">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex flex-column mb-3 fv-row">
                            <div class="fs-5 fw-bold form-label mb-3">
                                Amount
                            </div>
                            <div class="tw-flex tw-gap-2">
                                <input wire:loading.attr="disabled" wire:model.live.debounce.100="amount" type="number"
                                class="form-control form-control-solid rounded-3 tw-col-span-3" placeholder="Topup Amount">
                                <div>
                                    <input wire:loading.attr="disabled" wire:model.live.debounce.200="streamerCode" type="text" class="form-control form-control-solid rounded-3" placeholder="Streamer code">
                                </div>
                            </div>
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if($streamerCodeData)
                        <div class="tw-bg-green-100 tw-p-5 tw-rounded-lg">
                            CODE: {{ $streamerCodeData->code }} <br>
                        </div>
                        @endif
                        <div class=" mb-4 fv-row tw-text-gray-600">
                            <div>Equivalent RPS: <span class="badge badge-success">{{ $this->EquivalentRPS }}</span>
                            </div>
                        </div>


                        <div class="d-flex flex-column mb-5 fv-row rounded-3 p-7 border border-dashed border-gray-300">
                            <label class="form-check form-check-custom form-check-solid">
                                <span class="form-check-label text-gray-600">
                                    After submitting this form, you will wait for the admin to approve
                                    your
                                    request.
                                </span>
                            </label>
                        </div>
                        <button class="btn btn-primary tw-my-4" type="submit" wire:loading.attr="disabled">Submit</button>
                    </div>
                    <div class="col-md-6">
                        <div class="image-input image-input-outline tw-relative">
                            <div class="image-input-wrapper w-325px h-250px tw-overflow-hidden">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" height="100%">
                                @endif
                            </div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" title="Change item image">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <input wire:model.live="image" type="file" name="avatar"
                                    accept=".png, .jpg, .jpeg .gif" />
                                <input type="hidden" name="avatar_remove" />
                            </label>
                        </div>
                        <div class="tw-mt-3">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                @if ($successMessage)
                    <div class="alert alert-success tw-mt-10">
                        {{ $successMessage }}
                    </div>
                @endif

                @if (session()->has('warning'))
                    <div class="alert alert-warning tw-mt-10">
                        {{ session('warning') }}
                    </div>
                @endif

            </form>
        </div>
    </div>
    <div class="col-12 col-xxl-4 tw-pr-2">
        <div class="card card-flush pt-3 mb-0">
            <div class="card-header">
                <div class="card-title">
                    <h2>Pending Topup</h2>
                </div>
            </div>
            <div class="card-body pt-0 fs-6">
                <div class="separator separator-dashed mb-7"></div>
                @if ($pendingTopup)
                    <div class="mb-7">
                        <h5 class="mb-3 tw-italic tw-text-gray-500">
                            {{ $pendingTopup->ref_id }}
                        </h5>
                        <div class="mb-0 tw-flex">
                            <span class="badge badge-light-warning me-2">Pending</span>
                            <span class="tw-flex tw-items-center tw-space-x-1">
                                <span class="fw-semibold text-gray-600">
                                    {{ number_format($pendingTopup->rps_amount) }}</span>
                                <span class="badge badge-secondary">RPS</span>
                            </span>
                        </div>
                    </div>
                @else
                    <div class="mb-7">
                        <h5 class="mb-3">No Pending Topup</h5>
                    </div>
                @endif
                <div class="separator separator-dashed mb-7"></div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            Livewire.on('pending-topup', function(data) {
                @this.set('pendingTopup', data[0]);
            })
        });
    </script>
@endpush
