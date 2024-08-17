<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\MaskPosition;

class MaskPositionTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'point' => 'mouth',
            'x_shift' => 1.0,
            'y_shift' => 1.0,
            'scale' => 2.0,
        ];
    }

    protected static function getType(): string
    {
        return MaskPosition::class;
    }

    /**
     * @param MaskPosition $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param MaskPosition $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('mouth', $item->getPoint());
        $this->assertEquals('1.0', $item->getXShift());
        $this->assertEquals('1.0', $item->getYShift());
        $this->assertEquals('2.0', $item->getScale());
    }
}
