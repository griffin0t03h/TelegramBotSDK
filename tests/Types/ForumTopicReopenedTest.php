<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ForumTopicReopened;

class ForumTopicReopenedTest extends AbstractTypeTest
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
        return ForumTopicReopened::class;
    }

    /**
     * @param ForumTopicReopened $item
     * @return void
     */
    protected function assertMinItem($item)
    {
    }

    /**
     * @param ForumTopicReopened $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
    }
}
