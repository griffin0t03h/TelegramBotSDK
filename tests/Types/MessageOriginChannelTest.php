<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Enum\ChatType;
use TelegramBotSDK\Enum\MessageOriginType;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Chat;
use TelegramBotSDK\Types\MessageOriginChannel;

class MessageOriginChannelTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'type' => MessageOriginType::Channel->value,
            'date' => 1640908800,
            'chat' => [
                'id' => 123456,
                'type' => ChatType::Private->value,
            ],
            'message_id' => 12345,
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'type' => MessageOriginType::Channel->value,
            'date' => 1640908800,
            'chat' => [
                'id' => 123456,
                'type' => ChatType::Private->value,
            ],
            'message_id' => 12345,
            'author_signature' => 'John Doe',
        ];
    }

    /**
     * @param MessageOriginChannel $item
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(MessageOriginType::Channel, $item->getType());
        $this->assertEquals(1640908800, $item->getDate());
        $this->assertEquals(12345, $item->getMessageId());
        $this->assertNull($item->getAuthorSignature());

        $chat = $item->getChat();
        $this->assertInstanceOf(Chat::class, $chat);
        $this->assertEquals(123456, $chat->getId());
        $this->assertEquals(ChatType::Private, $chat->getType());
    }

    protected static function getType(): string
    {
        return MessageOriginChannel::class;
    }

    /**
     * @param MessageOriginChannel $item
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(MessageOriginType::Channel, $item->getType());
        $this->assertEquals(1640908800, $item->getDate());
        $this->assertEquals(12345, $item->getMessageId());
        $this->assertEquals('John Doe', $item->getAuthorSignature());

        $chat = $item->getChat();
        $this->assertInstanceOf(Chat::class, $chat);
        $this->assertEquals(123456, $chat->getId());
        $this->assertEquals(ChatType::Private, $chat->getType());
    }
}
