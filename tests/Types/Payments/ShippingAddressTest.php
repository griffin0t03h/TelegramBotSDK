<?php

namespace TelegramBotSDK\Test\Types\Payments;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Payments\ShippingAddress;

class ShippingAddressTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'country_code' => 'country_code',
            'state' => 'state',
            'city' => 'city',
            'street_line1' => 'street_line1',
            'street_line2' => 'street_line2',
            'post_code' => 'post_code',
        ];
    }

    protected static function getType(): string
    {
        return ShippingAddress::class;
    }

    /**
     * @param ShippingAddress $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param ShippingAddress $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('country_code', $item->getCountryCode());
        $this->assertEquals('state', $item->getState());
        $this->assertEquals('city', $item->getCity());
        $this->assertEquals('street_line1', $item->getStreetLine1());
        $this->assertEquals('street_line2', $item->getStreetLine2());
        $this->assertEquals('post_code', $item->getPostCode());
    }
}
