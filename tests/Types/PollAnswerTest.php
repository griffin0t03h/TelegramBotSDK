<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\PollAnswer;

class PollAnswerTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'option_ids' => [1, 2, 3, 4, 5, 6],
            'user' => UserTest::getMinResponse(),
            'poll_id' => 123456789,
        ];
    }

    protected static function getType(): string
    {
        return PollAnswer::class;
    }

    /**
     * @param PollAnswer $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param PollAnswer $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(123456789, $item->getPollId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
        $this->assertEquals([1, 2, 3, 4, 5, 6], $item->getOptionIds());
    }
}
