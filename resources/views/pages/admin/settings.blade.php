@extends('layouts.app')
@section('section')
    <div class="app-main flex-column flex-row-fluid">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="app-toolbar py-3 py-lg-6">
                <div class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Admin Settings</h1>
                    </div>
                </div>
            </div>


            <div class="app-content flex-column-fluid">
                <div class="app-container container-xxl">
                    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                        <div class="col-12 col-xxl-12 tw-pr-2">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-4 tw-mb-4">
                                    @livewire('admin.settings.general-settings')
                                </div>

                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-8 tw-mb-4">
                                    @livewire('admin.settings.rohan-auth-settings')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
