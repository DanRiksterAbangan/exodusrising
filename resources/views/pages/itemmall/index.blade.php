@extends('layouts.app')
@section('section')
    <div class=" flex-column flex-row-fluid">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="app-toolbar py-3 py-lg-6">
                <div class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Itemmall</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="../../index.html" class="text-muted text-hover-primary">
                                    Itemmall </a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                Item List </li>

                        </ul>
                    </div>
                    <div>
                        @if (auth()->check() &&
                                auth()->user()->hasManagementAccess())
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <div class="d-flex">
                                    <a href="{{ route('itemmall.additem') }}"
                                        class="btn  btn-sm btn-success  tw-flex tw-items-center">
                                        <span class="svg-icon svg-icon-2">
                                            {!! Mdi::mdi('plus', 'tw-text-white', 20, ['fill' => '#fff']) !!}
                                        </span>
                                        <span> Add Item</span>
                                    </a>
                                </div>

                            </div>
                        @endif
                    </div>


                </div>
            </div>

            @livewire('itemmall-table')

        </div>
    </div>
@endsection
