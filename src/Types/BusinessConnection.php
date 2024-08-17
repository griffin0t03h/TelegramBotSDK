<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class BusinessConnection
 * Describes the connection of the bot with a business account.
 *
 * @package TelegramBotSDK\Types
 */
class BusinessConnection extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['id', 'user', 'user_chat_id', 'date', 'can_reply', 'is_enabled'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'user' => User::class,
        'user_chat_id' => true,
        'date' => true,
        'can_reply' => true,
        'is_enabled' => true,
    ];

    /**
     * Unique identifier of the business connection
     *
     * @var string
     */
    protected string $id;

    /**
     * Business account user that created the business connection
     *
     * @var User
     */
    protected User $user;

    /**
     * Identifier of a private chat with the user who created the business connection. This number may have more than
     * 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this
     * identifier.
     *
     * @var int
     */
    protected int $userChatId;

    /**
     * Date the connection was established in Unix time
     *
     * @var int
     */
    protected int $date;

    /**
     * True, if the bot can act on behalf of the business account in chats that were active in the last 24 hours
     *
     * @var bool
     */
    protected bool $canReply;

    /**
     * True, if the connection is active
     *
     * @var bool
     */
    protected bool $isEnabled;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
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
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return bool
     */
    public function getCanReply(): bool
    {
        return $this->canReply;
    }

    /**
     * @param bool $canReply
     */
    public function setCanReply(bool $canReply): void
    {
        $this->canReply = $canReply;
    }

    /**
     * @return bool
     */
    public function getIsEnabled(): bool
    {
        return $this->isEnabled;
    }

    /**
     * @param bool $isEnabled
     */
    public function setIsEnabled(bool $isEnabled): void
    {
        $this->isEnabled = $isEnabled;
    }
}
