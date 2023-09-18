<?php

namespace App\Livewire\Modal;

use App\Settings\GeneralSettings;
use Livewire\Component;

class ChangeCharacterName extends Component
{

    public $character;
    public $newName;

    protected $rules=[
        'newName' => 'required|min:3|max:20'
    ];
    public function mount($character){
        $this->character = $character;
    }

    public function changeName(){
        $this->validate();
        $user = auth()->user();
        if($user->Point < settings()->change_name_cost){
            session()->flash('danger', 'You do not have enough RPS to change the name.');
            return;
        }
        $user->disconnect()->create([
            "server_id" => 1,
            "char_id" => 0,
        ]);
        //find character and update name
        $user->decrement('Point', settings()->change_name_cost);
        $character = $this->character;
        $oldName = $character->name;
        $character->name = $this->newName;
        $character->save();
        session()->flash('success', "Changing name from $oldName to $this->newName has been successfull.");
        $this->dispatch("updatedUser", $user);
        $this->newName = "";

    }
    public function render()
    {
        return view('livewire.modal.change-character-name');
    }
}
