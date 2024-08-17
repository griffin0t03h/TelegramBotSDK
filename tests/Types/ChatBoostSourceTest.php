<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Enum\ChatBoostSource as ChatBoostSourceEnum;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ChatBoostSource;

class ChatBoostSourceTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'source' => ChatBoostSourceEnum::Premium->value,
            'user' => UserTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'source' => ChatBoostSourceEnum::Premium->value,
            'user' => UserTest::getMinResponse(),
        ];
    }

    protected static function getType(): string
    {
        return ChatBoostSource::class;
    }

    protected function assertMinItem($item): void
    {
        $this->assertEquals(ChatBoostSourceEnum::Premium, $item->getSource());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
    }

    protected function assertFullItem($item): void
    {
        $this->assertEquals(ChatBoostSourceEnum::Premium, $item->getSource());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
    }
}
