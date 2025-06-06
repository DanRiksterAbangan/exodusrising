{{-- <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"> --}}
<div nonce="{{ csp_nonce() }}" id="kt_app_sidebar" class="app-sidebar flex-column drawer drawer-start" data-kt-drawer="true"
    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
   >
    <div class="app-sidebar-logo px-6 tw-bg-slate-900" id="kt_app_sidebar_logo">
        <a href="/">
            <img alt="Logo" src="{{ asset('assets/images/logo.png') }}" class="h-90px" />
        </a>
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-sm h-30px w-30px rotate "
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid tw-bg-slate-900">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">


                <div class="menu-item {{ Route::currentRouteName() == 'itemmall' ? 'show' : '' }}">
                    <a class="menu-link" href="{{ route('itemmall') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! Mdi::mdi('shopping', 'tw-text-white', 20, [
                                    'fill' => Route::currentRouteName() == 'itemmall' ? '#fff' : '#fff5',
                                ]) !!}
                            </span>
                        </span>
                        <span class="menu-title">Itemmall</span>
                    </a>
                </div>

                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Account</span>
                    </div>
                </div>

                <div class="menu-item  {{ Route::currentRouteName() == 'account' ? 'show' : '' }} menu-accordion">
                    <a class="menu-link" href="{{ route('account') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! Mdi::mdi('shield-account', 'tw-text-white', 20, [
                                    'fill' => Route::currentRouteName() == 'account' ? '#fff' : '#fff5',
                                ]) !!}
                            </span>
                        </span>
                        <span class="menu-title">My Account</span>
                    </a>
                </div>

                <div
                    class="menu-item  {{ Route::currentRouteName() == 'account.transactions' ? 'show' : '' }} menu-accordion">
                    <a class="menu-link" href="{{ route('account.transactions') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! Mdi::mdi('file-document-multiple', 'tw-text-white', 20, [
                                    'fill' => Route::currentRouteName() == 'account.transactions' ? '#fff' : '#fff5',
                                ]) !!}
                            </span>
                        </span>
                        <span class="menu-title">Transaction History</span>
                    </a>
                </div>

                <div
                    class="menu-item  {{ Route::currentRouteName() == 'account.giftcodes' ? 'show' : '' }} menu-accordion">
                    <a class="menu-link" href="{{ route('account.giftcodes') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! Mdi::mdi('file-document-multiple', 'tw-text-white', 20, [
                                    'fill' => Route::currentRouteName() == 'account.giftcodes' ? '#fff' : '#fff5',
                                ]) !!}
                            </span>
                        </span>
                        <span class="menu-title">Redeemed Giftcodes</span>
                    </a>
                </div>

                <div
                    class="menu-item  {{ Route::currentRouteName() == 'account.topup.transactions' ? 'show' : '' }} menu-accordion">
                    <a class="menu-link" href="{{ route('account.topup.transactions') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! Mdi::mdi('file-document-multiple', 'tw-text-white', 20, [
                                    'fill' => Route::currentRouteName() == 'account.topup.transactions' ? '#fff' : '#fff5',
                                ]) !!}
                            </span>
                        </span>
                        <span class="menu-title">Topup History</span>
                    </a>
                </div>

                @if (auth()->check() &&
                        auth()->user()->hasManagementAccess())
                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Administration</span>
                        </div>
                    </div>

                    <div class="menu-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'show' : '' }}">
                        <a class="menu-link" href="{{ route('admin.dashboard') }}">
                            <span class="menu-icon tw-text-white">
                                {!! Mdi::mdi('view-dashboard', 'tw-text-white', 20, [
                                    'fill' => Route::currentRouteName() == 'admin.dashboard' ? '#ffff' : '#fff5',
                                ]) !!}
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </div>


                    <div class="menu-item {{ Route::currentRouteName() == 'admin.users' ? 'show' : '' }}">
                        <a class="menu-link" href="{{ route('admin.users') }}">
                            <span class="menu-icon tw-text-white">
                                {!! Mdi::mdi('account-group', 'tw-text-white', 20, [
                                    'fill' => Route::currentRouteName() == 'admin.users' ? '#ffff' : '#fff5',
                                ]) !!}
                            </span>
                            <span class="menu-title">Users</span>
                        </a>
                    </div>

                    <div class="menu-item {{ Route::currentRouteName() == 'admin.streamers' ? 'show' : '' }}">
                        <a class="menu-link" href="{{ route('admin.streamers') }}">
                            <span class="menu-icon tw-text-white">
                                {!! Mdi::mdi('account-group', 'tw-text-white', 20, [
                                    'fill' => Route::currentRouteName() == 'admin.streamers' ? '#ffff' : '#fff5',
                                ]) !!}
                            </span>
                            <span class="menu-title">Streamers</span>
                        </a>
                    </div>


                    <div class="menu-item {{ Route::currentRouteName() == 'admin.giftcodes' ? 'show' : '' }}">
                        <a class="menu-link" href="{{ route('admin.giftcodes') }}">
                            <span class="menu-icon tw-text-white">
                                {!! Mdi::mdi('file-sign', 'tw-text-white', 20, [
                                    'fill' => Route::currentRouteName() == 'admin.giftcodes' ? '#ffff' : '#fff5',
                                ]) !!}
                            </span>
                            <span class="menu-title">Gift Codes</span>
                        </a>
                    </div>

                    <div class="menu-item {{ Route::currentRouteName() == 'admin.topups' ? 'show' : '' }}">
                        <a class="menu-link" href="{{ route('admin.topups') }}">
                            <span class="menu-icon tw-text-white">
                                {!! Mdi::mdi('cash', 'tw-text-white', 20, [
                                    'fill' => Route::currentRouteName() == 'admin.topups' ? '#ffff' : '#fff5',
                                ]) !!}
                            </span>
                            <span class="menu-title">Topups</span>
                        </a>
                    </div>



                    <div class="menu-item {{ Route::currentRouteName() == 'admin.tracer' ? 'show' : '' }}">
                        <a class="menu-link" href="{{ route('admin.tracer') }}">
                            <span class="menu-icon tw-text-white">
                                {!! Mdi::mdi('magnify', 'tw-text-white', 20, [
                                    'fill' => Route::currentRouteName() == 'admin.tracer' ? '#ffff' : '#fff5',
                                ]) !!}
                            </span>
                            <span class="menu-title">Item Tracer</span>
                        </a>
                    </div>


                    @if (auth()->user()->isSuperAdmin())
                        @if (app()->environment('local'))
                            <div class="menu-item {{ Route::currentRouteName() == 'telescope' ? 'show' : '' }}">
                                <a class="menu-link" href="{{ route('telescope') }}">
                                    <span class="menu-icon tw-text-white">
                                        {!! Mdi::mdi('telescope', 'tw-text-white', 20, [
                                            'fill' => Route::currentRouteName() == 'telescope' ? '#ffff' : '#fff5',
                                        ]) !!}
                                    </span>
                                    <span class="menu-title">Telescope</span>
                                </a>
                            </div>
                        @endif
                        <div class="menu-item {{ Route::currentRouteName() == 'admin.settings' ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.settings') }}">
                                <span class="menu-icon tw-text-white">
                                    {!! Mdi::mdi('cog', 'tw-text-white', 20, [
                                        'fill' => Route::currentRouteName() == 'admin.settings' ? '#ffff' : '#fff5',
                                    ]) !!}
                                </span>
                                <span class="menu-title">Admin Settings</span>
                            </a>
                        </div>


                        <div
                            class="menu-item {{ Route::currentRouteName() == 'admin.user.login.manager' ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.user.login.manager') }}">
                                <span class="menu-icon tw-text-white">
                                    {!! Mdi::mdi('cog', 'tw-text-white', 20, [
                                        'fill' => Route::currentRouteName() == 'admin.user.login.manager' ? '#ffff' : '#fff5',
                                    ]) !!}
                                </span>
                                <span class="menu-title">User Login Control</span>
                            </a>
                        </div>


                        <div class="menu-item {{ Route::currentRouteName() == 'admin.gateways' ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.gateways') }}">
                                <span class="menu-icon tw-text-white">
                                    {!! Mdi::mdi('cog', 'tw-text-white', 20, [
                                        'fill' => Route::currentRouteName() == 'admin.gateways' ? '#ffff' : '#fff5',
                                    ]) !!}
                                </span>
                                <span class="menu-title">Gateway Control</span>
                            </a>
                        </div>
                    @endif
                @endif




                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Topups</span>
                    </div>
                </div>

                <div class="menu-item {{ Route::currentRouteName() == 'topup' ? 'show' : '' }}">
                    <a class="menu-link" href="{{ route('topup') }}">
                        <span class="menu-icon">
                            {!! Mdi::mdi('shopping', 'tw-text-white', 20, [
                                'fill' => Route::currentRouteName() == 'topup' ? '#fff' : '#fff5',
                            ]) !!}
                        </span>
                        <span class="menu-title">Buy RPS</span>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6 tw-bg-slate-900" id="kt_app_sidebar_footer">
        <a href="{{ route('download') }}"
            class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
            data-bs-original-title="200+ in-house components and 3rd-party plugins" data-kt-initialized="1">

            <span class="btn-label">
                Download
            </span>
        </a>
    </div>
</div>
