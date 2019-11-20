<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class insert_addition extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $schedule->call(function () {
            $amenity=new hotel_amenity;
            $amenity->hotel_amenities='new amenity';
        })->everyMinute();
    }
}
