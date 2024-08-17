<?php

namespace TelegramBotSDK\Collection;

interface CollectionItemInterface
{
    /**
     * @param bool $inner
     * @return array|string
     */
    public function toJson(bool $inner = false): array|string;
}
