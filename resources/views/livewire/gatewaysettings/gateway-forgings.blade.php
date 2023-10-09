<div>

    <div class="tw-w-full tw-grid md:tw-grid-cols-3 tw-gap-4">
        <div class="tw-border tw-border-gray-200 tw-rounded-lg tw-p-4">
            <div class="tw-text-xl tw-font-semibold tw-mb-4">All Weapons</div>
            <div wire:ignore class="tw-mb-4">
                <div>
                    <label for="">Rare Weapons</label>
                </div>
                <input id="rareweap" class="form-control" pattern='^[0-9]+$' autocomplete="false">
            </div>
            <div wire:ignore class="tw-mb-4">
                <div>
                    <label for="">Unique Weapons</label>
                </div>
                <input id="uniqueweap" class="form-control" pattern='^[0-9]+$' autocomplete="false">
            </div>

            <div wire:ignore class="tw-mb-4">
                <div>
                    <label for="">Ancient Weapons</label>
                </div>
                <input id="ancientweap" class="form-control" pattern='^[0-9]+$' autocomplete="false">
            </div>


        </div>
        <div class="tw-border tw-border-gray-200 tw-rounded-lg tw-p-4">
            <div class="tw-text-xl tw-font-semibold tw-mb-4">All Shields</div>
            <div wire:ignore class="tw-mb-4">
                <div>
                    <label for="">Rare Shields</label>
                </div>
                <input id="rareshield" class="form-control" pattern='^[0-9]+$' autocomplete="false">
            </div>
            <div wire:ignore class="tw-mb-4">
                <div>
                    <label for="">Unique Shields</label>
                </div>
                <input id="uniqueshield" class="form-control" pattern='^[0-9]+$' autocomplete="false">
            </div>
            <div wire:ignore class="tw-mb-4">
                <div>
                    <label for="">Ancient Shields</label>
                </div>
                <input id="ancientshield" class="form-control" pattern='^[0-9]+$' autocomplete="false">
            </div>
        </div>
        <div class="tw-border tw-border-gray-200 tw-rounded-lg tw-p-4">
            <div class="tw-text-xl tw-font-semibold tw-mb-4">All Armors</div>
            <div wire:ignore class="tw-mb-4">
                <div>
                    <label for="">Rare Armors</label>
                </div>
                <input id="rarearmor" class="form-control" pattern='^[0-9]+$' autocomplete="false">
            </div>
            <div wire:ignore class="tw-mb-4">
                <div>
                    <label for="">Unique Armors</label>
                </div>
                <input id="uniquearmor" class="form-control" pattern='^[0-9]+$' autocomplete="false">
            </div>

            <div wire:ignore class="tw-mb-4">
                <div>
                    <label for="">Ancient Armors</label>
                </div>
                <input id="ancientarmor" class="form-control" pattern='^[0-9]+$' autocomplete="false">
            </div>
        </div>
    </div>
    <button class="btn btn-primary btn-sm tw-my-8" wire:click="saveForging">Save Forging</button>
</div>
@push('scripts')
    <script>
        var rareweap = document.querySelector("#rareweap")
        var uniqueweap = document.querySelector("#uniqueweap")
        var ancientweap = document.querySelector("#ancientweap")
        var rareshield = document.querySelector("#rareshield")
        var uniqueshield = document.querySelector("#uniqueshield")
        var ancientshield = document.querySelector("#ancientshield")
        var rarearmor = document.querySelector("#rarearmor")
        var uniquearmor = document.querySelector("#uniquearmor")
        var ancientarmor = document.querySelector("#ancientarmor")

        rareweaptagify = new Tagify(rareweap);
        uniqueweaptagify = new Tagify(uniqueweap);
        ancientweaptagify = new Tagify(ancientweap);
        rareshieldtagify = new Tagify(rareshield);
        uniqueshieldtagify = new Tagify(uniqueshield);
        ancientshieldtagify = new Tagify(ancientshield);
        rarearmortagify = new Tagify(rarearmor);
        uniquearmortagify = new Tagify(uniquearmor);
        ancientarmortagify = new Tagify(ancientarmor);

        rareweap.addEventListener('change', onChangeRareWeap)
        uniqueweap.addEventListener('change', onChangeUniqueWeap)
        ancientweap.addEventListener('change', onChangeAncientWeap)
        rareshield.addEventListener('change', onChangeRareShield)
        uniqueshield.addEventListener('change', onChangeUniqueShield)
        ancientshield.addEventListener('change', onChangeAncientShield)
        rarearmor.addEventListener('change', onChangeRareArmor)
        uniquearmor.addEventListener('change', onChangeUniqueArmor)
        ancientarmor.addEventListener('change', onChangeAncientArmor)

        function onChangeRareWeap(e) {
            if (e.target.value) {
                console.log(JSON.stringify(JSON.parse(e.target.value).map(x => x.value)))
                @this.rareweapons = JSON.stringify(JSON.parse(e.target.value).map(x => x.value))
            }
        }

        function onChangeUniqueWeap(e) {
            if (e.target.value) {
                @this.uniqueweapons = JSON.stringify(JSON.parse(e.target.value).map(x => x.value))
            }
        }

        function onChangeAncientWeap(e) {
            if (e.target.value) {
                @this.ancientweapons =  JSON.stringify(JSON.parse(e.target.value).map(x => x.value))
            }
        }

        function onChangeRareShield(e) {
            if (e.target.value) {
                @this.rareshields = JSON.stringify(JSON.parse(e.target.value).map(x => x.value))
            }
        }

        function onChangeUniqueShield(e) {
            if (e.target.value) {
                @this.uniqueshields =  JSON.stringify(JSON.parse(e.target.value).map(x => x.value))
            }
        }

        function onChangeAncientShield(e) {
            if (e.target.value) {
                @this.ancientshields = JSON.stringify(JSON.parse(e.target.value).map(x => x.value))
            }
        }

        function onChangeRareArmor(e) {
            if (e.target.value) {
                @this.rarearmors =  JSON.stringify(JSON.parse(e.target.value).map(x => x.value))
            }
        }

        function onChangeUniqueArmor(e) {
            if (e.target.value) {
                @this.uniquearmors = JSON.stringify(JSON.parse(e.target.value).map(x => x.value))
            }
        }

        function onChangeAncientArmor(e) {
            if (e.target.value) {
                @this.ancientarmors = JSON.stringify(JSON.parse(e.target.value).map(x => x.value))
            }
        }


        document.addEventListener('livewire:initialized', () => {
            rareweaptagify.addTags(JSON.parse(@this.rareweapons ? @this.rareweapons : "{}"))
            uniqueweaptagify.addTags(JSON.parse(@this.uniqueweapons ? @this.uniqueweapons : "{}"))
            ancientweaptagify.addTags(JSON.parse(@this.ancientweapons ? @this.ancientweapons : "{}"))
            rareshieldtagify.addTags(JSON.parse(@this.rareshields ? @this.rareshields : "{}"))
            uniqueshieldtagify.addTags(JSON.parse(@this.uniqueshields ? @this.uniqueshields : "{}"))
            ancientshieldtagify.addTags(JSON.parse(@this.ancientshields ? @this.ancientshields : "{}"))
            rarearmortagify.addTags(JSON.parse(@this.rarearmors ? @this.rarearmors : "{}"))
            uniquearmortagify.addTags(JSON.parse(@this.uniquearmors ? @this.uniquearmors : "{}"))
            ancientarmortagify.addTags(JSON.parse(@this.ancientarmors ? @this.ancientarmors : "{}"))
        })
    </script>
@endpush
