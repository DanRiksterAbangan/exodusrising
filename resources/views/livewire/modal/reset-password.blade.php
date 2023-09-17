<form wire:submit="changePassword">
    <div class="modal-header">
        <h1 class="fw-bold tw-text-xl">Change Password</h1>
        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
            {!! Mdi::mdi('close', '', 20, ['fill' => '#555']) !!}
        </div>
    </div>
    <div class="modal-body pt-10 pb-15 px-lg-17">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
        <div class="tw-flex tw-flex-col tw-space-y-3">
            <div class="form form-group">
                <label for="">Old Password</label>
                <input wire:model="old_password" type="password" class="form-control" placeholder="Old Password">
                @error('old_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form form-group">
                <label for="">New Password</label>
                <input wire:model="password" type="password" class="form-control" placeholder="New Password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form form-group">
                <label for="">Confirm Password</label>
                <input wire:model="password_confirmation" type="password" class="form-control"
                    placeholder="Confirm Password">
            </div>

        </div>

        <div class="tw-flex tw-justify-end tw-mt-10">
            <button class="btn btn-primary" type="submit">Change Password</button>
        </div>
    </div>
</form>
