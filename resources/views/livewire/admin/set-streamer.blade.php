<form wire:submit="setStreamer({{ $user->user_id }})">
    <div class="modal-header">
        <h1 class="fw-bold tw-text-xl">Set Streamer {{ $user->login_id }}
        </h1>
        <div class="btn btn-icon btn-sm btn-active-icon-primary"
            data-bs-dismiss="modal">
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
        <div class="tw-mb-5">
            <label>Streamer Name</label>
            <input type="text" wire:model.live.debounce.500ms="streamerName" class="form-control">
            @error('streamerName') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Streamer Code</label>
            <input type="text" wire:model.live.debounce.500ms="streamerCode" class="form-control">
            @error('streamerCode') <span class="text-danger">{{ $message }}</span> @enderror
        </div>


        <div class="tw-flex tw-justify-end tw-mt-10">
            <button class="btn btn-danger" type="submit" wire:loading.attr="disabled">Set Now</button>
        </div>
    </div>
</form>
