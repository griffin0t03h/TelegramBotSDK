<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatShared
 * This object contains information about a chat that was shared with the bot using a KeyboardButtonRequestChat button.
 *
 * @package TelegramBotSDK\Types
 */
class ChatShared extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['request_id', 'chat_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'request_id' => true,
        'chat_id' => true,
        'title' => true,
        'username' => true,
        'photo' => ArrayOfPhotoSize::class,
    ];

    /**
     * Identifier of the request
     *
     * @var int
     */
    protected int $requestId;

    /**
     * Identifier of the shared chat. This number may have more than 32 significant bits and some programming languages
     * may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit
     * integer or double-precision float type are safe for storing this identifier. The bot may not have access to the
     * chat and could be unable to use this identifier, unless the chat is already known to the bot by some other
     * means.
     *
     * @var int
     */
    protected int $chatId;

    /**
     * Optional. Title of the chat, if the title was requested by the bot.
     *
     * @var string|null
     */
    protected ?string $title = null;

    /**
     * Optional. Username of the chat, if the username was requested by the bot and available.
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
    public function getRequestId(): int
    {
        return $this->requestId;
    }

    /**
     * @param int $requestId
     * @return void
     */
    public function setRequestId(int $requestId): void
    {
        $this->requestId = $requestId;
    }

    /**
     * @return int
     */
    public function getChatId(): int
    {
        return $this->chatId;
    }

    /**
     * @param int $chatId
     * @return void
     */
    public function setChatId(int $chatId): void
    {
        $this->chatId = $chatId;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return void
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
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
