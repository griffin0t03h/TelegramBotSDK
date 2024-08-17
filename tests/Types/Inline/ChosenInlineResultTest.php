<?php

namespace TelegramBotSDK\Test\Types\Inline;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Test\Types\LocationTest;
use TelegramBotSDK\Test\Types\UserTest;
use TelegramBotSDK\Types\Inline\ChosenInlineResult;

class ChosenInlineResultTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'result_id' => 1,
            'from' => UserTest::getMinResponse(),
            'query' => 'test_query',
            'location' => LocationTest::getMinResponse(),
            'inline_message_id' => 'inline_message_id',
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'result_id' => 1,
            'from' => UserTest::getMinResponse(),
            'query' => 'test_query',
        ];
    }

    protected static function getType(): string
    {
        return ChosenInlineResult::class;
    }

    /**
     * @param ChosenInlineResult $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(1, $item->getResultId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('test_query', $item->getQuery());
        $this->assertNull($item->getLocation());
        $this->assertNull($item->getInlineMessageId());
    }

    /**
     * @param ChosenInlineResult $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(1, $item->getResultId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('test_query', $item->getQuery());
        $this->assertEquals(LocationTest::createMinInstance(), $item->getLocation());
        $this->assertEquals('inline_message_id', $item->getInlineMessageId());
    }
}
