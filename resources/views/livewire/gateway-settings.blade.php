<div class="card card-flush ">
    <div class="card-header tw-flex tw-items-center tw-justify-between tw-pb-0">
        <div class="card-title d-flex flex-column">
            Gateway Messages
        </div>
    </div>
    <div class="card-header card-header-stretch overflow-auto tw-pt-0 tw-mt-0">
        <ul class="nav nav-stretch nav-line-tabs fw-semibold fs-6 border-transparent flex-nowrap" role="tablist"
            id="kt_layout_builder_tabs">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_layout_builder_main" role="tab"
                    aria-selected="true">
                    Main </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_layout_builder_layouts" role="tab"
                    aria-selected="false" tabindex="-1">
                    Layouts </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_layout_builder_sidebar" role="tab"
                    aria-selected="false" tabindex="-1">
                    Sidebar </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_layout_builder_header" role="tab"
                    aria-selected="false" tabindex="-1">
                    Header </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_layout_builder_toolbar" role="tab"
                    aria-selected="false" tabindex="-1">
                    Toolbar </a>
            </li>
        </ul>
    </div>
    <hr class="tw-border-gray-400">
    <div class="card-body pt-4  tw-text-sm">

        <div class="tw-mb-10">
            <div class="tw-text-lg tw-mb-2">Level Congratulatory</div>
            <div class="tw-mb-2 tw-flex tw-justify-between">
                <label>Message</label>

                <div class="form-check form-check-custom form-check-solid form-check-success form-switch">
                    <input type="hidden" value="false" name="layout-builder[layout][app][toolbar][display]">
                    <input class="form-check-input w-35px h-20px" type="checkbox" checked="" value="true"
                        name="layout-builder[layout][app][toolbar][display]" id="kt_builder_toolbar_display">
                    <label class="form-check-label text-gray-700 fw-bold"
                        for="kt_builder_toolbar_display">Enable</label>
                </div>
            </div>
            <div>
                <textarea class="form-control" cols="30" rows="2"></textarea>
            </div>
        </div>
        <div>
            <div class="tw-text-lg tw-mb-2">Welcome Message</div>
            <div class="tw-mb-2 tw-flex tw-justify-between">
                <div>New Character</div>
                <div class="form-check form-check-custom form-check-solid form-check-success form-switch">
                    <input type="hidden" value="false" name="layout-builder[layout][app][toolbar][display]">
                    <input class="form-check-input w-35px h-20px" type="checkbox" checked="" value="true"
                        name="layout-builder[layout][app][toolbar][display]" id="welcomemessage">
                    <label class="form-check-label text-gray-700 fw-bold" for="welcomemessage">Enable</label>
                </div>
            </div>
            <div class="tw-mb-4">
                <textarea class="form-control" cols="30" rows="2"></textarea>
            </div>

            <div class="tw-mb-2 tw-flex tw-justify-between">
                <div>Old Character</div>

            </div>
            <div>
                <textarea class="form-control" cols="30" rows="2"></textarea>
            </div>
            <div class="tw-mt-3">
                <div class="tw-flex  tw-space-x-4 ">

                    <div>
                        <div class="tw-flex tw-items-center tw-space-x-2">
                            <input id="bluemessage" type="radio">
                            <label for="bluemessage">Blue</label>
                        </div>
                    </div>

                    <div class="tw-flex tw-items-center tw-space-x-2">
                        <input id="redmessage" type="radio">
                        <label for="redmessage">Red</label>
                    </div>

                    <div class="tw-flex tw-items-center tw-space-x-2">
                        <input id="worldmessage" type="radio">
                        <label for="worldmessage">World</label>
                    </div>

                    <div class="tw-flex tw-items-center tw-space-x-2">
                        <input id="nboxmessage" type="radio">
                        <label for="nboxmessage">Notice Box</label>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
