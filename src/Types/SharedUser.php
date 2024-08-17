<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class SharedUser
 * This object contains information about a user that was shared with the bot using a KeyboardButtonRequestUsers button.
 *
 * @package TelegramBotSDK\Types
 */
class SharedUser extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['user_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'user_id' => true,
        'first_name' => true,
        'last_name' => true,
        'username' => true,
        'photo' => ArrayOfPhotoSize::class,
    ];

    /**
     * Identifier of the shared user. This number may have more than 32 significant bits and some programming languages
     * may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so 64-bit
     * integers or double-precision float types are safe for storing these identifiers. The bot may not have access to
     * the user and could be unable to use this identifier, unless the user is already known to the bot by some other
     * means.
     *
     * @var int
     */
    protected int $userId;

    /**
     * Optional. First name of the user, if the name was requested by the bot
     *
     * @var string|null
     */
    protected ?string $firstName = null;

    /**
     * Optional. Last name of the user, if the name was requested by the bot
     *
     * @var string|null
     */
    protected ?string $lastName = null;

    /**
     * Optional. Username of the user, if the username was requested by the bot
     *
     * @var string|null
     */
    protected ?string $username = null;

    /**
     * Optional. Available sizes of the chat photo, if the photo was requested by the bot
     *
     * @var PhotoSize[]|null
     */
    protected ?array $photo = null;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return void
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return void
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return void
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return void
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[]|null $photo
     * @return void
     */
    public function setPhoto(?array $photo): void
    {
        $this->photo = $photo;
    }
}
