<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\GiveawayCreated;

class GiveawayCreatedTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [];
    }

    public static function getFullResponse(): array
    {
        return [];
    }

    protected static function getType(): string
    {
        return GiveawayCreated::class;
    }

    protected function assertMinItem($item)
    {
    }

    protected function assertFullItem($item): void
    {
    }
}
