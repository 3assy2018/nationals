<?php

namespace M3assy\Nationals\Tests\Unit;

use M3assy\Nationals\Facades\Nationals as NationalsFacade;
use M3assy\Nationals\Nationals;
use M3assy\Nationals\Tests\TestCase;

class BindingTest extends TestCase
{
    public function test_nationals_is_bound_and_resolvable()
    {
        $this->assertInstanceOf(Nationals::class, app('nationals'));
        $this->assertInstanceOf(Nationals::class, NationalsFacade::getFacadeRoot());
    }
}
