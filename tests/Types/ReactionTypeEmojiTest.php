<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ReactionTypeEmoji;

class ReactionTypeEmojiTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'type' => 'emoji',
            'emoji' => '👍',
        ];
    }

    /**
     * @param ReactionTypeEmoji $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param ReactionTypeEmoji $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('emoji', $item->getType());
        $this->assertEquals('👍', $item->getEmoji());
    }

    protected static function getType(): string
    {
        return ReactionTypeEmoji::class;
    }
}
