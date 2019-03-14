<?php

namespace Tests\Unit;

use MWazovzky\LaravelDatabaseLogger\LaravelDatabaseLogger;
use Tests\TestCase;

class LaravelDatabaseLoggerTest extends TestCase
{
    /**
     * @test
     */
    public function it_runs_test()
    {
        $logger = new LaravelDatabaseLogger();
        $this->assertEquals('hello', $logger->hello());
    }
}
