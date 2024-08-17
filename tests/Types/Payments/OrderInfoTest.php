<?php

namespace TelegramBotSDK\Test\Types\Payments;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Payments\OrderInfo;

class OrderInfoTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'name' => 'name',
            'phone_number' => 'phone_number',
            'email' => 'email',
            'shipping_address' => ShippingAddressTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [];
    }

    protected static function getType(): string
    {
        return OrderInfo::class;
    }

    /**
     * @param OrderInfo $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertNull($item->getName());
        $this->assertNull($item->getPhoneNumber());
        $this->assertNull($item->getEmail());
        $this->assertNull($item->getShippingAddress());
    }

    /**
     * @param OrderInfo $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('name', $item->getName());
        $this->assertEquals('phone_number', $item->getPhoneNumber());
        $this->assertEquals('email', $item->getEmail());
        $this->assertEquals(ShippingAddressTest::createMinInstance(), $item->getShippingAddress());
    }
}
