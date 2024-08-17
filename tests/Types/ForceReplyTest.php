<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ForceReply;

class ForceReplyTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'force_reply' => true,
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'force_reply' => true,
            'input_field_placeholder' => 'input_field_placeholder',
            'selective' => true,
        ];
    }

    protected static function getType(): string
    {
        return ForceReply::class;
    }

    public function testConstructor()
    {
        $item = new ForceReply();

        $this->assertTrue($item->isForceReply());
        $this->assertEquals(null, $item->isSelective());
        $this->assertEquals(null, $item->getInputFieldPlaceholder());
    }

    public function testConstructor2()
    {
        $item = new ForceReply(true, true);

        $this->assertTrue($item->isForceReply());
        $this->assertTrue($item->isSelective());
        $this->assertEquals(null, $item->getInputFieldPlaceholder());
    }

    public function testConstructor3()
    {
        $item = new ForceReply(false, true);

        $this->assertFalse($item->isForceReply());
        $this->assertTrue($item->isSelective());
        $this->assertEquals(null, $item->getInputFieldPlaceholder());
    }

    public function testConstructor4()
    {
        $item = new ForceReply(true);

        $this->assertTrue($item->isForceReply());
        $this->assertEquals(null, $item->isSelective());
        $this->assertEquals(null, $item->getInputFieldPlaceholder());
    }

    public function testSetforceReply()
    {
        $item = new ForceReply(true);

        $item->setForceReply(false);

        $this->assertFalse($item->isforceReply());
    }

    public function testSetSelective()
    {
        $item = new ForceReply();

        $item->setSelective(true);

        $this->assertTrue($item->isSelective());
    }

    public function testToJson()
    {
        $item = new ForceReply();

        $this->assertEquals(json_encode(['force_reply' => true]), $item->toJson());
    }

    public function testToJson2()
    {
        $item = new ForceReply();

        $this->assertEquals(['force_reply' => true], $item->toJson(true));
    }

    public function testToJson3()
    {
        $item = new ForceReply(true, true);

        $this->assertEquals(json_encode(['force_reply' => true, 'selective' => true]), $item->toJson());
    }

    public function testToJson4()
    {
        $item = new ForceReply(true, true);

        $this->assertEquals(['force_reply' => true, 'selective' => true], $item->toJson(true));
    }

    /**
     * @param ForceReply $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertTrue($item->isForceReply());
        $this->assertEquals(null, $item->isSelective());
        $this->assertEquals(null, $item->getInputFieldPlaceholder());
    }

    /**
     * @param ForceReply $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertTrue($item->isForceReply());
        $this->assertTrue($item->isSelective());
        $this->assertEquals('input_field_placeholder', $item->getInputFieldPlaceholder());
    }
}
