<?php


namespace App\Support;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class MainPolicy extends Basic
{
    public function configure()
    {
        parent::configure();
        $this->addDirective(Directive::STYLE,' fonts.googleapis.com');
        $this->addDirective(Directive::FONT,'data:');
        $this->addDirective(Directive::FONT,'fonts.gstatic.com');
        $this->addDirective(Directive::FONT,'self');
        $this->addDirective(Directive::STYLE,'self');
        $this->addDirective(Directive::SCRIPT,'self');
        if (app()->environment('local')) {
            $this->addDirective(Directive::SCRIPT, '127.0.0.1:5173');
            $this->addDirective(Directive::STYLE, '127.0.0.1:5173');
        }


    }
}
