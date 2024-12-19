<?php

namespace UBee\UBeeLog;

use Illuminate\Support\ServiceProvider as Provider;
use Monolog\Handler\TelegramBotHandler;

class ServiceProvider extends Provider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/logging.php','ubl');
        config(['logging.channels.telegram' => config('ubl.channels.telegram')]);
        $with = new TelegramBotHandler(config('ubl.tele_key','example-key'), config('ubl.tele_channel','example-channel-id'));
        config(['logging.channels.telegram.with.handler' => $with]);
        $defaultChannels = config('logging.channels.stack.channels');
        $mergedChannels = array_merge($defaultChannels, ['telegram']);
        config(['logging.channels.stack.channels' => $mergedChannels]);
    }

    public function register()
    {

    }
}
