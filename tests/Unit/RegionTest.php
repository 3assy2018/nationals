<?php

namespace M3assy\Nationals\Tests\Unit;

use M3assy\Nationals\Country;
use M3assy\Nationals\Tests\TestCase;

class RegionTest extends TestCase
{
    public function test_region_belongs_to_country()
    {
        $country = Country::create(['name' => 'Egypt', 'code' => 'EG']);
        $region = $country->regions()->create(['region' => 'Cairo']);

        $this->assertInstanceOf(Country::class, $region->country);
    }
}
