<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\SentWebAppMessage;

class SentWebAppMessageTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [];
    }

    public static function getFullResponse(): array
    {
        return [
            'inline_message_id' => 'inline_message_id',
        ];
    }

    protected static function getType(): string
    {
        return SentWebAppMessage::class;
    }

    /**
     * @param SentWebAppMessage $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertNull($item->getInlineMessageId());
    }

    /**
     * @param SentWebAppMessage $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('inline_message_id', $item->getInlineMessageId());
    }
}
