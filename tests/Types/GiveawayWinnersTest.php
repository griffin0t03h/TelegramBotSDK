<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\GiveawayWinners;

class GiveawayWinnersTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'giveaway_message_id' => 1,
            'winners_selection_date' => 1682343643,
            'winner_count' => 1,
            'winners' => [
                UserTest::getMinResponse(),
            ],
            'additional_chat_count' => 1,
            'premium_subscription_month_count' => 1,
            'unclaimed_prize_count' => 0,
            'only_new_members' => true,
            'was_refunded' => true,
            'prize_description' => 'prize',
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'giveaway_message_id' => 1,
            'winners_selection_date' => 1682343643,
            'winner_count' => 1,
            'winners' => [
                UserTest::getMinResponse(),
            ],
        ];
    }

    protected static function getType(): string
    {
        return GiveawayWinners::class;
    }

    protected function assertMinItem($item): void
    {
        $this->assertEquals(1, $item->getGiveawayMessageId());
        $this->assertEquals(1682343643, $item->getWinnersSelectionDate());
        $this->assertEquals(1, $item->getWinnerCount());
        $this->assertEquals([UserTest::createMinInstance()], $item->getWinners());
        $this->assertNull($item->getAdditionalChatCount());
        $this->assertNull($item->getPremiumSubscriptionMonthCount());
        $this->assertNull($item->getUnclaimedPrizeCount());
        $this->assertNull($item->getOnlyNewMembers());
        $this->assertNull($item->getWasRefunded());
        $this->assertNull($item->getPrizeDescription());
    }

    protected function assertFullItem($item): void
    {
        $this->assertEquals(1, $item->getGiveawayMessageId());
        $this->assertEquals(1682343643, $item->getWinnersSelectionDate());
        $this->assertEquals(1, $item->getWinnerCount());
        $this->assertEquals([UserTest::createMinInstance()], $item->getWinners());
        $this->assertEquals(1, $item->getAdditionalChatCount());
        $this->assertEquals(1, $item->getPremiumSubscriptionMonthCount());
        $this->assertEquals(0, $item->getUnclaimedPrizeCount());
        $this->assertTrue($item->getOnlyNewMembers());
        $this->assertTrue($item->getWasRefunded());
        $this->assertEquals('prize', $item->getPrizeDescription());
    }
}
