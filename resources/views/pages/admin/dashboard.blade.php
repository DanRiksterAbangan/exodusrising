@extends('layouts.app')
@section('section')
    <div class="app-main flex-column flex-row-fluid">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="app-toolbar py-3 py-lg-6">
                <div class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Dashboard</h1>
                    </div>
                </div>
            </div>


            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_content_container" class="app-container  container-xxl ">
                    <div class="row g-5 g-xl-10 mb-xl-10">

                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 ">
                            <div class="card mb-5 mb-xl-10">
                                <div class="card-header pt-5">
                                    <div class="card-title d-flex flex-column">
                                        <div class="d-flex align-items-center">
                                            <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">₱</span>
                                            <span
                                                class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ number_format($totalBuyAmount, 2) }}</span>
                                        </div>
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Gross Revenue (Topups)</span>
                                    </div>
                                </div>
                                <div class="card-body pt-2 pb-4 d-flex align-items-center">
                                    <div class="d-flex flex-column content-justify-center w-100">
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">APPROVED COUNT</div>
                                            <div class="fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">
                                                {{ number_format($topups->where('status', 'approved')->first()?->count) }}
                                            </div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                            <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">PENDING COUNT</div>
                                            <div class="fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">
                                                {{ number_format($topups->where('status', 'pending')->first()?->count) }}
                                            </div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet w-8px h-6px rounded-2 me-3"
                                                style="background-color: #E4E6EF"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">REJECTED COUNT</div>
                                            <div class=" fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">
                                                {{ number_format($topups->where('status', 'rejected')->first()?->count) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 ">
                            <div class="card mb-5 mb-xl-10">
                                <div class="card-header pt-5">
                                    <div class="card-title d-flex flex-column">
                                        <div class="d-flex align-items-center">
                                            <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">RPS</span>
                                            <span
                                                class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2 tw-text-3xl sm:tw-text-4xl">{{ number_format($totalMintedRPS, 2) }}</span>
                                        </div>
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Minted RPS Amount</span>
                                    </div>
                                </div>
                                <div class="card-body pt-2 pb-4 d-flex align-items-center">
                                    <div class="d-flex flex-column content-justify-center w-100">
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">BUY CREDITS</div>
                                            <div class="fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">
                                                {{ number_format($totalBuyRPS, 2) }}</div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                            <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">GIFT CODES</div>
                                            <div class="fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">
                                                {{ number_format($totalGiftCodesRPS, 2) }}</div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet w-8px h-6px rounded-2 me-3"
                                                style="background-color: #E4E6EF"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">STREAMER AMOUNT</div>
                                            <div class=" fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">
                                                {{ number_format($totalStreamerRPS, 2) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>




                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 ">
                            <div class="card mb-5 mb-xl-10">
                                <div class="card-header pt-5">
                                    <div class="card-title d-flex flex-column">
                                        <div class="d-flex align-items-center">
                                            <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">RPS</span>
                                            <span
                                                class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ number_format($totalGiftCodesRPS, 2) }}</span>
                                        </div>
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Giftcode Claimed</span>
                                    </div>
                                </div>
                                <div class="card-body pt-2 pb-4 d-flex align-items-center">
                                    <div class="d-flex flex-column content-justify-center w-100">
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">CLAIMED COUNT</div>
                                            <div class="fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">
                                                {{ number_format($giftcodes->where('status', 'claimed')->first()?->count) }}
                                            </div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                            <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">ACTIVE COUNT</div>
                                            <div class="fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">
                                                {{ number_format($giftcodes->where('status', 'active')->first()?->count) }}
                                            </div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet w-8px h-6px rounded-2 me-3"
                                                style="background-color: #E4E6EF"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">INACTIVE COUNT</div>
                                            <div class=" fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">
                                                {{ number_format($giftcodes->where('status', 'inactive')->first()?->count) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 ">
                            <div class="card mb-5 mb-xl-10">
                                <div class="card-header pt-5">
                                    <div class="card-title d-flex flex-column">
                                        <div class="d-flex align-items-center">
                                            <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">₱</span>
                                            <span
                                                class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ number_format($totalStreamerCommissionAmount, 2) }}</span>
                                            <span class="badge badge-light-success fs-base">
                                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                        class="path1"></span><span class="path2"></span></i>
                                                2.2%
                                            </span>
                                        </div>
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Streamers Commission</span>
                                    </div>
                                </div>
                                <div class="card-body pt-2 pb-4 d-flex align-items-center">
                                    <div class="d-flex flex-column content-justify-center w-100">
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">TOTAL PAYOUT
                                            </div>
                                            <div class="fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">0
                                            </div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                            <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">TOTAL PENDING
                                            </div>
                                            <div class="fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">0
                                            </div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet w-8px h-6px rounded-2 me-3"
                                                style="background-color: #E4E6EF"></div>
                                            <div class="text-gray-500 flex-grow-1 me-4 tw-text-sm">TOTAL PAYOUT COUNT
                                            </div>
                                            <div class=" fw-bolder text-gray-700 text-xxl-end tw-text-xs sm:tw-text-sm">0
                                            </div>
                                        </div>
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
