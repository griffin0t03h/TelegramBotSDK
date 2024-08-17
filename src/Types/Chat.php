<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\ChatType;
use TelegramBotSDK\TypeInterface;

/**
 * Class Chat
 * This object represents a chat.
 *
 * @package TelegramBotSDK\Types
 */
class Chat extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['id', 'type'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'type' => true,
        'title' => true,
        'username' => true,
        'first_name' => true,
        'last_name' => true,
        'is_forum' => true,
    ];

    /**
     * Unique identifier for this chat. This number may have more than 32 significant bits and some
     * programming languages may have difficulty/silent defects in interpreting it. But it has at
     * most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe
     * for storing this identifier.
     *
     * @var int|float
     */
    protected int|float $id;

    /**
     * Type of the chat, can be either “private”, “group”, “supergroup” or “channel”.
     *
     * @var ChatType
     */
    protected ChatType $type;

    /**
     * Optional. Title, for supergroups, channels and group chats.
     *
     * @var string|null
     */
    protected ?string $title = null;

    /**
     * Optional. Username, for private chats, supergroups and channels if available.
     *
     * @var string|null
     */
    protected ?string $username = null;

    /**
     * Optional. First name of the other party in a private chat.
     *
     * @var string|null
     */
    protected ?string $firstName = null;

    /**
     * Optional. Last name of the other party in a private chat.
     *
     * @var string|null
     */
    protected ?string $lastName = null;

    /**
     * Optional. True, if the supergroup chat is a forum (has
     * [topics](https://telegram.org/blog/topics-in-groups-collectible-usernames#topics-in-groups)
     * enabled).
     *
     * @var bool|null
     */
    protected ?bool $isForum = null;

    /**
     * @return int|float
     *
     * @see $id
     */
    public function getId(): int|float
    {
        return $this->id;
    }

    /**
     * @param int|float $id
     * @return void
     *
     * @see $id
     */
    public function setId(int|float $id): void
    {
        $this->id = $id;
    }

    /**
     * @return ChatType
     *
     * @see $type
     */
    public function getType(): ChatType
    {
        return $this->type;
    }

    /**
     * @param ChatType|string $type
     *
     * @see $type
     */
    public function setType(ChatType|string $type): void
    {
        if ($type instanceof ChatType) {
            $this->type = $type;
        } else {
            $this->type = ChatType::tryFrom($type) ?? ChatType::Unknown;
        }
    }

    /**
     * @return string|null
     *
     * @see $title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @see $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     *
     * @see $username
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     *
     * @see $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     *
     * @see $firstName
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     *
     * @see $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     *
     * @see $lastName
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @see $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return bool|null
     *
     * @see $isForum
     */
    public function getIsForum(): ?bool
    {
        return $this->isForum;
    }

    /**
     * @param bool|null $isForum
     *
     * @see $isForum
     */
    public function setIsForum(?bool $isForum): void
    {
        $this->isForum = $isForum;
    }
}
