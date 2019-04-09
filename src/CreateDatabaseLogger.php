<?php

namespace MWazovzky\DatabaseLogger;

use MWazovzky\DatabaseLogger\DatabaseHandler;
use Monolog\Logger;

class CreateDatabaseLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $monolog = new Logger('database');
        $monolog->pushHandler(new DatabaseHandler());

        return $monolog;
    }
}
