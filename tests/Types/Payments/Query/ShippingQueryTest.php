<?php

namespace TelegramBotSDK\Test\Types\Payments\Query;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Test\Types\Payments\ShippingAddressTest;
use TelegramBotSDK\Test\Types\UserTest;
use TelegramBotSDK\Types\Payments\Query\ShippingQuery;

class ShippingQueryTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
            'invoice_payload' => 'invoice_payload',
            'shipping_address' => ShippingAddressTest::getMinResponse(),
        ];
    }

    protected static function getType(): string
    {
        return ShippingQuery::class;
    }

    /**
     * @param ShippingQuery $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param ShippingQuery $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('invoice_payload', $item->getInvoicePayload());
        $this->assertEquals(ShippingAddressTest::createMinInstance(), $item->getShippingAddress());
    }
}
