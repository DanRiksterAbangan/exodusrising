<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;

class GeneralSettings extends Component
{
    public $changeGenderCost;
    public $changeNameCost;

    public $originalGenderCost;
    public $originalNameCost;

    public function mount(){
        $settings = settings();
        $this->changeGenderCost = $settings->change_gender_cost;
        $this->changeNameCost = $settings->change_name_cost;
        $this->originalGenderCost = $this->changeGenderCost;
        $this->originalNameCost = $this->changeNameCost;

    }

    public function save(){
        $user = auth()->user();
        if(!$user->isSuperAdmin()){
            $this->dispatch('alert',['type'=>'error','message'=>'You are not authorized to perform this action!']);
            return;
        }
        $settings = settings();
        $settings->change_gender_cost = $this->changeGenderCost;
        $settings->change_name_cost = $this->changeNameCost;
        $settings->save();
        $this->originalGenderCost = $this->changeGenderCost;
        $this->originalNameCost = $this->changeNameCost;
        $this->dispatch('alert',['type'=>'success','message'=>'Settings saved successfully']);
    }

    public function render()
    {
        return view('livewire.admin.settings.general-settings');
    }
}
