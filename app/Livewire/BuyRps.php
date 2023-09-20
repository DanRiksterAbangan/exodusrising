<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithFileUploads;

class BuyRps extends Component
{
    use WithFileUploads;
    public $amount;
    public $image;

    public $successMessage = '';
    public $pendingTopup = [];
    protected $rules = [
        'amount' => 'required|numeric|min:1|max:1000000',
        'image' => 'required|image|max:1024',
    ];

    public function buy()
    {
        $this->validate();
        $user = auth()->user();
        $lock = Cache::lock("topup_".$user->user_id, 10);
        if ($lock->get()) {
            if($user->pendingTopupTransactions->count()){
                session()->flash('warning', 'You have pending topup request.');
                $lock->release();
                return;
            }
            $topup = $user->topupTransactions()->create([
                'ref_id' => 'REF-' . time(),
                'amount' => $this->amount,
                'rps_amount' => $this->amount * 10,
                'image' => $this->image->store("/upload/topups/", "public"),
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
