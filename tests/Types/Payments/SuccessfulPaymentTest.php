<?php

namespace TelegramBotSDK\Test\Types\Payments;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Payments\SuccessfulPayment;

class SuccessfulPaymentTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'currency' => 'currency',
            'total_amount' => 1000,
            'invoice_payload' => 'invoice_payload',
            'telegram_payment_charge_id' => 'telegram_payment_charge_id',
            'provider_payment_charge_id' => 'provider_payment_charge_id',
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'currency' => 'currency',
            'total_amount' => 1000,
            'invoice_payload' => 'invoice_payload',
            'telegram_payment_charge_id' => 'telegram_payment_charge_id',
            'provider_payment_charge_id' => 'provider_payment_charge_id',
            'shipping_option_id' => 'shipping_option_id',
            'order_info' => OrderInfoTest::getFullResponse(),
        ];
    }

    protected static function getType(): string
    {
        return SuccessfulPayment::class;
    }

    /**
     * @param SuccessfulPayment $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('currency', $item->getCurrency());
        $this->assertEquals(1000, $item->getTotalAmount());
        $this->assertEquals('invoice_payload', $item->getInvoicePayload());
        $this->assertEquals('telegram_payment_charge_id', $item->getTelegramPaymentChargeId());
        $this->assertEquals('provider_payment_charge_id', $item->getProviderPaymentChargeId());
        $this->assertNull($item->getShippingOptionId());
        $this->assertNull($item->getOrderInfo());
    }

    /**
     * @param SuccessfulPayment $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('currency', $item->getCurrency());
        $this->assertEquals(1000, $item->getTotalAmount());
        $this->assertEquals('invoice_payload', $item->getInvoicePayload());
        $this->assertEquals('telegram_payment_charge_id', $item->getTelegramPaymentChargeId());
        $this->assertEquals('provider_payment_charge_id', $item->getProviderPaymentChargeId());
        $this->assertEquals('shipping_option_id', $item->getShippingOptionId());
        $this->assertEquals(OrderInfoTest::createFullInstance(), $item->getOrderInfo());
    }
}
