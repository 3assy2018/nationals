<?php

namespace M3assy\Nationals\Tests\Integration;

use M3assy\Nationals\Country;
use M3assy\Nationals\Region;
use M3assy\Nationals\Tests\TestCase;

class CommandsTest extends TestCase
{
    public function test_all_countries_command_seeds_countries()
    {
        $this->artisan('nationals:start')->assertExitCode(0);
        $data = json_decode(file_get_contents(__DIR__.'/../../database/data/countries.json'), true);
        $this->assertEquals(count($data), Country::count());
    }

    public function test_add_regions_command_seeds_all_regions()
    {
        $this->artisan('nationals:start');
        $this->artisan('region:add', ['all' => '*'])->assertExitCode(0);
        $regionsData = json_decode(file_get_contents(__DIR__.'/../../database/data/regions.json'), true);
        $total = array_reduce($regionsData, fn ($carry, $regions) => $carry + count($regions), 0);
        $this->assertEquals($total, Region::count());
    }

    public function test_add_regions_command_seeds_specific_country()
    {
        $this->artisan('nationals:start');
        $regionsData = json_decode(file_get_contents(__DIR__.'/../../database/data/regions.json'), true);
        $this->artisan('region:add', ['--code' => ['EG']])->assertExitCode(0);
        $this->assertEquals(count($regionsData['EG']), Region::count());
        $this->assertEquals(count($regionsData['EG']), Country::where('code', 'EG')->first()->regions()->count());
        $this->assertEquals(0, Country::where('code', 'US')->first()->regions()->count());
    }
}
