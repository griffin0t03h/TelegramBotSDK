<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ReplyKeyboardRemove;

class ReplyKeyboardRemoveTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'remove_keyboard' => true,
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'remove_keyboard' => true,
            'selective' => true,
        ];
    }

    protected static function getType(): string
    {
        return ReplyKeyboardRemove::class;
    }

    public function testDefaultConstructor()
    {
        $keyboard = new ReplyKeyboardRemove();

        $this->assertTrue($keyboard->getRemoveKeyboard());
        $this->assertFalse($keyboard->getSelective());
    }

    public function testConstructor()
    {
        $keyboard = new ReplyKeyboardRemove(false, true);

        $this->assertFalse($keyboard->getRemoveKeyboard());
        $this->assertTrue($keyboard->getSelective());
    }

    /**
     * @param ReplyKeyboardRemove $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertTrue($item->getRemoveKeyboard());
        $this->assertFalse($item->getSelective());
    }

    /**
     * @param ReplyKeyboardRemove $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertTrue($item->getRemoveKeyboard());
        $this->assertTrue($item->getSelective());
    }
}
