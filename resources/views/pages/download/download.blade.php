@extends('layouts.app')
@section('section')
    <div class="app-main flex-column flex-row-fluid">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="app-toolbar py-3 py-lg-6">
                <div class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Download</h1>
                    </div>
                </div>
            </div>

            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_content_container" class="app-container  container-xxl ">
                    <div class="card ">
                        <div class="card-body p-10">
                            <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-3 tw-gap-6">
                                <a href="" target="_blank"
                                    class="hover:tw-text-gray-800 tw-text-gray-600 hover:tw-scale-110 tw-transition-all tw-duration-150 hover:tw-z-20">
                                    <div class="tw-rounded-xl tw-bg-gray-100 tw-drop-shadow-md  tw-overflow-hidden">
                                        <div class="tw-flex tw-justify-between tw-align-baseline  tw-overflow-hidden">
                                            <div class="tw-p-10">
                                                <div class="tw-font-bold tw-text-xl ">Download Global Rohan
                                                    S2
                                                </div>
                                                <div class="tw-text-lg">Google Drive</div>
                                            </div>
                                            <div class="tw-p-10 tw-bg-[#2684FCbb]">
                                                {!! Mdi::mdi('download', '', 40, ['fill' => '#fff']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" target="_blank"
                                    class="hover:tw-text-gray-800 tw-text-gray-600 hover:tw-scale-110 tw-transition-all tw-duration-150 hover:tw-z-20">
                                    <div class=" tw-rounded-xl tw-bg-gray-100 tw-drop-shadow-md  tw-overflow-hidden">
                                        <div class="tw-flex tw-justify-between tw-items-stretch ">
                                            <div class="tw-p-10">
                                                <div class="tw-font-bold tw-text-xl tw-text-gray-600">Download Global Rohan
                                                    S2
                                                </div>
                                                <div class="tw-text-gray-500 tw-text-lg">Easyupload</div>
                                            </div>
                                            <div class=" tw-p-10 tw-bg-[#5933AAbb]">
                                                {!! Mdi::mdi('download', '', 40, ['fill' => '#fff']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" target="_blank"
                                    class="hover:tw-text-gray-800 tw-text-gray-600 hover:tw-scale-110 tw-transition-all tw-duration-150 hover:tw-z-20">
                                    <div class="tw-rounded-xl tw-bg-gray-100 tw-drop-shadow-md  tw-overflow-hidden">
                                        <div class="tw-flex tw-justify-between tw-align-baseline">
                                            <div class="tw-p-10">
                                                <div class="tw-font-bold tw-text-xl tw-text-gray-600">Download Global Rohan
                                                    S2
                                                </div>
                                                <div class="tw-text-gray-500 tw-text-lg">Mega</div>
                                            </div>
                                            <div class="tw-p-10 tw-bg-[#D90007bb]">
                                                {!! Mdi::mdi('download', '', 40, ['fill' => '#fff']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end::Content container-->
            </div>

        </div>
    </div>
@endsection
