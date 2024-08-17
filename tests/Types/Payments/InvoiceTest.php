<?php

namespace TelegramBotSDK\Test\Types\Payments;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Payments\Invoice;

class InvoiceTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'title' => 'title',
            'description' => 'description',
            'start_parameter' => 'start_parameter',
            'currency' => 'currency',
            'total_amount' => 1000,
        ];
    }

    protected static function getType(): string
    {
        return Invoice::class;
    }

    /**
     * @param Invoice $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param Invoice $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals('description', $item->getDescription());
        $this->assertEquals('start_parameter', $item->getStartParameter());
        $this->assertEquals('currency', $item->getCurrency());
        $this->assertEquals(1000, $item->getTotalAmount());
    }
}
