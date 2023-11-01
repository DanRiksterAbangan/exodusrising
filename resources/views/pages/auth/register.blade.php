@extends("layouts.app")

@push("scripts")
<script src="{{ asset("assets/js/custom/authentication/sign-in/general.js") }}"></script>
<script src="{{ asset("assets/js/particles.min.js") }}"></script>
<script>
    particlesJS.load('particles-js', '{{asset("assets/lib/particle/particle.json")}}', function() {
    console.log('callback - particles.js config loaded');
    });
</script>
@endpush

@section("section")
<div class="d-flex flex-column flex-root" id="kt_app_root" style="background: url('{{asset("assets/images/sec_bg (1).jpg")}}')  no-repeat center center / cover !important">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid tw-z-10">
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <div class="w-lg-500px p-10 tw-bg-white tw-rounded-lg">
                        @livewire("register-form")
                </div>
            </div>

        </div>
    </div>
    <div id="particles-js" class="tw-absolute tw-inset-0"></div>
</div>

@endsection
