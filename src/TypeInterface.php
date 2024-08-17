<?php

namespace TelegramBotSDK;

interface TypeInterface
{
    /**
     * @param array $data
     */
    public static function fromResponse(array $data);
}
