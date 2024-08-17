<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\LoginUrl;

class LoginUrlTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'url' => 'https://telegram.org',
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'url' => 'https://telegram.org',
            'forward_text' => 'Log in!',
            'bot_username' => 'TestBot',
            'request_write_access' => true,
        ];
    }

    protected static function getType(): string
    {
        return LoginUrl::class;
    }

    /**
     * @param LoginUrl $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('https://telegram.org', $item->getUrl());
        $this->assertNull($item->getForwardText());
        $this->assertNull($item->getBotUsername());
        $this->assertNull($item->isRequestWriteAccess());
    }

    /**
     * @param LoginUrl $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('https://telegram.org', $item->getUrl());
        $this->assertEquals('Log in!', $item->getForwardText());
        $this->assertEquals('TestBot', $item->getBotUsername());
        $this->assertTrue($item->isRequestWriteAccess());
    }
}
