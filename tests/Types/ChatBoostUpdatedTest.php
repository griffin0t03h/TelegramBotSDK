<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ChatBoostUpdated;

class ChatBoostUpdatedTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'boost' => ChatBoostTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'boost' => ChatBoostTest::getMinResponse(),
        ];
    }

    protected static function getType(): string
    {
        return ChatBoostUpdated::class;
    }

    protected function assertMinItem($item): void
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(ChatBoostTest::createMinInstance(), $item->getBoost());
    }

    protected function assertFullItem($item): void
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(ChatBoostTest::createMinInstance(), $item->getBoost());
    }
}
