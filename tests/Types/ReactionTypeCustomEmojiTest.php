<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ReactionTypeCustomEmoji;

class ReactionTypeCustomEmojiTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'type' => 'custom_emoji',
            'custom_emoji_id' => 'custom_emoji_123',
        ];
    }

    /**
     * @param ReactionTypeCustomEmoji $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param ReactionTypeCustomEmoji $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('custom_emoji', $item->getType());
        $this->assertEquals('custom_emoji_123', $item->getCustomEmojiId());
    }

    protected static function getType(): string
    {
        return ReactionTypeCustomEmoji::class;
    }
}
