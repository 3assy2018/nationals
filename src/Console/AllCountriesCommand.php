<?php

namespace M3assy\Nationals\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use M3assy\Nationals\Country;

class AllCountriesCommand extends Command
{
    /**
     * The name and signature of the Console command.
     *
     * @var string
     */
    protected $signature = 'nationals:start';

    /**
     * The Console command description.
     *
     * @var string
     */
    protected $description = 'Seed all countries into your database';

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
     * Execute the Console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('migrate');
        $path = config('nationals.data.countries');
        $all = json_decode(file_get_contents($path), true);
        foreach ($all as $country) {
            Country::create($country);
        }
    }
}
