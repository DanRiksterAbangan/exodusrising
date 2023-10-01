<div>

    <div class="tw-mb-10">
        <div class="tw-text-lg tw-mb-2">Level Congratulatory</div>
        <div class="tw-mb-2 tw-flex tw-justify-between">
            <label>Message</label>

            <div class="form-check form-check-custom form-check-solid form-check-success form-switch">

                <input class="form-check-input w-35px h-20px" type="checkbox" wire:model="congratulatoryMessage.enable"
                    @if ($congratulatoryMessage['enable']) checked @endif name="layout-builder[layout][app][toolbar][display]"
                    id="kt_builder_toolbar_display">
                <label class="form-check-label text-gray-700 fw-bold" for="kt_builder_toolbar_display">Enable</label>
            </div>
        </div>
        <div>
            <textarea class="form-control" cols="30" rows="2" wire:model="congratulatoryMessage.message"></textarea>
        </div>
        <div>
            <input type="text" class="form-control" placeholder="Levels separated by comma"
                wire:model="congratulatoryMessage.args">
        </div>
    </div>
    <div>
        <div class="tw-text-lg tw-mb-2">Welcome Message</div>
        <div class="tw-mb-2 tw-flex tw-justify-between">
            <div>New Character</div>
            <div class="form-check form-check-custom form-check-solid form-check-success form-switch">
                <input class="form-check-input w-35px h-20px" type="checkbox" wire:model="newCharacterMessage.enable"
                    @if ($newCharacterMessage['enable']) checked @endif
                    name="layout-builder[layout][app][toolbar][display]" id="welcomemessage">
                <label class="form-check-label text-gray-700 fw-bold" for="welcomemessage">Enable</label>
            </div>
        </div>
        <div class="tw-mb-4">
            <textarea class="form-control" cols="30" rows="2" wire:model="newCharacterMessage.message"></textarea>
        </div>

        <div class="tw-mb-2 tw-flex tw-justify-between">
            <div>Old Character</div>
            <div class="form-check form-check-custom form-check-solid form-check-success form-switch">
                <input class="form-check-input w-35px h-20px" type="checkbox" wire:model="oldCharacterMessage.enable"
                    @if ($oldCharacterMessage['enable']) checked @endif
                    name="layout-builder[layout][app][toolbar][display]" id="welcomemessageold">
                <label class="form-check-label text-gray-700 fw-bold" for="welcomemessageold">Enable</label>
            </div>
        </div>
        <div>
            <textarea class="form-control" cols="30" rows="2" wire:model="oldCharacterMessage.message"></textarea>
        </div>
        <div class="tw-mt-3">
            <div class="tw-flex  tw-space-x-4 ">
                <div class="tw-flex tw-items-center tw-space-x-2">
                    <input id="bluemessage" type="radio" value="0" name="messagecolor"
                        wire:model.live="messageColor">
                    <label for="bluemessage">Blue</label>
                </div>
                <div class="tw-flex tw-items-center tw-space-x-2">
                    <input id="redmessage" type="radio" value="2" name="messagecolor"
                        wire:model.live="messageColor">
                    <label for="redmessage">Red</label>
                </div>

                <div class="tw-flex tw-items-center tw-space-x-2">
                    <input id="worldmessage" type="radio" value="3" name="messagecolor"
                        wire:model.live="messageColor">
                    <label for="worldmessage">World</label>
                </div>

                <div class="tw-flex tw-items-center tw-space-x-2">
                    <input id="nboxmessage" type="radio" value="1" name="messagecolor"
                        wire:model.live="messageColor">
                    <label for="nboxmessage">Notice Box</label>
                </div>
            </div>
        </div>
    </div>
    <div class="tw-mt-10">
        <button class="btn btn-primary" wire:click="saveMessage">Save Message</button>
    </div>
</div>
