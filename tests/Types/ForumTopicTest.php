<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ForumTopic;

class ForumTopicTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'message_thread_id' => 1,
            'name' => 'name',
            'icon_color' => 2,
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'message_thread_id' => 1,
            'name' => 'name',
            'icon_color' => 2,
            'icon_custom_emoji_id' => 'icon_custom_emoji_id',
        ];
    }

    protected static function getType(): string
    {
        return ForumTopic::class;
    }

    /**
     * @param ForumTopic $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(1, $item->getMessageThreadId());
        $this->assertEquals('name', $item->getName());
        $this->assertEquals(2, $item->getIconColor());
        $this->assertNull($item->getIconCustomEmojiId());
    }

    /**
     * @param ForumTopic $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(1, $item->getMessageThreadId());
        $this->assertEquals('name', $item->getName());
        $this->assertEquals(2, $item->getIconColor());
        $this->assertEquals('icon_custom_emoji_id', $item->getIconCustomEmojiId());
    }
}
