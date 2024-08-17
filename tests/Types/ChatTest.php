<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Enum\ChatType;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Chat;

class ChatTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'id' => 123456,
            'type' => ChatType::Private->value,
            'title' => 'title',
            'username' => 'griffin0t03h',
            'first_name' => 'Griffin T-3H',
            'last_name' => 'Team',
            'photo' => ChatPhotoTest::getMinResponse(),
            'bio' => 'PHP Telegram Bot API',
            'description' => 'description',
            'invite_link' => 'invite_link',
            'pinned_message' => MessageTest::getMinResponse(),
            'permissions' => ChatPermissionsTest::getFullResponse(),
            'slow_mode_delay' => 10,
            'sticker_set_name' => 'sticker_set_name',
            'can_set_sticker_set' => true,
            'linked_chat_id' => 2,
            'location' => ChatLocationTest::getMinResponse(),
            'join_to_send_messages' => true,
            'join_by_request' => true,
            'message_auto_delete_time' => 10000,
            'has_protected_content' => true,
            'is_forum' => true,
            'active_usernames' => [
                'username',
            ],
            'emoji_status_custom_emoji_id' => 'emoji_status_custom_emoji_id',
            'has_private_forwards' => true,
            'has_restricted_voice_and_video_messages' => true,
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'id' => 123456,
            'type' => ChatType::Private->value,
        ];
    }

    public function testSet64bitId()
    {
        $chat = new Chat();
        $chat->setId(2147483648);
        $this->assertEquals(2147483648, $chat->getId());
    }

    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        Chat::fromResponse([
            'id' => 1,
        ]);
    }

    public function testFromResponseException3()
    {
        $this->expectException(InvalidArgumentException::class);

        Chat::fromResponse([
            'type' => ChatType::Private->value,
        ]);
    }

    /**
     * @param Chat $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(123456, $item->getId());
        $this->assertEquals(ChatType::Private->value, $item->getType()->value);

        $this->assertNull($item->getTitle());
        $this->assertNull($item->getFirstName());
        $this->assertNull($item->getLastName());
        $this->assertNull($item->getUsername());
        $this->assertNull($item->getIsForum());
    }

    protected static function getType(): string
    {
        return Chat::class;
    }

    /**
     * @param Chat $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(123456, $item->getId());
        $this->assertEquals(ChatType::Private->value, $item->getType()->value);
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals('Griffin T-3H', $item->getFirstName());
        $this->assertEquals('Team', $item->getLastName());
        $this->assertEquals('griffin0t03h', $item->getUsername());
    }
}
