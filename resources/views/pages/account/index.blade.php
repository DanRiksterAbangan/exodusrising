@extends('layouts.app')
@section('section')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">My Account
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
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
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
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
                                                        class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $character->name }}</span>
                                                    <span class="badge badge-light-success fs-base">
                                                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                            Lv.
                                                        </span>
                                                        {{ $character->characterAbility->level }}</span>
                                                </div>
                                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Conqueror Level:
                                                    {{ $character->conqueror->conquerorlevel }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xxl-6">
                                                <div class="card-body pt-2 pb-4 align-items-center">
                                                    <div class="d-flex flex-column content-justify-center flex-row-fluid">
                                                        <div class="d-flex fw-semibold align-items-center">
                                                            <div class="bullet w-8px h-3px rounded-2 bg-danger me-3"></div>
                                                            <div class="text-gray-500 flex-grow-1 me-4">Strength</div>
                                                            <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                {{ $character->characterAbility->strength }}</div>
                                                        </div>
                                                        <div class="d-flex fw-semibold align-items-center my-3">
                                                            <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>
                                                            <div class="text-gray-500 flex-grow-1 me-4">Agility</div>
                                                            <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                {{ $character->characterAbility->quickness }}</div>
                                                        </div>
                                                        <div class="d-flex fw-semibold align-items-center">
                                                            <div class="bullet w-8px h-3px rounded-2 me-3"
                                                                style="background-color: #E4E6EF"></div>
                                                            <div class="text-gray-500 flex-grow-1 me-4">Psyche</div>
                                                            <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                {{ $character->characterAbility->mentality }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6">
                                                <div class="card-body pt-2 pb-4 align-items-center">

                                                    <div class="d-flex flex-column content-justify-center flex-row-fluid">
                                                        <div class="d-flex fw-semibold align-items-center">
                                                            <div class="bullet w-8px h-3px rounded-2 bg-danger me-3"></div>
                                                            <div class="text-gray-500 flex-grow-1 me-4">Vitalty</div>
                                                            <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                {{ $character->characterAbility->health }}</div>
                                                        </div>
                                                        <div class="d-flex fw-semibold align-items-center my-3">
                                                            <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>
                                                            <div class="text-gray-500 flex-grow-1 me-4">Dexterity</div>
                                                            <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                {{ $character->characterAbility->dexterity }}</div>
                                                        </div>
                                                        <div class="d-flex fw-semibold align-items-center">
                                                            <div class="bullet w-8px h-3px rounded-2 me-3"
                                                                style="background-color: #E4E6EF"></div>
                                                            <div class="text-gray-500 flex-grow-1 me-4">Intelligence</div>
                                                            <div class="fw-bolder text-gray-700 text-xxl-end">
                                                                {{ $character->characterAbility->intelligence }}</div>
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
                        <div class="card card-flush h-md-100">
                            <div class="card-header pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Characters Kills</span>
                                </h3>
                            </div>
                            <div class="card-body pt-2">
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                            <th class="p-0 pb-3 w-150px text-start">Character Name</th>
                                            <th class="p-0 pb-3 w-125px text-start">Action</th>
                                            <th class="p-0 pb-3 w-125px text-start">Character Name (Enemy)</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse  ($kills  as $kill)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-circle symbol-50px me-3">
                                                            <img src="assets/media/avatars/300-3.jpg" class=""
                                                                alt="" />
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="pages/user-profile/overview.html"
                                                                class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Guy
                                                                Hawkins</a>
                                                            <span
                                                                class="text-gray-400 fw-semibold d-block fs-7">{{ $kill }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end pe-13">
                                                    <span class="text-gray-600 fw-bold fs-6">78.34%</span>
                                                </td>
                                                <td class="text-end pe-0">
                                                    <div id="kt_table_widget_16_chart_1_1" class="h-50px mt-n8 pe-7"
                                                        data-kt-chart-color="success"></div>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#"
                                                        class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                                        <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                                    fill="currentColor" />
                                                                <path opacity="0.3"
                                                                    d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty

                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No kills yet
                                                </td>

                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
