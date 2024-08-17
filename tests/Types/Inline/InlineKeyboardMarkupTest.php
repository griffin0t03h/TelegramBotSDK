<?php

namespace TelegramBotSDK\Test\Types\Inline;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;

class InlineKeyboardMarkupTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'inline_keyboard' => [
                [
                    ['url' => 'https://test.com', 'text' => 'Link'],
                    ['url' => 'https://test.com', 'text' => 'Link'],
                ],
            ],
        ];
    }

    protected static function getType(): string
    {
        return InlineKeyboardMarkup::class;
    }

    public function testConstructor()
    {
        $item = new InlineKeyboardMarkup([[['url' => 'https://test.com', 'text' => 'Link'], ['url' => 'https://test.com', 'text' => 'Link']]]);

        $this->assertEquals([[['url' => 'https://test.com', 'text' => 'Link'], ['url' => 'https://test.com', 'text' => 'Link']]], $item->getInlineKeyboard());
    }

    public function testSetInlineKeyboard()
    {
        $item = new InlineKeyboardMarkup([[['url' => 'https://test.com', 'text' => 'Link'], ['url' => 'https://test.com', 'text' => 'Link']]]);
        $item->setInlineKeyboard([[['url' => 'https://test.com', 'text' => 'Link']]]);

        $this->assertEquals([[['url' => 'https://test.com', 'text' => 'Link']]], $item->getInlineKeyboard());
    }

    /**
     * @param InlineKeyboardMarkup $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param InlineKeyboardMarkup $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals([[['url' => 'https://test.com', 'text' => 'Link'], ['url' => 'https://test.com', 'text' => 'Link']]], $item->getInlineKeyboard());
    }
}
