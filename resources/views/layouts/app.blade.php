<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Rohan S2</title>

    <link nonce="{{ csp_nonce() }}" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link nonce="{{ csp_nonce() }}" rel="stylesheet"
        href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}">
    <link nonce="{{ csp_nonce() }}" href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link nonce="{{ csp_nonce() }}" href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @livewireStyles(['nonce' => csp_nonce()])

</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

    @auth
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                @livewire('header');
                <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    @include('includes.sidebar')
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        @yield('section')
                        <div id="kt_app_footer" class="app-footer">
                            <div
                                class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                                <div class="text-dark order-2 order-md-1">
                                    <span class="text-muted fw-semibold me-1">{{ Carbon::now()->format('Y') }}&copy;</span>
                                    <a href="/" target="_blank" class="text-gray-800 text-hover-primary">Global Rohan
                                        2
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @guest
        @yield('section')
    @endguest

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    @stack('scripts');
    @livewireScripts(['nonce' => csp_nonce()])

</body>

</html>
