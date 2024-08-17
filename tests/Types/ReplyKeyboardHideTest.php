<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ReplyKeyboardHide;

class ReplyKeyboardHideTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'hide_keyboard' => true,
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'hide_keyboard' => true,
            'selective' => true,
        ];
    }

    protected static function getType(): string
    {
        return ReplyKeyboardHide::class;
    }

    public function testConstructor()
    {
        $item = new ReplyKeyboardHide();

        $this->assertTrue($item->isHideKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }

    public function testConstructor2()
    {
        $item = new ReplyKeyboardHide(true, true);

        $this->assertTrue($item->isHideKeyboard());
        $this->assertTrue($item->isSelective());
    }

    public function testConstructor3()
    {
        $item = new ReplyKeyboardHide(false, true);

        $this->assertFalse($item->isHideKeyboard());
        $this->assertTrue($item->isSelective());
    }

    public function testConstructor4()
    {
        $item = new ReplyKeyboardHide(true);

        $this->assertTrue($item->isHideKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }

    /**
     * @param ReplyKeyboardHide $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertTrue($item->isHideKeyboard());
        $this->assertEquals(null, $item->isSelective());
    }

    /**
     * @param ReplyKeyboardHide $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertTrue($item->isHideKeyboard());
        $this->assertTrue($item->isSelective());
    }
}
