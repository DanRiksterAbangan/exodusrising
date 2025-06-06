<?php

namespace App\Livewire;

use App\Models\Streamer;
use Livewire\Component;
use Livewire\WithPagination;

class StreamersTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $limit = 20;
    private $streamers = [];

    public function getData(){
        $this->streamers = Streamer::with([
            "user"
            ])->withSum('claimableTopups', 'amount')->where(function ($q) {
            $q->where("name", "like", "%" . $this->search . "%")
                ->orWhere("code", "like", "%$this->search%");
        })->latest("id")->paginate($this->limit);
    }
    public function removeAsStreamer($streamer){
        $streamer = Streamer::where("id", $streamer['id'])->first();
        $streamer->delete();
        $this->dispatch('alert',[
            'type' => 'success',
            'message' => 'Streamer deleted successfully.'
        ]);
    }
    public function payoutStreamer($id){
        $streamer = Streamer::with('claimableTopups')->where("id", $id)->first();
        if($streamer){
            $commissionAmount = $streamer->claimableTopups->sum("amount")  * ($streamer->code_percentage / 100);
            $streamer->claimableTopups()->update([
                "claimed_by_streamer" => true
            ]);
            $this->dispatch('alert',[
                'type' => 'success',
                'message' => "Streamer payout successfully with amount ₱ ".number_format($commissionAmount,2)."."
            ]);
        }
    }

    public function render()
    {
        $this->getData();
        return view('livewire.admin.streamers-table',[
            "streamers"=>$this->streamers
        ]);
    }
}
