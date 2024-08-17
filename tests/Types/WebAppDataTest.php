<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\WebAppData;

class WebAppDataTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return self::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'data' => 'data',
            'button_text' => 'button_text',
        ];
    }

    protected static function getType(): string
    {
        return WebAppData::class;
    }

    /**
     * @param WebAppData $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param WebAppData $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('data', $item->getData());
        $this->assertEquals('button_text', $item->getButtonText());
    }
}
