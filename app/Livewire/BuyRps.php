<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\Uid\Ulid;

class BuyRps extends Component
{
    use WithFileUploads;
    public $amount;
    public $image;
    public $streamerCode;
    public $streamerCodeData;
    public $successMessage = '';
    public $pendingTopup = [];
    protected $rules = [
        'amount' => 'required|numeric|min:100|max:100000',
        'image' => 'required|image|max:1024',
    ];


    #[Computed]
    public function EquivalentRPS(){
        return number_format(floatval(($this->amount != "" ? $this->amount : 0) * 10));
    }
    public function buy() : void
    {
        $user = auth()->user();
        if($user->isBanned()){
            session()->flash('warning', 'Your cannot perform this action. Account is prohibited.');
            return;
        }

        $this->validate();
        $lock = Cache::lock("topup_".$user->user_id, 10);
        if ($lock->get()) {
            if($user->pendingTopupTransactions->count()){
                session()->flash('warning', 'You have pending topup request.');
                $lock->release();
                return;
            }
            //hash file name to prevent duplicate
            $filename = Ulid::generate()."_".time();
            $fileExtension = $this->image->getClientOriginalExtension();
            $this->image->storeAs("/upload/topups", $filename.".".$fileExtension, "local");


            $topup = $user->topupTransactions()->create([
                'ref_id' => 'REF-' . time(),
                'amount' => $this->amount,
                'rps_amount' => floatval(($this->amount != "" ? $this->amount : 0) * 10),
                'image' => $filename.".".$fileExtension,
                'notes' => 'RPS Purchase',
                'status' => 'pending',
            ]);
            $this->reset();
            $lock->release();
            // session()->flash('success', 'Topup submitted successfully.');
            $this->successMessage = 'Topup submitted successfully.';
            $this->dispatch('pending-topup',$topup);

        }else{
            session()->flash('warning', 'Please try again later.');
        }

    }
    public function render()
    {
        $this->pendingTopup = auth()->user()->pendingTopupTransactions?->first();
        return view('livewire.buy-rps');
    }
}
