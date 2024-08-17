<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\MessageReactionUpdated;

class MessageReactionUpdatedTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'message_id' => 1,
            'user' => UserTest::getMinResponse(),
            'actor_chat' => ChatTest::getMinResponse(),
            'date' => 1682343644,
            'old_reaction' => [
                ReactionTypeEmojiTest::getMinResponse(),
            ],
            'new_reaction' => [
                ReactionTypeCustomEmojiTest::getMinResponse(),
            ],
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'chat' => ChatTest::getMinResponse(),
            'message_id' => 1,
            'date' => 1682343644,
            'old_reaction' => [
                ReactionTypeEmojiTest::getMinResponse(),
            ],
            'new_reaction' => [
                ReactionTypeCustomEmojiTest::getMinResponse(),
            ],
        ];
    }

    protected static function getType(): string
    {
        return MessageReactionUpdated::class;
    }

    protected function assertMinItem($item): void
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(1, $item->getMessageId());
        $this->assertEquals(1682343644, $item->getDate());
        $this->assertEquals([ReactionTypeEmojiTest::createMinInstance()], $item->getOldReaction());
        $this->assertEquals([ReactionTypeCustomEmojiTest::createMinInstance()], $item->getNewReaction());

        $this->assertNull($item->getUser());
        $this->assertNull($item->getActorChat());
    }

    protected function assertFullItem($item): void
    {
        $this->assertEquals(ChatTest::createMinInstance(), $item->getChat());
        $this->assertEquals(1, $item->getMessageId());
        $this->assertEquals(UserTest::createMinInstance(), $item->getUser());
        $this->assertEquals(ChatTest::createMinInstance(), $item->getActorChat());
        $this->assertEquals([ReactionTypeEmojiTest::createMinInstance()], $item->getOldReaction());
        $this->assertEquals([ReactionTypeCustomEmojiTest::createMinInstance()], $item->getNewReaction());
    }
}
