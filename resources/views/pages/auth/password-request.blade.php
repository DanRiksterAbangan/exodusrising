@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
@endpush

@section('section')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        @livewire('password-request')
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
