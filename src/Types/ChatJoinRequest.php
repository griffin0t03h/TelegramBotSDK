<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatJoinRequest
 * Represents a join request sent to a chat.
 *
 * @package TelegramBotSDK\Types
 */
class ChatJoinRequest extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['chat', 'from', 'user_chat_id', 'date'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'chat' => Chat::class,
        'from' => User::class,
        'user_chat_id' => true,
        'date' => true,
        'bio' => true,
        'invite_link' => ChatInviteLink::class,
    ];

    /**
     * Chat to which the request was sent
     *
     * @var Chat
     */
    protected Chat $chat;

    /**
     * User that sent the join request
     *
     * @var User
     */
    protected User $from;

    /**
     * Identifier of a private chat with the user who sent the join request. This number may have more than 32
     * significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this
     * identifier. The bot can use this identifier for 24 hours to send messages until the join request is processed,
     * assuming no other administrator contacted the user.
     *
     * @var int
     */
    protected int $userChatId;

    /**
     * Date the request was sent in Unix time
     *
     * @var int
     */
    protected int $date;

    /**
     * Optional. Bio of the user.
     *
     * @var string|null
     */
    protected ?string $bio = null;

    /**
     * Optional. Chat invite link that was used by the user to send the join request
     *
     * @var ChatInviteLink|null
     */
    protected ?ChatInviteLink $inviteLink = null;

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     * @return void
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     * @return void
     */
    public function setFrom(User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return int
     */
    public function getUserChatId(): int
    {
        return $this->userChatId;
    }

    /**
     * @param int $userChatId
     * @return void
     */
    public function setUserChatId(int $userChatId): void
    {
        $this->userChatId = $userChatId;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return void
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * @param string|null $bio
     * @return void
     */
    public function setBio(?string $bio): void
    {
        $this->bio = $bio;
    }

    /**
     * @return ChatInviteLink|null
     */
    public function getInviteLink(): ?ChatInviteLink
    {
        return $this->inviteLink;
    }

    /**
     * @param ChatInviteLink|null $inviteLink
     * @return void
     */
    public function setInviteLink(?ChatInviteLink $inviteLink): void
    {
        $this->inviteLink = $inviteLink;
    }
}
