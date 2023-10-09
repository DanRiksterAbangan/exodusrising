<div>
    <div class="tw-mb-10">
        <div class="tw-text-lg tw-mb-2">Firecracker Rewards</div>
        <div class="tw-mb-2 tw-flex tw-justify-between">
            <label class="tw-text-sm">Add Firecracker</label>
        </div>

        <div class="tw-grid md:tw-grid-cols-5 tw-gap-2">
            <input type="number" class="form-control" wire:model="firecracker_type" placeholder="Fire Cracker Type">
            <input type="number" class="form-control" wire:model="reward_type" placeholder="Reward Type">
            <input type="number" class="form-control" wire:model="stack" placeholder="Stack">
            <input type="text" class="form-control md:tw-col-span-2" wire:model="stats" placeholder="Stats">
            <textarea  cols="2" rows="2" class="md:tw-col-span-5 form-control" wire:model="description"></textarea>
            <div>
                <button class="btn btn-primary" wire:click="addFirecracker">Add Firecracker</button>
            </div>
        </div>


        <div>
            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0 tw-relative">
                <thead class="tw-bg-white tw-w-full">
                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                        <th class="p-0 pb-3 w-150px text-start">Firecracker Type</th>
                        <th class="p-0 pb-3 w-125px text-start">Reward Type</th>
                        <th class="p-0 pb-3 w-125px text-start">Stack</th>
                        <th class="p-0 pb-3 w-125px text-start">Stats</th>
                        <th class="p-0 pb-3 w-125px text-start">Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($firecrackers as $firecracker)
                        <tr>
                            <td>{{ $firecracker->firecracker_type }}</td>
                            <td>{{ $firecracker->reward_type }}</td>
                            <td>{{ $firecracker->stack }}</td>
                            <td>{{ $firecracker->stats }}</td>
                            <td>{{ $firecracker->description }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" wire:click="remove({{ $firecracker->id }})">Remove</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="tw-text-center">No Rules</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
