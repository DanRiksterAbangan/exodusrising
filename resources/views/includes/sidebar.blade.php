<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="index.html">
            <img alt="Logo" src="{{ asset('assets/media/logos/default-dark.svg') }}"
                class="h-30px app-sidebar-logo-default" />
        </a>
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-sm h-30px w-30px rotate"
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
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
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
                        auth()->user()->isAdmin())
                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Administration</span>
                        </div>
                    </div>

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

                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Games</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('itemmall') }}">
                        <span class="menu-icon">
                            {!! Mdi::mdi('shopping', 'tw-text-white', 20, ['fill' => '#fff5']) !!}
                        </span>
                        <span class="menu-title">Fix 5101</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('itemmall') }}">
                        <span class="menu-icon">
                            {!! Mdi::mdi('shopping', 'tw-text-white', 20, ['fill' => '#fff5']) !!}
                        </span>
                        <span class="menu-title">Transactions</span>
                    </a>
                </div>



            </div>
        </div>
    </div>
</div>
