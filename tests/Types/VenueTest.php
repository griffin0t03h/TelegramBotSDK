<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Venue;

class VenueTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'location' => LocationTest::getMinResponse(),
            'title' => 'title',
            'address' => 'address',
            'foursquare_id' => 'foursquare_id',
            'foursquare_type' => 'foursquare_type',
            'google_place_id' => 'google_place_id',
            'google_place_type' => 'google_place_type',
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'location' => LocationTest::getMinResponse(),
            'title' => 'title',
            'address' => 'address',
        ];
    }

    protected static function getType(): string
    {
        return Venue::class;
    }

    /**
     * @param Venue $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals('address', $item->getAddress());
        $this->assertEquals(LocationTest::createMinInstance(), $item->getLocation());
        $this->assertNull($item->getFoursquareId());
        $this->assertNull($item->getFoursquareType());
        $this->assertNull($item->getGooglePlaceId());
        $this->assertNull($item->getGooglePlaceType());
    }

    /**
     * @param Venue $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals('address', $item->getAddress());
        $this->assertEquals(LocationTest::createMinInstance(), $item->getLocation());
        $this->assertEquals('foursquare_id', $item->getFoursquareId());
        $this->assertEquals('foursquare_type', $item->getFoursquareType());
        $this->assertEquals('google_place_id', $item->getGooglePlaceId());
        $this->assertEquals('google_place_type', $item->getGooglePlaceType());
    }
}
