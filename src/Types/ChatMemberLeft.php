<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\ChatMemberStatus;

/**
 * Class ChatMemberLeft
 * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
 *
 * @package TelegramBotSDK\Types
 */
class ChatMemberLeft extends ChatMember
{
    /**
     * {@inheritdoc}
     *
     * @var ChatMemberStatus
     */
    protected ChatMemberStatus $status = ChatMemberStatus::Left;
}
