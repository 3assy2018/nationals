<?php

namespace M3assy\Nationals\Console;

use Illuminate\Console\Command;
use M3assy\Nationals\Country;

class AddRegionsCommand extends Command
{
    protected $signature = 'region:add {all=null} {--code=*}';

    protected $description = 'Add regions for all or specific countries from bundled data';

    public function handle()
    {
        $all = $this->argument('all');
        $codes = $this->option('code');
        $regionsData = json_decode(file_get_contents(config('nationals.data.regions')), true);

        if ($all == '*') {
            $countries = Country::all();
            foreach ($countries as $country) {
                if (! isset($regionsData[$country->code])) {
                    continue;
                }
                foreach ($regionsData[$country->code] as $region) {
                    $country->regions()->create(['region' => $region]);
                }
                $this->info("Regions of {$country->name} has been added successfully");
            }
        } else {
            if (empty($codes)) {
                $this->error('Please Provide countries codes');
            } else {
                foreach ($codes as $code) {
                    $country = Country::where('code', $code)->first();
                    if (! $country || ! isset($regionsData[$code])) {
                        $this->error("No regions for code {$code}");

                        continue;
                    }
                    foreach ($regionsData[$code] as $region) {
                        $country->regions()->create(['region' => $region]);
                    }
                    $this->info("Regions of {$country->name} has been added successfully");
                }
            }
        }
    }
}
