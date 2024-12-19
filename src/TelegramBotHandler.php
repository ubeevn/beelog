<?php

namespace UBee\UBeeLog;

use Monolog\Handler\TelegramBotHandler as BaseHandler;

class TelegramBotHandler extends BaseHandler
{
    public function __construct()
    {
        parent::__construct(config('ubl.tele_key','example-key'), config('ubl.tele_channel','example-chanel-id'));
    }
}
