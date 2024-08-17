<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Location;

class LocationTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'latitude' => 55.585827,
            'longitude' => 37.675309,
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'latitude' => 55.585827,
            'longitude' => 37.675309,
            'horizontal_accuracy' => 20.5,
            'live_period' => 300,
            'heading' => 100,
            'proximity_alert_radius' => 15,
        ];
    }

    protected static function getType(): string
    {
        return Location::class;
    }

    /**
     * @param Location $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(55.585827, $item->getLatitude());
        $this->assertEquals(37.675309, $item->getLongitude());
        $this->assertNull($item->getHorizontalAccuracy());
        $this->assertNull($item->getLivePeriod());
        $this->assertNull($item->getHeading());
        $this->assertNull($item->getProximityAlertRadius());
    }

    /**
     * @param Location $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(55.585827, $item->getLatitude());
        $this->assertEquals(37.675309, $item->getLongitude());
        $this->assertEquals(20.5, $item->getHorizontalAccuracy());
        $this->assertEquals(300, $item->getLivePeriod());
        $this->assertEquals(100, $item->getHeading());
        $this->assertEquals(15, $item->getProximityAlertRadius());
    }
}
