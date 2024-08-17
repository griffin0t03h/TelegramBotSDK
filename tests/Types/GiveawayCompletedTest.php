<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\GiveawayCompleted;

class GiveawayCompletedTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'winner_count' => 1,
            'unclaimed_prize_count' => 1,
            'giveaway_message' => MessageTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'winner_count' => 1,
        ];
    }

    protected static function getType(): string
    {
        return GiveawayCompleted::class;
    }

    protected function assertMinItem($item): void
    {
        $this->assertEquals(1, $item->getWinnerCount());
    }

    protected function assertFullItem($item): void
    {
        $this->assertEquals(1, $item->getWinnerCount());
        $this->assertEquals(1, $item->getUnclaimedPrizeCount());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getGiveawayMessage());
    }
}
