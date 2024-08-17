<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ChatInviteLink;

class ChatInviteLinkTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'invite_link' => 'invite_link',
            'creator' => UserTest::getMinResponse(),
            'creates_join_request' => true,
            'is_primary' => true,
            'is_revoked' => true,
            'name' => 'name',
            'expire_date' => 100500,
            'member_limit' => 10,
            'pending_join_request_count' => 10,
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'invite_link' => 'invite_link',
            'creator' => UserTest::getMinResponse(),
            'creates_join_request' => true,
            'is_primary' => true,
            'is_revoked' => true,
        ];
    }

    protected static function getType(): string
    {
        return ChatInviteLink::class;
    }

    /**
     * @param ChatInviteLink $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('invite_link', $item->getInviteLink());
        $this->assertEquals(UserTest::createMinInstance(), $item->getCreator());
        $this->assertTrue($item->getCreatesJoinRequest());
        $this->assertTrue($item->isPrimary());
        $this->assertTrue($item->isRevoked());
        $this->assertNull($item->getName());
        $this->assertNull($item->getExpireDate());
        $this->assertNull($item->getMemberLimit());
        $this->assertNull($item->getPendingJoinRequestCount());
    }

    /**
     * @param ChatInviteLink $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('invite_link', $item->getInviteLink());
        $this->assertEquals(UserTest::createMinInstance(), $item->getCreator());
        $this->assertTrue($item->getCreatesJoinRequest());
        $this->assertTrue($item->isPrimary());
        $this->assertTrue($item->isRevoked());
        $this->assertEquals('name', $item->getName());
        $this->assertEquals(100500, $item->getExpireDate());
        $this->assertEquals(10, $item->getMemberLimit());
        $this->assertEquals(10, $item->getPendingJoinRequestCount());
    }
}
