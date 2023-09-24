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


    public function __construct(){
       auth()->user()->isSuperAdmin() ?? abort(403);
    }

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

    public function saveServer($key){
        $settings = rohanAuthSettings();
        $settings->server_list = $this->serverList;
        $settings->save();
        $this->originalServerList = $this->serverList;
        $this->dispatch('alert',['type'=>'success','message'=>'Server List saved!',"modal"=>'updateServermodal'.$key]);
    }
    public function removeServer($key){
        unset($this->serverList[$key]);
        $settings = rohanAuthSettings();
        $settings->server_list = $this->serverList;
        $settings->save();
        $this->originalServerList = $this->serverList;
    }
    public function addServer(){
        $this->serverList[] = ['name'=>'Rohan Online','ip'=>'127.0.0.1','status'=>'Online','message'=>'','show'=>false];
        $settings = rohanAuthSettings();
        $settings->server_list = $this->serverList;
        $settings->save();
        $this->originalServerList = $this->serverList;
    }
    public function toggleServer($key){
        $this->serverList[$key]['show'] = !$this->serverList[$key]['show'];
        $settings = rohanAuthSettings();
        $settings->server_list = $this->serverList;
        $settings->save();
        $this->originalServerList = $this->serverList;
    }
    public function save(){
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
