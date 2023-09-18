<form wire:submit="changeName">
    <div class="modal-header">
        <h1 class="fw-bold tw-text-xl">Change Name</h1>
        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
            {!! Mdi::mdi('close', '', 20, ['fill' => '#555']) !!}
        </div>
    </div>
    <div class="modal-body pt-10 pb-15 px-lg-17">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

        @if (session()->has('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <div class="tw-flex tw-flex-col tw-space-y-3">

            <ul class="tw-list-disc tw-mb-5 tw-italic">
                <li>Change name will cost {{ settings()->change_name_cost }} RPS</li>
                <li>User must not in game else it will disconnect.</li>
            </ul>

            <div>
                <div class="tw-flex tw-items-center tw-gap-3 tw-mb-10">
                    <div class="tw-text-lg tw-font-semibold">{{ $character->name }}</div>
                    <div>
                        {!! Mdi::mdi('arrow-right-bold') !!}
                    </div>
                    <div class="tw-text-lg tw-font-semibold">
                        {{ $newName }}
                    </div>
                </div>

                <div class="form form-group">
                    <label for="" class="tw-mb-2">New Name</label>
                    <input wire:model.live.debounce.500="newName" type="text" class="form-control"
                        placeholder="New Name">
                    @error('newName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="tw-flex tw-justify-end tw-mt-10">
            <button class="btn btn-primary" type="submit">Change Name</button>
        </div>
    </div>
</form>

@push('scripts')
    <script>
        $(document).ready(() => {
            Livewire.on('updatedUser', (user) => {
                document.getElementById('user_points').innerHTML = user[0].Point
            })
        })
    </script>
@endpush
