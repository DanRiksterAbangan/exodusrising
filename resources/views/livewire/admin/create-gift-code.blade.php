<form wire:submit.prevent="createGiftCode" novalidate="novalidate">
    <div class="modal-body">

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


        <div class="tw-grid tw-gap-y-2 tw-mb-3 form-group">
            <label for="giftcode" class="tw-text-lg">Amount</label>
            <input type="number" wire:model="gcamount" class="form-control">
            @error('gcamount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="tw-grid tw-gap-y-2 tw-mb-3">
            <label for="giftcode" class="tw-text-lg">Description</label>
            <textarea wire:model="gcdescription" cols="30" rows="2" class="form-control"></textarea>
            @error('gcdescription')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="tw-grid tw-gap-y-2">
            <label for="giftcode" class="tw-text-lg">Days Expired</label>
            <input type="number" wire:model="gcdays" class="form-control">
            @error('gcdays')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="tw-mt-5">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </div>
</form>
