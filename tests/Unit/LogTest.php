<?php

namespace Tests\Unit;

use MWazovzky\DatabaseLogger\Models\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_has_required_attributes()
    {
        $log = factory(Log::class)->create([
            'level' => 'error',
            'channel' => 'channel',
            'message' => 'some message',
        ]);

        $this->assertEquals('error', $log->level);
        $this->assertEquals('channel', $log->channel);
        $this->assertEquals('some message', $log->message);
    }

    /**
     * @test
     */
    public function it_may_have_context_attribute()
    {
        $log = factory(Log::class)->create([
            'context' => ['foo' => 'bar'],
        ]);

        $this->assertEquals(['foo' => 'bar'], $log->context);
    }
}
