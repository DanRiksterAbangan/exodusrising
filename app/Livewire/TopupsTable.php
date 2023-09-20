<?php

namespace App\Livewire;

use App\Models\TopupTransaction;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class TopupsTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $limit = 50;

    private $topups = [];
    protected $queryString = ['search' => ['except'=>''],'limit','page' => ['except' => 1]];

    public function mount(){
       $this->topupData();
    }

    public function searchData(){
        $this->topupData();
    }

    public function topupData(){
        $this->topups = TopupTransaction::with(["processedBy","user"])->where("ref_id", "like", "%" . $this->search . "%")->latest()->paginate($this->limit);
    }

    public function approveTopup($id,$amount){

        $user = auth()->user();
        $topup = TopupTransaction::find($id);
        $lock = Cache::lock('topup-transaction-'.$id, 10);
        $lockCredits = Cache::lock("credits_". $topup->user_id, 10);
        if ($lock->get() && $lockCredits->get()) {
            $topup->status = "approved";
            $topup->rps_amount = $amount;
            $topup->processed_by = $user->user_id;
            $topup->processed_date = now();
            $topup->save();
            $lock->release();
            $lockCredits->release();
            $this->dispatch("updatedUser", $topup->user);
            $this->dispatch("alert", ["type" => "success", "message" => "Topup successfully approved."]);
        }else{
            $this->dispatch("alert", ["type" => "error", "message" => "Failed to approve topup, please try again later."]);
        }

    }

    public function rejectTopup($id){
        $user = auth()->user();
        $topup = TopupTransaction::find($id);
        $lock = Cache::lock('topup-transaction-'.$id, 10);
        if ($lock->get()) {
            $topup->status = "rejected";
            $topup->processed_by = $user->user_id;
            $topup->processed_date = now();
            $topup->save();
            $lock->release();
            $this->dispatch("alert", ["type" => "success", "message" => "Topup successfully rejected."]);
        }else{
            $this->dispatch("alert", ["type" => "error", "message" => "Failed to approve topup, please try again later."]);
        }
    }

    public function render()
    {
        $this->topupData();
        return view('livewire.admin.topups-table',[
            "topups" => $this->topups
        ]);
    }
}
