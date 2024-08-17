<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ChatBoostRemoved;

class ChatBoostRemovedTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'boost_id' => 1,
            'remove_date' => 1682343643,
            'source' => ChatBoostSourceTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'boost_id' => 1,
            'remove_date' => 1682343643,
            'source' => ChatBoostSourceTest::getMinResponse(),
        ];
    }

    protected static function getType(): string
    {
        return ChatBoostRemoved::class;
    }

    protected function assertMinItem($item): void
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(1, $item->getBoostId());
        $this->assertEquals(1682343643, $item->getRemoveDate());
        $this->assertEquals(ChatBoostSourceTest::createMinInstance(), $item->getSource());
    }

    protected function assertFullItem($item): void
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(1, $item->getBoostId());
        $this->assertEquals(1682343643, $item->getRemoveDate());
        $this->assertEquals(ChatBoostSourceTest::createMinInstance(), $item->getSource());
    }
}
