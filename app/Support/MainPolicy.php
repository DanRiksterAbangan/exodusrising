<?php


namespace App\Support;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class MainPolicy extends Basic
{
    public function configure()
    {
        parent::configure();
        $this->addDirective(Directive::STYLE, ' fonts.googleapis.com')
            ->addDirective(Directive::STYLE, ' fonts.gstatic.com')
            ->addDirective(Directive::FONT, ' fonts.gstatic.com/s/')
            ->addDirective(Directive::FONT, ' data:');
        if (app()->environment('local')) {
            $this->addDirective(Directive::SCRIPT, '127.0.0.1:5173');
            $this->addDirective(Directive::STYLE, '127.0.0.1:5173')
            ->addDirective(Directive::FONT, 'self')
            ->addDirective(Directive::SCRIPT,['http://gc.kis.v2.scr.kaspersky-labs.com']);
        }


    }
}
