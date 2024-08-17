<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\PollOption;

class PollOptionTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'text' => 'text',
            'voter_count' => 3,
        ];
    }

    protected static function getType(): string
    {
        return PollOption::class;
    }

    /**
     * @param PollOption $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param PollOption $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('text', $item->getText());
        $this->assertEquals(3, $item->getVoterCount());
    }
}
