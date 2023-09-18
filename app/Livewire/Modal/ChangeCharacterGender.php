<?php

namespace App\Livewire\Modal;

use Livewire\Component;

class ChangeCharacterGender extends Component
{

    public $character;
    public $oldGender;
    public $newGender;

    public $oldGenderType;
    public $newGenderType;

    public function mount($character){
        $this->character = $character;
        $ctypename = characterClassNames()[$this->character->ctype_id];
        $sameClass = collect(characterClassNames())->filter(fn($cl)=>$cl == $ctypename);
        $opposite = $sameClass->filter(fn($cl,$key)=>$key != $this->character->ctype_id);
        $this->oldGender = $this->character->ctype_id > $opposite->keys()->first() ? "MALE" : "FEMALE";
        $this->newGender = $this->character->ctype_id < $opposite->keys()->first() ? "MALE" : "FEMALE";
        $this->oldGenderType = $this->character->ctype_id;
        $this->newGenderType = $opposite->keys()->first();
    }


    public function changeGender(){
        $user = auth()->user();
        if($user->Point < settings()->change_gender_cost){
            session()->flash('danger', 'You do not have enough RPS to change the gender.');
            return;
        }
        $user->disconnect()->create([
            "server_id" => 1,
            "char_id" => 0,
        ]);
        $user->decrement('Point', settings()->change_gender_cost);
        $ctypename = characterClassNames()[$this->character->ctype_id];
        $sameClass = collect(characterClassNames())->filter(fn($cl)=>$cl == $ctypename);
        $opposite = $sameClass->filter(fn($cl,$key)=>$key != $this->character->ctype_id);
        $old_ctype_id = $this->character->ctype_id;
        $this->character->ctype_id = $opposite->keys()->first();
        $this->character->save();

        $this->oldGender = $old_ctype_id < $this->character->ctype_id ? "MALE" : "FEMALE";
        $this->newGender = $old_ctype_id > $this->character->ctype_id ? "MALE" : "FEMALE";
        $this->oldGenderType = $this->character->ctype_id;
        $this->newGenderType =$old_ctype_id;
        session()->flash('success', "Changing name from ".$this->character->name." gender to $this->oldGender has been successfull.");
        $this->dispatch("updatedUser", $user);

    }
    public function render()
    {
        return view('livewire.modal.change-character-gender');
    }
}
