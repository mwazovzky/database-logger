<?php

namespace Tests\Unit;

use MWazovzky\DatabaseLogger\Models\Log as LogEntry;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoggerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_logs_to_database()
    {
        $this->assertCount(0, LogEntry::all());

        Log::channel('database')
            ->log('error', 'some message', ['foo' => 'bar']);

        $this->assertCount(1, LogEntry::all());

        tap(LogEntry::first(), function ($log) {
            $this->assertEquals('ERROR', $log->level);
            $this->assertEquals('database', $log->channel);
            $this->assertEquals('some message', $log->message);
            $this->assertEquals(['foo' => 'bar'], $log->context);
        });
    }
}
