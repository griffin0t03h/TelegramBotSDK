<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Enum\MessageEntityType;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\MessageEntity;

class MessageEntityTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'type' => 'text_mention',
            'offset' => 108,
            'length' => 10,
            'url' => 'url',
            'user' => UserTest::getMinResponse(),
            'language' => 'language',
            'custom_emoji_id' => 'custom_emoji_id',
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'type' => 'text_mention',
            'offset' => 108,
            'length' => 10,
        ];
    }

    public function testPreFromResponse()
    {
        $messageEntity = MessageEntity::fromResponse([
            'type' => 'pre',
            'offset' => 16,
            'length' => 128,
            'language' => 'php',
        ]);

        $this->assertInstanceOf(MessageEntity::class, $messageEntity);
        $this->assertEquals(MessageEntityType::Pre, $messageEntity->getType());
        $this->assertEquals(16, $messageEntity->getOffset());
        $this->assertEquals(128, $messageEntity->getLength());
        $this->assertNull($messageEntity->getUrl());
        $this->assertNull($messageEntity->getUser());
        $this->assertEquals('php', $messageEntity->getLanguage());
    }

    protected static function getType(): string
    {
        return MessageEntity::class;
    }

    /**
     * @param MessageEntity $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(MessageEntityType::TextMention, $item->getType());
        $this->assertEquals(108, $item->getOffset());
        $this->assertEquals(10, $item->getLength());
        $this->assertNull($item->getUrl());
        $this->assertNull($item->getUser());
        $this->assertNull($item->getLanguage());
        $this->assertNull($item->getCustomEmojiId());
    }

    /**
     * @param MessageEntity $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(MessageEntityType::TextMention, $item->getType());
        $this->assertEquals(108, $item->getOffset());
        $this->assertEquals(10, $item->getLength());
        $this->assertEquals('url', $item->getUrl());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
        $this->assertEquals('language', $item->getLanguage());
        $this->assertEquals('custom_emoji_id', $item->getCustomEmojiId());
    }
}
