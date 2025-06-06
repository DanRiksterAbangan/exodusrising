<?php

namespace App\Livewire;

use App\Models\Streamer;
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
    public $streamerCode = "";
    public $streamerCodeData;
    public $successMessage = '';
    public $pendingTopup = [];
    protected $rules = [
        'amount' => 'required|numeric|min:100|max:100000',
        'image' => 'required|image|mimes:jpeg,png||max:1024',
        'streamerCode' => 'exists:streamers,code',
    ];

    protected $messages = [
        'streamerCode.exists' => 'Streamer code not found.',
    ];


    #[Computed]
    public function EquivalentRPS(){
        return number_format(floatval(($this->amount != "" ? $this->amount : 0) * 10)* ($this->streamerCodeData ? (floatval($this->streamerCodeData->code_percentage) + 100) / 100 : 1)) ;
    }


    public function updatedStreamerCode(){
        $this->streamerCodeData = null;
        $this->validate([
            'streamerCode' => 'string|exists:streamers,code',
        ]);
        $this->streamerCodeData = Streamer::with("user")->where("code", $this->streamerCode)->first();
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
            $fileExtension = $this->image->extension();
            if (!in_array($fileExtension, ['jpg', 'jpeg', 'png'])) {
                session()->flash('warning', 'Invalid file type. Upload image .jpg, .jpeg, .png only.');
                $lock->release();
                return;
            }

            $this->image->storeAs("/upload/topups", $filename.".".$fileExtension, "local");

            $topup = $user->topupTransactions()->create([
                'ref_id' => 'REF-' . time(),
                'amount' => $this->amount,
                'rps_amount' => floatval(($this->amount != "" ? $this->amount : 0) * 10)* ($this->streamerCodeData ? (floatval($this->streamerCodeData->code_percentage) + 100) / 100 : 1),
                'image' => $filename.".".$fileExtension,
                'notes' => 'RPS Purchase',
                'status' => 'pending',
                'before_rps' => $user->Point,
                'streamer_code' => $this->streamerCodeData ? $this->streamerCodeData->code : null,
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
