<?php

namespace UBee\UBeeLog;

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/logging.php','ubl');
        config(['logging.channels.telegram' => config('ubl.channels.telegram')]);
        $defaultChannels = config('logging.channels.stack.channels');
        $mergedChannels = array_merge($defaultChannels, ['telegram']);
        config(['logging.channels.stack.channels' => $mergedChannels]);
    }
}
