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
                        <div class="col-12 col-xxl-6">
                            <div class="row">
                                @forelse  ($characters as $character)
                                    <div
                                        class="col-md-12 col-lg-6 col-xl-6 col-xxl-{{ $characters->count() > 1 ? '6' : '12' }} mb-md-5 mb-xl-10">
                                        <div class="card card-flush ">
                                            <div class="card-header pt-5">
                                                <div class="card-title d-flex flex-column">
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class=" fw-bold text-dark me-2 lh-1 ls-n2 tw-text-xl">{{ $character->name }}</span>
                                                        <span class="badge badge-light-success fs-base">
                                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                                Lv.
                                                            </span>
                                                            {{ $character->characterAbility->level }}</span>
                                                    </div>
                                                    @if ($character->conqueror)
                                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Conqueror
                                                            Level:
                                                            {{ $character->conqueror?->conquerorlevel }}</span>
                                                    @endif
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


                        <div class="col-xxl-6">
                            <x-user-kills :$kills />
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
