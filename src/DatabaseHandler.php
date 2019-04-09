<?php

namespace MWazovzky\DatabaseLogger;

use MWazovzky\DatabaseLogger\Models\Log;
use Monolog\Handler\AbstractProcessingHandler;

class DatabaseHandler extends AbstractProcessingHandler
{
    protected function write(array $record)
    {
        $log = Log::create([
            // standard log attributes
            'channel' => $record['channel'],
            'level' => $record['level_name'],
            'message' => $record['message'],
            'context' => $this->getContext($record['context']),

            // extended log attributes
            'batch_id' => $this->extract($record['context'], 'batch_id'),
            'batch_type' => $this->extract($record['context'], 'batch_type'),
        ]);
    }

    protected function extract(array $context, string $key)
    {
        return array_key_exists($key, $context) ? $context[$key] : null;
    }

    public function getContext($context)
    {
        $keys = ['batch_id', 'batch_type'];

        return array_diff_key($context, array_flip($keys));
    }
}
