<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\MessageReactionCountUpdated;

class MessageReactionCountUpdatedTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'message_id' => 1,
            'date' => 1682343644,
            'reactions' => [
                ReactionTypeEmojiTest::getMinResponse(),
            ],
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'chat' => ChatTest::getFullResponse(),
            'message_id' => 1,
            'date' => 1682343644,
            'reactions' => [
                ReactionTypeEmojiTest::getFullResponse(),
            ],
        ];
    }

    protected static function getType(): string
    {
        return MessageReactionCountUpdated::class;
    }

    protected function assertMinItem($item): void
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(1, $item->getMessageId());
        $this->assertEquals(1682343644, $item->getDate());
        $this->assertEquals([ReactionTypeEmojiTest::createMinInstance()], $item->getReactions());
    }

    protected function assertFullItem($item): void
    {
        $this->assertEquals(ChatTest::createFullInstance(), $item->getChat());
        $this->assertEquals(1, $item->getMessageId());
        $this->assertEquals(1682343644, $item->getDate());
        $this->assertEquals([ReactionTypeEmojiTest::createFullInstance()], $item->getReactions());
    }
}
