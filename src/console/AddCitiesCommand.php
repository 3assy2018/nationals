<?php

namespace m3assy\nationals\console;

use m3assy\nationals\Country;
use m3assy\nationals\Region;
use Illuminate\Console\Command;
use Ixudra\Curl\Facades\Curl;

class AddCitiesCommand extends Command
{
    /**
     * The name and signature of the Console command.
     *
     * @var string
     */
    protected $signature = 'region:add {all=null} {--code=*}';

    /**
     * The Console command description.
     *
     * @var string
     */
    protected $description = 'Getting all or specific region pf countries';

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
        $all= $this->argument('all');
        $cities= $this->option('code');

        if($all == '*'){
        	$countries= Country::all();
        	foreach ($countries as $country){
						$response= Curl::to("https://battuta.medunes.net/api/region/{$country->code}/all/?key=85d97f67ff7fd1935b314ec4f884ad33")->get();
						$result_cities= json_decode($response, true);
						foreach ($result_cities as $result_city){
							$added_city = new Region($result_city);
							$country->regions()->save($added_city);
						}
						$this->info("Regions of {$country->name} has been added successfully");
					}
				}
				else{
        	if (empty($cities)){
        		$this->error('Please Provide countries codes');
					}
					else
					{
						foreach ($cities as $code){
							$country = Country::where('code', $code)->get()->first();
							$response= Curl::to("https://battuta.medunes.net/api/region/{$code}/all/?key=85d97f67ff7fd1935b314ec4f884ad33")->get();
							$result_cities= json_decode($response, true);
							foreach ($result_cities as $result_city){
								$added_city = new Region($result_city);
								$country->regions()->save($added_city);
							}
							$this->info("Regions of {$country->name} has been added successfully");
						}
					}
				}

    }
}
