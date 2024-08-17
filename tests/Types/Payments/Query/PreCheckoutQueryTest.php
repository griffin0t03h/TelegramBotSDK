<?php

namespace TelegramBotSDK\Test\Types\Payments\Query;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Test\Types\Payments\OrderInfoTest;
use TelegramBotSDK\Test\Types\UserTest;
use TelegramBotSDK\Types\Payments\Query\PreCheckoutQuery;

class PreCheckoutQueryTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
            'currency' => 'currency',
            'total_amount' => 1000,
            'invoice_payload' => 'invoice_payload',
            'shipping_option_id' => 'shipping_option_id',
            'order_info' => OrderInfoTest::getFullResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
            'currency' => 'currency',
            'total_amount' => 1000,
            'invoice_payload' => 'invoice_payload',
        ];
    }

    protected static function getType(): string
    {
        return PreCheckoutQuery::class;
    }

    /**
     * @param PreCheckoutQuery $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('currency', $item->getCurrency());
        $this->assertEquals(1000, $item->getTotalAmount());
        $this->assertEquals('invoice_payload', $item->getInvoicePayload());
        $this->assertNull($item->getShippingOptionId());
        $this->assertNull($item->getOrderInfo());
    }

    /**
     * @param PreCheckoutQuery $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals('currency', $item->getCurrency());
        $this->assertEquals(1000, $item->getTotalAmount());
        $this->assertEquals('invoice_payload', $item->getInvoicePayload());
        $this->assertEquals('shipping_option_id', $item->getShippingOptionId());
        $this->assertEquals(OrderInfoTest::createFullInstance(), $item->getOrderInfo());
    }
}
