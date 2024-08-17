<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ChatBoost;

class ChatBoostTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'boost_id' => 1,
            'add_date' => 1682343643,
            'expiration_date' => 1725042370,
            'source' => ChatBoostSourceTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'boost_id' => 1,
            'add_date' => 1682343643,
            'expiration_date' => 1725042370,
            'source' => ChatBoostSourceTest::getMinResponse(),
        ];
    }

    protected static function getType(): string
    {
        return ChatBoost::class;
    }

    protected function assertMinItem($item): void
    {
        $this->assertEquals(1, $item->getBoostId());
        $this->assertEquals(1682343643, $item->getAddDate());
        $this->assertEquals(1725042370, $item->getExpirationDate());
        $this->assertEquals(ChatBoostSourceTest::createMinInstance(), $item->getSource());
    }

    protected function assertFullItem($item): void
    {
        $this->assertEquals(1, $item->getBoostId());
        $this->assertEquals(1682343643, $item->getAddDate());
        $this->assertEquals(1725042370, $item->getExpirationDate());
        $this->assertEquals(ChatBoostSourceTest::createMinInstance(), $item->getSource());
    }
}
