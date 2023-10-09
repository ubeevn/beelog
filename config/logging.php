<?php

use Monolog\Handler\FilterHandler;
use Monolog\Handler\TelegramBotHandler;
use UBee\UBeeLog\JsonFormatter;

return [
    'channels' => [
        "telegram" => [
            'driver'  => 'monolog',
            'handler' => FilterHandler::class,
            'level' => 'debug',
            'with' => [
                'handler' => new TelegramBotHandler($apiKey = env('TELEGRAM_API_KEY'), $channel = env('TELEGRAM_CHANNEL'))
            ],
            'formatter' => JsonFormatter::class,
        ],
    ]
];
