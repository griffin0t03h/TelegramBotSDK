<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Dice;

class DiceTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'emoji' => '🎉',
            'value' => 5,
        ];
    }

    protected static function getType(): string
    {
        return Dice::class;
    }

    /**
     * @param Dice $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param Dice $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('🎉', $item->getEmoji());
        $this->assertEquals(5, $item->getValue());
    }
}
