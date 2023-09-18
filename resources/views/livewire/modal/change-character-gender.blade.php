<form wire:submit="changeGender">
    <div class="modal-header">
        <h1 class="fw-bold tw-text-xl">Change Gender</h1>
        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
            {!! Mdi::mdi('close', '', 20, ['fill' => '#555']) !!}
        </div>
    </div>
    <div class="modal-body pt-10 pb-15 px-lg-17">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

        @if (session()->has('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <div class="tw-flex tw-flex-col tw-space-y-3">

            <ul class="tw-list-disc tw-mb-5 tw-italic">
                <li>Change gender will cost {{ settings()->change_gender_cost }} RPS</li>
                <li>User must not in game else it will disconnect.</li>
            </ul>

            <div>
                <div class="tw-flex tw-items-center tw-gap-3 tw-mb-10">
                    <div class="tw-flex tw-items-center tw-space-x-2">
                        <img src="{{ asset("assets/images/Classhero/$oldGenderType.gif") }}" alt="">
                        <div class="tw-text-lg tw-font-semibold">{{ $character->name }} ({{ $oldGender }})</div>
                    </div>

                    <div>
                        {!! Mdi::mdi('arrow-right-bold') !!}
                    </div>
                    <div class="tw-flex tw-items-center tw-space-x-2">
                        <img src="{{ asset("assets/images/Classhero/$newGenderType.gif") }}" alt="">
                        <div class="tw-text-lg tw-font-semibold">{{ $character->name }} ({{ $newGender }})</div>
                    </div>
                </div>

            </div>

        </div>

        <div class="tw-flex tw-justify-end tw-mt-10">
            <button class="btn btn-primary" type="submit">Change Gender</button>
        </div>
    </div>
</form>

@push('scripts')
    <script>
        $(document).ready(() => {
            Livewire.on('updatedUser', (user) => {
                document.getElementById('user_points').innerHTML = user[0].Point
            })
        })
    </script>
@endpush
