<div class="app-content flex-column-fluid">
    <div class="app-container container-xxl">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <input wire:loading.attr="disabled" wire:model="search" type="text"
                            wire:keydown.enter="searchData" class="form-control form-control-solid w-250px ps-14"
                            placeholder="Search" />
                    </div>
                </div>

            </div>
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                            <th class="min-w-125px">USER #</th>
                            <th class="min-w-125px">USER NAME</th>
                            <th class="min-w-125px">POINTS</th>
                            <th class="min-w-125px">IS BANNED</th>
                            <th class="min-w-125px">CHARACTERS</th>
                            <th class="min-w-125px">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold" wire:loading.remove wire:target="searchData">
                        @forelse($users as $user)
                            <tr>
                                <td class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary mb-1">{{ $user->user_id }}</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-light fw-bold">{{ $user->login_id }}</div>
                                </td>
                                <td>
                                    <div class="badge badge-success">
                                        {{ $user->Point }}
                                    </div>
                                </td>
                                <td>
                                    @if ($user->banned?->where('until_date', '>', now())->first())
                                        <div class="badge badge-danger">
                                            {{ (new Carbon($user->banned->where('until_date', '>', now())->first()->until_date))->diffForHumans() }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <ul class="tw-list-disc">
                                        @foreach ($user->characters as $character)
                                            <li>{{ $character->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td>
                                    <a class="btn btn-primary tw-px-4 tw-py-2 tw-text-sm"
                                        href="{{ route('admin.user', ['user' => $user]) }}">View</a>
                                    @if (!$user->banned?->where('until_date', '>', now())->first())
                                        <span>
                                            <button class="btn btn-danger tw-px-4 tw-py-2 tw-text-sm" wire:ignore
                                                data-bs-toggle="modal"
                                                data-bs-target="#banUserModal{{ $user->user_id }}">Ban</button>

                                            <div class="modal fade" id="banUserModal{{ $user->user_id }}" tabindex="-1"
                                                aria-modal="true" role="dialog" data-bs-backdrop='static'>
                                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                                    <div class="modal-content">
                                                        <form wire:submit="banUser({{ $user->user_id }})">
                                                            <div class="modal-header">
                                                                <h1 class="fw-bold tw-text-xl">Ban {{ $user->login_id }}
                                                                </h1>
                                                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                                    data-bs-dismiss="modal">
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
                                                                <div class="tw-flex tw-flex-col tw-space-y-3">
                                                                    <ul class="tw-list-disc tw-mb-5 tw-italic">
                                                                        <li>This user will not be able to login to the
                                                                            game.
                                                                        </li>
                                                                        <li>This user will be disconnected in the game.
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <textarea wire:model="bannedReason" cols="30" rows="2" placeholder="Ban Reason" class="form-control"></textarea>
                                                                </div>
                                                                <div class="tw-mt-3 tw-w-[300px]">
                                                                    <label>Banned Days</label>
                                                                    <input type="number" wire:model="bannedDays"
                                                                        class="form-control" placeholder="Days">
                                                                </div>

                                                                <div class="tw-flex tw-justify-end tw-mt-10">
                                                                    <button class="btn btn-danger" type="submit">Ban
                                                                        Now</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    @endif
                                    <button class="btn btn-warning tw-px-4 tw-py-2 tw-text-sm"
                                        x-on:click="disconnect({{ $user->user_id }})">Disconnect</button>
                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center tw-text-gray-600">
                                    No users
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tbody class="text-gray-600 fw-semibold" wire:loading>
                        <tr>
                            <td colspan="5" class="text-center tw-text-gray-600">
                                Loading...
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="d-flex justify-content-end tw-py-5 tw-pr-5">
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        function disconnect(user) {

            Swal.fire({
                title: `Are you sure you want to disconnect ${user.login_id} ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                showLoaderOnConfirm: true,
                preConfirm: (data) => {
                    return @this.disconnectUser(user)
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("result", result)
                }
            })
        }
        $(document).ready(function() {
            $('.form-select').select2();
            $('.form-select').on('change', function(e) {
                @this.set('category', e.target.value);
            });
            console.log(Livewire)

            Livewire.on('alert', response => {
                $(`#banUserModal${response[0].user_id}`).modal('hide');
                Swal.fire(
                    response[0].type,
                    response[0].message,
                    response[0].type
                )
            })

        });
    </script>
@endpush
