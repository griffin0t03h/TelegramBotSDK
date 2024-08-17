<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ReplyKeyboardMarkup;

class ReplyKeyboardMarkupTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'keyboard' => [['one', 'two']],
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'keyboard' => [['one', 'two']],
            'one_time_keyboard' => true,
            'resize_keyboard' => true,
            'selective' => true,
            'is_persistent' => true,
            'input_field_placeholder' => 'input_field_placeholder',
        ];
    }

    protected static function getType(): string
    {
        return ReplyKeyboardMarkup::class;
    }

    public function testConstructor()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']]);

        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertNull($item->isOneTimeKeyboard());
        $this->assertNull($item->isResizeKeyboard());
        $this->assertNull($item->isSelective());
        $this->assertNull($item->getIsPersistent());
        $this->assertNull($item->getInputFieldPlaceholder());
    }

    public function testConstructor2()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']], true);

        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertTrue($item->isOneTimeKeyboard());
        $this->assertNull($item->isResizeKeyboard());
        $this->assertNull($item->isSelective());
        $this->assertNull($item->getIsPersistent());
        $this->assertNull($item->getInputFieldPlaceholder());
    }

    public function testConstructor3()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']], true, true);

        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertTrue($item->isOneTimeKeyboard());
        $this->assertTrue($item->isResizeKeyboard());
        $this->assertNull($item->isSelective());
        $this->assertNull($item->getIsPersistent());
        $this->assertNull($item->getInputFieldPlaceholder());
    }

    public function testConstructor4()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']], true, true, true);

        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertTrue($item->isOneTimeKeyboard());
        $this->assertTrue($item->isResizeKeyboard());
        $this->assertTrue($item->isSelective());
        $this->assertNull($item->getIsPersistent());
        $this->assertNull($item->getInputFieldPlaceholder());
    }

    public function testConstructor5()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']], true, true, true, true);

        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertTrue($item->isOneTimeKeyboard());
        $this->assertTrue($item->isResizeKeyboard());
        $this->assertTrue($item->isSelective());
        $this->assertTrue($item->getIsPersistent());
        $this->assertNull($item->getInputFieldPlaceholder());
    }

    public function testConstructor6()
    {
        $item = new ReplyKeyboardMarkup([['one', 'two']], true, true, true, true, 'input_field_placeholder');

        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertTrue($item->isOneTimeKeyboard());
        $this->assertTrue($item->isResizeKeyboard());
        $this->assertTrue($item->isSelective());
        $this->assertTrue($item->getIsPersistent());
        $this->assertEquals('input_field_placeholder', $item->getInputFieldPlaceholder());
    }

    /**
     * @param ReplyKeyboardMarkup $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertNull($item->isOneTimeKeyboard());
        $this->assertNull($item->isResizeKeyboard());
        $this->assertNull($item->isSelective());
        $this->assertNull($item->getIsPersistent());
        $this->assertNull($item->getInputFieldPlaceholder());
    }

    /**
     * @param ReplyKeyboardMarkup $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals([['one', 'two']], $item->getKeyboard());
        $this->assertTrue($item->isOneTimeKeyboard());
        $this->assertTrue($item->isResizeKeyboard());
        $this->assertTrue($item->isSelective());
        $this->assertTrue($item->getIsPersistent());
        $this->assertEquals('input_field_placeholder', $item->getInputFieldPlaceholder());
    }
}
