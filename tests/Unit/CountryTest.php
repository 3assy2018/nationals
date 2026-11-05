<?php

namespace M3assy\Nationals\Tests\Unit;

use M3assy\Nationals\Country;
use M3assy\Nationals\Tests\TestCase;

class CountryTest extends TestCase
{
    public function test_country_can_have_regions()
    {
        $country = Country::create(['name' => 'Egypt', 'code' => 'EG']);
        $country->regions()->create(['region' => 'Cairo']);

        $this->assertEquals(1, $country->regions()->count());
    }
}
