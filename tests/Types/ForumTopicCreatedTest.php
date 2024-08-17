<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ForumTopicCreated;

class ForumTopicCreatedTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'name' => 'name',
            'icon_color' => 2,
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'name' => 'name',
            'icon_color' => 2,
            'icon_custom_emoji_id' => 'icon_custom_emoji_id',
        ];
    }

    protected static function getType(): string
    {
        return ForumTopicCreated::class;
    }

    /**
     * @param ForumTopicCreated $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('name', $item->getName());
        $this->assertEquals(2, $item->getIconColor());
        $this->assertNull($item->getIconCustomEmojiId());
    }

    /**
     * @param ForumTopicCreated $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('name', $item->getName());
        $this->assertEquals(2, $item->getIconColor());
        $this->assertEquals('icon_custom_emoji_id', $item->getIconCustomEmojiId());
    }
}
