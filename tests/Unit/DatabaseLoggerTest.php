<?php

namespace Tests\Unit;

use MWazovzky\DatabaseLogger\DatabaseLogger;
use Tests\TestCase;

class DatabaseLoggerTest extends TestCase
{
    /**
     * @test
     */
    public function it_runs_test()
    {
        $logger = new DatabaseLogger();
        $this->assertEquals('hello', $logger->hello());
    }
}
