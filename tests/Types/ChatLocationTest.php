<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ChatLocation;

class ChatLocationTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'location' => LocationTest::getMinResponse(),
            'address' => 'Wall St. 123',
        ];
    }

    protected static function getType(): string
    {
        return ChatLocation::class;
    }

    /**
     * @param ChatLocation $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param ChatLocation $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(LocationTest::createMinInstance(), $item->getLocation());
        $this->assertEquals('Wall St. 123', $item->getAddress());
    }
}
