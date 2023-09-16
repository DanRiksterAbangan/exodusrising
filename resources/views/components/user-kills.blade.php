<div class="card card-flush tw-pb-10">
    <div class="card-header pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-800">Characters Kills</span>
        </h3>
    </div>
    <div class="card-body pt-2 tw-max-h-[600px] tw-overflow-y-auto ">
        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0 tw-relative">
            <thead class="tw-bg-white tw-w-full">
                <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                    <th class="p-0 pb-3 w-150px text-start">Character Name</th>
                    <th class="p-0 pb-3 w-125px text-start">Action</th>
                    <th class="p-0 pb-3 w-125px text-start">Character Name</th>
                </tr>
            </thead>
            <tbody>
                @forelse  ($kills  as $kill)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-circle symbol-50px me-3">
                                    <img src="assets/media/avatars/300-3.jpg" class="" alt="" />
                                </div>
                                <div class="tw-font-semibold tw-text-gray-600">
                                    {{ $kill->killer->name }}
                                </div>
                            </div>
                        </td>
                        <td class="p-0 pb-3 w-125px text-start">
                            <span class="text-gray-600 fw-bold fs-6">Kills</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-circle symbol-50px me-3">
                                    <img src="assets/media/avatars/300-3.jpg" class="" alt="" />
                                </div>
                                <div class="tw-font-semibold tw-text-gray-600">
                                    {{ $kill->killed->name }}
                                </div>
                            </div>
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
