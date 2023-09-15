@extends("layouts.app")

@push("scripts")
<script src="{{ asset("assets/js/custom/authentication/sign-in/general.js") }}"></script>
@endpush

@section("section")
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">

        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10">
                    <!--begin::Form-->
                        @livewire("register-form")
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-wrap px-5">
                <!--begin::Links-->
                <div class="d-flex fw-semibold text-primary fs-base">
                    <a href="https://keenthemes.com/" class="px-5" target="_blank">Terms</a>
                    <a href="https://devs.keenthemes.com/" class="px-5" target="_blank">Plans</a>
                    <a href="https://themes.getbootstrap.com/product/keen-the-ultimate-bootstrap-admin-theme/" class="px-5" target="_blank">Contact Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>

@endsection
