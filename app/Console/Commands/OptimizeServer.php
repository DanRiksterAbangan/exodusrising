<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class OptimizeServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'boost';

    /**
     * Execute the console command.
     */
    public function handle()
    {

            Artisan::call("config:cache");
            Artisan::call("route:cache");
            Artisan::call("view:cache");
            Artisan::call("optimize");
        $this->info("Server Optimized!");
    }
}
