<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Giveaway;

class GiveawayTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'chats' => [
                ChatTest::getMinResponse(),
            ],
            'winners_selection_date' => 1682343643,
            'winner_count' => 1,
            'only_new_members' => true,
            'has_public_winners' => true,
            'prize_description' => 'prize',
            'country_codes' => ['RU'],
            'premium_subscription_month_count' => 1,
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'chats' => [
                ChatTest::getMinResponse(),
            ],
            'winners_selection_date' => 1682343643,
            'winner_count' => 1,
        ];
    }

    protected static function getType(): string
    {
        return Giveaway::class;
    }

    protected function assertMinItem($item): void
    {
        $this->assertEquals(1, $item->getWinnerCount());
        $this->assertEquals(1682343643, $item->getWinnersSelectionDate());
        $this->assertIsArray($item->getChats());

        $this->assertNull($item->getOnlyNewMembers());
        $this->assertNull($item->getHasPublicWinners());
        $this->assertNull($item->getPrizeDescription());
        $this->assertNull($item->getCountryCodes());
        $this->assertNull($item->getPremiumSubscriptionMonthCount());
    }

    protected function assertFullItem($item): void
    {
        $this->assertEquals(1, $item->getWinnerCount());
        $this->assertEquals(1682343643, $item->getWinnersSelectionDate());
        $this->assertIsArray($item->getChats());
        $this->assertTrue($item->getOnlyNewMembers());
        $this->assertTrue($item->getHasPublicWinners());
        $this->assertEquals('prize', $item->getPrizeDescription());
        $this->assertIsArray($item->getCountryCodes());
        $this->assertEquals(1, $item->getPremiumSubscriptionMonthCount());
    }
}
