<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ChatJoinRequest;

class ChatJoinRequestTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'from' => UserTest::getMinResponse(),
            'user_chat_id' => 10,
            'date' => 100500,
            'bio' => 'bio',
            'invite_link' => ChatInviteLinkTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'from' => UserTest::getMinResponse(),
            'user_chat_id' => 10,
            'date' => 100500,
        ];
    }

    protected static function getType(): string
    {
        return ChatJoinRequest::class;
    }

    /**
     * @param ChatJoinRequest $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals(10, $item->getUserChatId());
        $this->assertEquals(100500, $item->getDate());
        $this->assertNull($item->getBio());
        $this->assertNull($item->getInviteLink());
    }

    /**
     * @param ChatJoinRequest $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals(10, $item->getUserChatId());
        $this->assertEquals(100500, $item->getDate());
        $this->assertEquals('bio', $item->getBio());
        $this->assertEquals(ChatInviteLinkTest::createMinInstance(), $item->getInviteLink());
    }
}
