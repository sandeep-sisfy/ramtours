<?php

namespace App\Console\Commands;

use App\Http\Controllers\automation\AutomationController;
use Illuminate\Console\Command;

class UpdateAllPackages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ramitours:updatePackages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all packages cost - Run every 15 min';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $a = new AutomationController;
        $a->setup_all_package_cost();
    }
}