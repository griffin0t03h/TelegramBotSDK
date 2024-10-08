<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\CallbackQuery;

class CallbackQueryTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
            'message' => MessageTest::getMinResponse(),
            'inline_message_id' => 'inline_message_id',
            'chat_instance' => 'chat_instance',
            'data' => 'data',
            'game_short_name' => 'game_short_name',
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'id' => 1,
            'from' => UserTest::getMinResponse(),
        ];
    }

    protected static function getType(): string
    {
        return CallbackQuery::class;
    }

    /**
     * @param CallbackQuery $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertNull($item->getMessage());
        $this->assertNull($item->getInlineMessageId());
        $this->assertNull($item->getChatInstance());
        $this->assertNull($item->getData());
        $this->assertNull($item->getGameShortName());
    }

    /**
     * @param CallbackQuery $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(1, $item->getId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getFrom());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getMessage());
        $this->assertEquals('inline_message_id', $item->getInlineMessageId());
        $this->assertEquals('chat_instance', $item->getChatInstance());
        $this->assertEquals('data', $item->getData());
        $this->assertEquals('game_short_name', $item->getGameShortName());
    }
}
