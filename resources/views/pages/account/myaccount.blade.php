@extends('layouts.app')
@section('section')
    <div class="app-main flex-column flex-row-fluid">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="app-toolbar py-3 py-lg-6">
                <div class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            My Account</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="../../index.html" class="text-muted text-hover-primary">
                                    Account </a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                My Account </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="app-content flex-column-fluid">
                <div class="app-container container-xxl">
                    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                        <div class="col-12 col-xxl-6 tw-pr-2">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 tw-mb-4">
                                    @livewire('user-account-info', ['user' => $user])
                                </div>

                                @forelse  ($characters as $character)
                                    <div
                                        class="col-md-12 col-lg-6 col-xl-6 col-xxl-{{ $characters->count() > 1 ? '6' : '12' }} mb-md-5 ">
                                        <div class="card card-flush ">
                                            <div class="card-header pt-5 tw-relative">
                                                <div class="card-title d-flex flex-column">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tw-flex tw-items-center tw-space-x-2 ">
                                                            <img class="tw-w-8"
                                                                src="{{ asset("assets/images/Classhero/$character->ctype_id.gif") }}"
                                                                alt="">
                                                            <span
                                                                class=" fw-bold text-dark lh-1 ls-n2 tw-text-lg">{{ $character->name }}</span>
                                                            <span class="badge badge-light-success fs-base">
                                                                <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                                    Lv.
                                                                </span>
                                                                {{ $character->characterAbility->level }}</span>
                                                        </div>

                                                    </div>
                                                    @if ($character->conqueror)
                                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Conqueror
                                                            Level:
                                                            {{ $character->conqueror?->conquerorlevel }}</span>
                                                    @endif
                                                </div>
                                                <div class="tw-absolute tw-top-2 tw-right-2">
                                                    <div class="me-0">
                                                        <button data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end"
                                                            class="tw-p-1 hover:tw-bg-gray-100 tw-rounded-full">
                                                            {!! Mdi::mdi('cog', '', 20, ['fill' => '#777']) !!}
                                                        </button>
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3 "
                                                            data-kt-menu="true"
                                                            style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-59px, 216px);"
                                                            data-popper-placement="bottom-end">
                                                            <div class="menu-item px-3">
                                                                <div
                                                                    class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                                    Settings
                                                                </div>
                                                            </div>

                                                            <div class="menu-item px-3">
                                                                <a wire:ignore data-bs-toggle="modal"
                                                                    data-bs-target="#changeName{{ $character->id }}"
                                                                    href="#" class="menu-link px-3">
                                                                    Change Name
                                                                </a>
                                                            </div>


                                                            <div class="menu-item px-3">
                                                                <a wire:ignore data-bs-toggle="modal"
                                                                    data-bs-target="#changeGender{{ $character->id }}"
                                                                    href="#" class="menu-link px-3">
                                                                    Change Gender
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="changeName{{ $character->id }}"
                                                        tabindex="-1" aria-modal="true" role="dialog"
                                                        data-bs-backdrop='static'>
                                                        <div class="modal-dialog modal-dialog-centered mw-650px">
                                                            <div class="modal-content">
                                                                @livewire('modal.change-character-name', ['character' => $character])
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="changeGender{{ $character->id }}"
                                                        tabindex="-1" aria-modal="true" role="dialog"
                                                        data-bs-backdrop='static'>
                                                        <div class="modal-dialog modal-dialog-centered mw-650px">
                                                            <div class="modal-content">
                                                                @livewire('modal.change-character-gender', ['character' => $character])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row tw-text-xs">
                                                <div class="col-xxl-6">
                                                    <div class="card-body pt-2 pb-4 align-items-center">
                                                        <div
                                                            class="d-flex flex-column content-justify-center flex-row-fluid">
                                                            <div class="d-flex fw-semibold align-items-center">
                                                                <div class="bullet w-8px h-3px rounded-2 bg-danger me-3">
                                                                </div>
                                                                <div class="text-gray-500 flex-grow-1 me-4">
                                                                    Str
                                                                </div>
                                                                <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                    {{ $character->characterAbility->strength }}
                                                                </div>
                                                            </div>
                                                            <div class="d-flex fw-semibold align-items-center my-3">
                                                                <div class="bullet w-8px h-3px rounded-2 bg-primary me-3">
                                                                </div>
                                                                <div class="text-gray-500 flex-grow-1 me-4">
                                                                    Agi
                                                                </div>
                                                                <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                    {{ $character->characterAbility->quickness }}
                                                                </div>
                                                            </div>
                                                            <div class="d-flex fw-semibold align-items-center">
                                                                <div class="bullet w-8px h-3px rounded-2 me-3"
                                                                    style="background-color: #E4E6EF"></div>
                                                                <div class="text-gray-500 flex-grow-1 me-4">
                                                                    Psy</div>
                                                                <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                    {{ $character->characterAbility->mentality }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <div class="card-body pt-2 pb-4 align-items-center">

                                                        <div
                                                            class="d-flex flex-column content-justify-center flex-row-fluid">
                                                            <div class="d-flex fw-semibold align-items-center">
                                                                <div class="bullet w-8px h-3px rounded-2 bg-danger me-3">
                                                                </div>
                                                                <div class="text-gray-500 flex-grow-1 me-4">
                                                                    Vit
                                                                </div>
                                                                <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                    {{ $character->characterAbility->health }}
                                                                </div>
                                                            </div>
                                                            <div class="d-flex fw-semibold align-items-center my-3">
                                                                <div class="bullet w-8px h-3px rounded-2 bg-primary me-3">
                                                                </div>
                                                                <div class="text-gray-500 flex-grow-1 me-4">
                                                                    Dex
                                                                </div>
                                                                <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                    {{ $character->characterAbility->dexterity }}
                                                                </div>
                                                            </div>
                                                            <div class="d-flex fw-semibold align-items-center">
                                                                <div class="bullet w-8px h-3px rounded-2 me-3"
                                                                    style="background-color: #E4E6EF"></div>
                                                                <div class="text-gray-500 flex-grow-1 me-4">
                                                                    Int
                                                                </div>
                                                                <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                    {{ $character->characterAbility->intelligence }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty

                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-5 mb-xl-10">
                                        <div class="card card-flush ">
                                            <div class="card-header ">
                                                <div class="card-title d-flex flex-column">
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2 tw-text-gray-500">No
                                                            character created</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforelse


                            </div>
                        </div>

                        <div class="col-12 col-xxl-6 tw-pl-2 tw-mb-5 tw-mt-0 lg:tw-mt-10">
                            <x-user-kills :$kills />
                        </div>

                        <div class="col-md-12 md:-tw-mt-4">
                            <div class="card tw-mt-4 ">
                                <!--begin::Header-->
                                <div class="card-header card-header-stretch">

                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar m-0">
                                        <!--begin::Tab nav-->
                                        <ul class="nav nav-stretch fs-5 fw-semibold nav-line-tabs border-transparent"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a id="kt_referrals_year_tab" class="nav-link text-active-gray-800 active"
                                                    data-bs-toggle="tab" role="tab" href="#Transactions"
                                                    aria-selected="true">
                                                    Transactions
                                                </a>
                                            </li>

                                            <li class="nav-item" role="presentation">
                                                <a id="kt_referrals_2019_tab" class="nav-link text-active-gray-800 me-4"
                                                    data-bs-toggle="tab" role="tab" href="#TopupHistory"
                                                    aria-selected="false" tabindex="-1">
                                                    Topup History </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="kt_referred_users_tab_content" class="tab-content">
                                    <div id="Transactions" class="card-body p-0 tab-pane fade show active"
                                        role="tabpanel" aria-labelledby="kt_referrals_year_tab">
                                        @livewire('user-transaction-history', ['user' => $user])
                                    </div>
                                    <div id="TopupHistory" class="card-body p-0 tab-pane fade " role="tabpanel"
                                        aria-labelledby="kt_referrals_2019_tab">
                                        @livewire('topup-transaction-history', ['user' => $user])
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
