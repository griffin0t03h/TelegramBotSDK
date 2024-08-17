<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ForumTopicClosed;

class ForumTopicClosedTest extends AbstractTypeTest
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
        return ForumTopicClosed::class;
    }

    /**
     * @param ForumTopicClosed $item
     * @return void
     */
    protected function assertMinItem($item)
    {
    }

    /**
     * @param ForumTopicClosed $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
    }
}
