<div class="card card-flush ">
    <div class="card-header tw-flex tw-items-center tw-justify-between tw-pb-0">
        <div class="card-title d-flex flex-column">
            Gateway Settings
        </div>
    </div>
    <div class="card-header card-header-stretch overflow-auto tw-pt-0 tw-mt-0">
        <ul class="nav nav-stretch nav-line-tabs fw-semibold fs-6 border-transparent flex-nowrap" role="tablist"
            id="kt_layout_builder_tabs">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_layout_builder_main" role="tab"
                    aria-selected="true">
                    Messages </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#gateway_firewall" role="tab" aria-selected="false"
                    tabindex="-1">
                    Firewall </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#gateway_farming" role="tab" aria-selected="false"
                    tabindex="-1">
                    Farming </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#gateway_forging" role="tab" aria-selected="false"
                    tabindex="-1">
                    Forging </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_layout_builder_toolbar" role="tab"
                    aria-selected="false" tabindex="-1">
                    Toolbar </a>
            </li>
        </ul>
    </div>
    <hr class="tw-border-gray-400">

    <div class="card-body">
        <div class="tab-content  pt-3">
            <div class="tab-pane active show" id="kt_layout_builder_main" role="tabpanel">
                {{-- <div class="separator separator-dashed my-6"></div> --}}
                @livewire('gatewaysettings.gateway-messages')
            </div>
            <div class="tab-pane" id="gateway_firewall" role="tabpanel">
                {{-- <div class="separator separator-dashed my-6"></div> --}}
                @livewire('gatewaysettings.gateway-firewalls')
            </div>
            <div class="tab-pane" id="gateway_farming" role="tabpanel">
                {{-- <div class="separator separator-dashed my-6"></div> --}}
                @livewire('gatewaysettings.gateway-farmings')
            </div>


        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            Livewire.on('alert', response => {
                Swal.fire(
                    response[0].type,
                    response[0].message,
                    response[0].type
                )
            })
        })
    </script>
@endpush
