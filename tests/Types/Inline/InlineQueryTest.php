<?php

namespace TelegramBotSDK\Test\Types\Inline;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Test\Types\LocationTest;
use TelegramBotSDK\Test\Types\UserTest;
use TelegramBotSDK\Types\Inline\InlineQuery;

class InlineQueryTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
            'location' => LocationTest::getMinResponse(),
            'query' => 'test_query',
            'offset' => '20',
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
            'query' => 'test_query',
            'offset' => '20',
        ];
    }

    protected static function getType(): string
    {
        return InlineQuery::class;
    }

    /**
     * @param InlineQuery $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('test_query', $item->getQuery());
        $this->assertEquals('20', $item->getOffset());
        $this->assertNull($item->getLocation());
    }

    /**
     * @param InlineQuery $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('test_query', $item->getQuery());
        $this->assertEquals('20', $item->getOffset());
        $this->assertEquals(LocationTest::createMinInstance(), $item->getLocation());
    }
}
