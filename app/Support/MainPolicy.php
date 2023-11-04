<?php


namespace App\Support;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class MainPolicy extends Basic
{
    public function configure()
    {
        parent::configure();
        $this->addDirective(Directive::STYLE,'self  fonts.googleapis.com');
        $this->addDirective(Directive::FONT,'self data:');
        $this->addDirective(Directive::FONT,'self fonts.gstatic.com');
        if (app()->environment('local')) {
            $this->addDirective(Directive::SCRIPT, '127.0.0.1:5173');
            $this->addDirective(Directive::STYLE, '127.0.0.1:5173');
        }
        $this->addNonceForDirective(Directive::SCRIPT);
        $this->addNonceForDirective(Directive::STYLE);

    }
}
