<?php


namespace App\Support;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class MainPolicy extends Basic
{
    public function configure()
    {
        parent::configure();

        $this->addDirective(Directive::SCRIPT, 'self');
        $this->addDirective(Directive::STYLE, 'self');
        $this->addDirective(Directive::STYLE,'fonts.googleapis.com');
        $this->addNonceForDirective(Directive::SCRIPT);
        $this->addNonceForDirective(Directive::STYLE);

    }
}
