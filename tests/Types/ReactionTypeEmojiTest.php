<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Enum\ReactionTypeEnum;
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
            'type' => ReactionTypeEnum::Emoji->value,
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
        $this->assertEquals(ReactionTypeEnum::Emoji, $item->getType());
        $this->assertEquals('👍', $item->getEmoji());
    }

    protected static function getType(): string
    {
        return ReactionTypeEmoji::class;
    }
}
