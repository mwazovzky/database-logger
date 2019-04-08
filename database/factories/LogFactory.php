<?php

use Faker\Generator as Faker;

$factory->define(MWazovzky\DatabaseLogger\Models\Log::class, function (Faker $faker) {
    return [
        'level' => 'error',
        'channel' => 'example channel',
        'message' => 'example message',
    ];
});
