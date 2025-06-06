<div class="tw-w-full">
    <div class="tw-grid md:tw-grid-cols-10 tw-gap-4 tw-w-full">
        <div class="tw-grid md:tw-grid-cols-2 tw-col-span-5 tw-gap-2">
            <div class="form-check form-check-custom form-check-solid form-check-success form-switch">
                <input class="form-check-input w-35px h-20px" type="checkbox" id="autoloot" wire:model="farming.autoloot"
                    @if ($farming['autoloot']) checked @endif>
                <label class="form-check-label text-gray-700 fw-bold" for="autoloot">Autoloot</label>
            </div>

            <div class="form-check form-check-custom form-check-solid form-check-success form-switch">
                <input class="form-check-input w-35px h-20px" type="checkbox" id="autolootipticket"
                    wire:model="farming.autoloot_ipticket" @if ($farming['autoloot_ipticket']) checked @endif>
                <label class="form-check-label text-gray-700 fw-bold" for="autolootipticket">Autoloot
                    IPTCKET</label>
            </div>

            <div class="form-check form-check-custom form-check-solid form-check-success form-switch">
                <input class="form-check-input w-35px h-20px" type="checkbox" id="autolootarmor"
                    wire:model="farming.autoloot_armor" @if ($farming['autoloot_armor']) checked @endif>
                <label class="form-check-label text-gray-700 fw-bold" for="autolootarmor">Autoloot Armor</label>
            </div>

            <div class="form-check form-check-custom form-check-solid form-check-success form-switch">
                <input class="form-check-input w-35px h-20px" type="checkbox" id="autolootweapon"
                    wire:model="farming.autoloot_weapon" @if ($farming['autoloot_weapon']) checked @endif>
                <label class="form-check-label text-gray-700 fw-bold" for="autolootweapon">Autoloot Weap</label>
            </div>

            <div class="form-check form-check-custom form-check-solid form-check-success form-switch">
                <input class="form-check-input w-35px h-20px" type="checkbox" id="autolootacce"
                    wire:model="farming.autoloot_acce" @if ($farming['autoloot_acce']) checked @endif>
                <label class="form-check-label text-gray-700 fw-bold" for="autolootacce">Autoloot Acce</label>
            </div>
        </div>

        <div class="tw-col-span-5">
            <div class="tw-border tw-border-gray-200 tw-rounded-lg tw-p-4">
                <div wire:ignore>
                    <div>
                        <label for="">Talisman that to enable autoloot</label>
                    </div>
                    <input id="tagifyme" class="form-control" pattern='^[0-9]+$' autocomplete="false">
                </div>
            </div>
        </div>
    </div>

    <div class="tw-grid tw-gird-cols-2 sm:tw-grid-cols-4 tw-my-2 tw-gap-2">
        <div>
            <label for="">Min Armor</label>
            <input type="text" class="form-control" placeholder="Min Armor" wire:model="farming.min_armor">
        </div>
        <div>
            <label for="">Max Armor</label>
            <input type="text" class="form-control" placeholder="Max Armor" wire:model="farming.max_armor">
        </div>

        <div>
            <label for="">Min Weapon</label>
            <input type="text" class="form-control" placeholder="Min Weapon" wire:model="farming.min_weapon">
        </div>
        <div>
            <label for="">Max Weapon</label>
            <input type="text" class="form-control" placeholder="Max Weapon" wire:model="farming.max_weapon">
        </div>

        <div>
            <label for="">Min Weapon %</label>
            <input type="text" class="form-control" placeholder="Min Weapon %"
                wire:model="farming.min_weapon_percent">
        </div>
        <div>
            <label for="">Max Weapon %</label>
            <input type="text" class="form-control" placeholder="Max Weapon %"
                wire:model="farming.max_weapon_percent">
        </div>

        <div>
            <label for="">Min Acce</label>
            <input type="text" class="form-control" placeholder="Min Acce" wire:model="farming.min_acce">
        </div>
        <div>
            <label for="">Max Acce</label>
            <input type="text" class="form-control" placeholder="Max Acce" wire:model="farming.max_acce">
        </div>
    </div>

    <div class="tw-my-4">
        <button class="btn btn-primary btn-sm" wire:click="saveFarming">Save Farming</button>
    </div>
</div>
@push('scripts')
    <script nonce="{{ csp_nonce() }}">
        var inputElm = document.querySelector("#tagifyme")
        tagify = new Tagify(inputElm);
        inputElm.addEventListener('change', onChange)

        function onChange(e) {
            if (e.target.value) {
                @this.set("farming.autoloot_talisman", JSON.stringify(JSON.parse(e.target.value).map(x => x.value)))
            }
        }

        document.addEventListener('livewire:initialized', () => {
            tagify.addTags(JSON.parse(@this.farming.autoloot_talisman ? @this.farming.autoloot_talisman : "[]"))
        })
    </script>
@endpush
