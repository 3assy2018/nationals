<?php

namespace m3assy\nationals\console;

use m3assy\nationals\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Ixudra\Curl\Facades\Curl;

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
    protected $description = 'Get All Countries to your database';

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
    		Artisan::call("migrate");
    		$curl_response= Curl::to('http://battuta.medunes.net/api/country/all/?key=' . config('nationals.battuta.apiKey'))->get();
        $all= json_decode($curl_response, true);
        foreach ($all as $country){
        	Country::create($country);
				}
        $this->info('Countries Added Successfully');
    }
}
