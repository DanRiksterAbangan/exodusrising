<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;

class RohanAuthSettings extends Component
{
    public $exeVersion;
    public $validateExeVersion;

    public $nation;
    public $validateNation;
    public $serverList;


    public $originalExeVersion;
    public $originalValidateExeVersion;
    public $originalNation;
    public $originalValidateNation;
    public $originalServerList;


    public function mount(){
        $settings = rohanAuthSettings();
        $this->exeVersion = $settings->exe_version;
        $this->validateExeVersion = $settings->restrict_exe_version;
        $this->nation = $settings->nation;
        $this->validateNation = $settings->restrict_nation;
        $this->serverList = $settings->server_list;
        $this->originalExeVersion = $this->exeVersion;
        $this->originalValidateExeVersion = $this->validateExeVersion;
        $this->originalNation = $this->nation;
        $this->originalValidateNation = $this->validateNation;
        $this->originalServerList = $this->serverList;
    }

    public function save(){
        $user = auth()->user();
        if(!$user->isSuperAdmin()){
            $this->dispatch('alert',['type'=>'error','message'=>'You are not authorized to perform this action!']);
            return;
        }
        $settings = rohanAuthSettings();
        $settings->exe_version = $this->exeVersion;
        $settings->restrict_exe_version = $this->validateExeVersion;
        $settings->nation = $this->nation;
        $settings->restrict_nation = $this->validateNation;
        $settings->save();
        $this->originalExeVersion = $this->exeVersion;
        $this->originalValidateExeVersion = $this->validateExeVersion;
        $this->originalNation = $this->nation;
        $this->originalValidateNation = $this->validateNation;
        $this->dispatch('alert',['type'=>'success','message'=>'Rohan Auth Settings saved!']);
    }
    public function toggle($name,$value){
        $this->$name = $value;
    }
    public function render()
    {
        return view('livewire.admin.settings.rohan-auth-settings');
    }
}
