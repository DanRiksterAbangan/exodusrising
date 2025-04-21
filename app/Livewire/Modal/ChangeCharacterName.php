<?php

namespace App\Livewire\Modal;

use App\Models\Character;
use App\Settings\GeneralSettings;
use Livewire\Component;

class ChangeCharacterName extends Component
{

    public $character;
    public $newName;

    protected $rules=[
        'newName' => 'required|string|regex:/^[a-zA-Z0-9]+$/|min:3|max:20'
    ];
    public function mount($character){
        $this->character = $character;
    }


    public function changeName(){
        $this->validate();
        $user =  $this->character->user;
        if($user->Point < settings()->change_name_cost){
            session()->flash('danger', 'You do not have enough RPS to change the name.');
            return;
        }
        $user->disconnect()->create([
            "server_id" => 1,
            "char_id" => 0,
        ]);
        //find character and update name
        $character = $this->character;
        $oldName = $character->name;
        if($oldName == $this->newName){
            session()->flash('danger', 'You cannot change your name to the same name.');
            return;
        }
        $already = Character::where("name",$this->newName)->first();
        if($already){
            session()->flash('danger', 'This name is already taken.');
            return;
        }
        $character->name = $this->newName;
        $character->save();

        $user->decrement('Point', settings()->change_name_cost ?? 1000);
        session()->flash('success', "Changing name from $oldName to $this->newName has been successfull.");
        $this->dispatch("updatedUser", $user);
        $this->newName = "";

    }
    public function render()
    {
        return view('livewire.modal.change-character-name');
    }
}
