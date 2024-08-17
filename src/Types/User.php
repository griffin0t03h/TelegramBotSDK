<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class User
 * This object represents a Telegram user or bot.
 *
 * @package TelegramBotSDK\Types
 */
class User extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['id', 'is_bot', 'first_name'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'is_bot' => true,
        'first_name' => true,
        'last_name' => true,
        'username' => true,
        'language_code' => true,
        'is_premium' => true,
        'added_to_attachment_menu' => true,
        'can_join_groups' => true,
        'can_read_all_group_messages' => true,
        'supports_inline_queries' => true,
        'can_connect_to_business' => true,
    ];

    /**
     * Unique identifier for this user or bot. This number may have more than 32 significant bits
     * and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe
     * for storing this identifier.
     *
     * @var int|float
     */
    protected int|float $id;

    /**
     * True, if this user is a bot
     *
     * @var bool
     */
    protected bool $isBot;

    /**
     * User‘s or bot’s first name
     *
     * @var string
     */
    protected string $firstName;

    /**
     * Optional. User‘s or bot’s last name
     *
     * @var string|null
     */
    protected ?string $lastName = null;

    /**
     * Optional. User‘s or bot’s username
     *
     * @var string|null
     */
    protected ?string $username = null;

    /**
     * Optional. [IETF language tag](https://en.wikipedia.org/wiki/IETF_language_tag) of the user's
     * language
     *
     * @var string|null
     */
    protected ?string $languageCode = null;

    /**
     * Optional. True, if this user is a Telegram Premium user
     *
     * @var bool|null
     */
    protected ?bool $isPremium = null;

    /**
     * Optional. True, if this user added the bot to the attachment menu
     *
     * @var bool|null
     */
    protected ?bool $addedToAttachmentMenu = null;

    /**
     * Optional. True, if the bot can be invited to groups. Returned only in getMe.
     *
     * @see \TelegramBotSDK\Api\BotApi::getMe()
     *
     * @var bool|null
     */
    protected ?bool $canJoinGroups = null;

    /**
     * Optional. True, if [privacy mode](https://core.telegram.org/bots/features#privacy-mode) is
     * disabled for the bot. Returned only in getMe.
     *
     * @see \TelegramBotSDK\Api\BotApi::getMe()
     *
     * @var bool|null
     */
    protected ?bool $canReadAllGroupMessages = null;

    /**
     * Optional. True, if the bot supports inline queries. Returned only in getMe.
     *
     * @see \TelegramBotSDK\Api\BotApi::getMe()
     *
     * @var bool|null
     */
    protected ?bool $supportsInlineQueries = null;

    /**
     * Optional. True, if the bot can be connected to a Telegram Business account to receive its
     * messages. Returned only in getMe.
     *
     * @see \TelegramBotSDK\Api\BotApi::getMe()
     *
     * @var bool|null
     */
    protected ?bool $canConnectToBusiness = null;

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
     * @return bool
     *
     * @see $isBot
     */
    public function isBot(): bool
    {
        return $this->isBot;
    }

    /**
     * @param bool $isBot
     * @return void
     *
     * @see $isBot
     */
    public function setIsBot(bool $isBot): void
    {
        $this->isBot = $isBot;
    }

    /**
     * @return string
     *
     * @see $firstName
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return void
     *
     * @see $firstName
     */
    public function setFirstName(string $firstName): void
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
     * @return void
     *
     * @see $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
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
     * @return void
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
     * @see $languageCode
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * @param string|null $languageCode
     * @return void
     *
     * @see $languageCode
     */
    public function setLanguageCode(?string $languageCode): void
    {
        $this->languageCode = $languageCode;
    }

    /**
     * @return bool|null
     *
     * @see $isPremium
     */
    public function getIsPremium(): ?bool
    {
        return $this->isPremium;
    }

    /**
     * @param bool|null $isPremium
     * @return void
     *
     * @see $isPremium
     */
    public function setIsPremium(?bool $isPremium): void
    {
        $this->isPremium = $isPremium;
    }

    /**
     * @return bool|null
     *
     * @see $addedToAttachmentMenu
     */
    public function getAddedToAttachmentMenu(): ?bool
    {
        return $this->addedToAttachmentMenu;
    }

    /**
     * @param bool|null $addedToAttachmentMenu
     * @return void
     *
     * @see $addedToAttachmentMenu
     */
    public function setAddedToAttachmentMenu(?bool $addedToAttachmentMenu): void
    {
        $this->addedToAttachmentMenu = $addedToAttachmentMenu;
    }

    /**
     * @return bool|null
     *
     * @see $canJoinGroups
     */
    public function getCanJoinGroups(): ?bool
    {
        return $this->canJoinGroups;
    }

    /**
     * @param bool|null $canJoinGroups
     * @return void
     *
     * @see $canJoinGroups
     */
    public function setCanJoinGroups(?bool $canJoinGroups): void
    {
        $this->canJoinGroups = $canJoinGroups;
    }

    /**
     * @return bool|null
     *
     * @see $canReadAllGroupMessages
     */
    public function getCanReadAllGroupMessages(): ?bool
    {
        return $this->canReadAllGroupMessages;
    }

    /**
     * @param bool|null $canReadAllGroupMessages
     * @return void
     *
     * @see $canReadAllGroupMessages
     */
    public function setCanReadAllGroupMessages(?bool $canReadAllGroupMessages): void
    {
        $this->canReadAllGroupMessages = $canReadAllGroupMessages;
    }

    /**
     * @return bool|null
     *
     * @see $supportsInlineQueries
     */
    public function getSupportsInlineQueries(): ?bool
    {
        return $this->supportsInlineQueries;
    }

    /**
     * @param bool|null $supportsInlineQueries
     * @return void
     *
     * @see $supportsInlineQueries
     */
    public function setSupportsInlineQueries(?bool $supportsInlineQueries): void
    {
        $this->supportsInlineQueries = $supportsInlineQueries;
    }

    /**
     * @return bool|null
     *
     * @see $canConnectToBusiness
     */
    public function getCanConnectToBusiness(): ?bool
    {
        return $this->canConnectToBusiness;
    }

    /**
     * @param bool|null $canConnectToBusiness
     * @return void
     *
     * @see $canConnectToBusiness
     */
    public function setCanConnectToBusiness(?bool $canConnectToBusiness): void
    {
        $this->canConnectToBusiness = $canConnectToBusiness;
    }
}
