<?php

namespace TelegramBotSDK\Types\Inline;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class SwitchInlineQueryChosenChat
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an
 * optional default inline query.
 *
 * @package TelegramBotSDK\Types
 */
class SwitchInlineQueryChosenChat extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'query' => true,
        'allow_user_chats' => true,
        'allow_bot_chats' => true,
        'allow_group_chats' => true,
        'allow_channel_chats' => true,
    ];

    /**
     * Optional. The default inline query to be inserted in the input field. If left empty, only the bot's username
     * will be inserted.
     *
     * @var string|null
     */
    protected ?string $query = null;

    /**
     * Optional. True, if private chats with users can be chosen.
     *
     * @var bool|null
     */
    protected ?bool $allowUserChats = null;

    /**
     * Optional. True, if private chats with bots can be chosen.
     *
     * @var bool|null
     */
    protected ?bool $allowBotChats = null;

    /**
     * Optional. True, if group and supergroup chats can be chosen.
     *
     * @var bool|null
     */
    protected ?bool $allowGroupChats = null;

    /**
     * Optional. True, if channel chats can be chosen.
     *
     * @var bool|null
     */
    protected ?bool $allowChannelChats = null;

    /**
     * @return string|null
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @param string|null $query
     * @return void
     */
    public function setQuery(?string $query): void
    {
        $this->query = $query;
    }

    /**
     * @return bool|null
     */
    public function getAllowUserChats(): ?bool
    {
        return $this->allowUserChats;
    }

    /**
     * @param bool|null $allowUserChats
     * @return void
     */
    public function setAllowUserChats(?bool $allowUserChats): void
    {
        $this->allowUserChats = $allowUserChats;
    }

    /**
     * @return bool|null
     */
    public function getAllowBotChats(): ?bool
    {
        return $this->allowBotChats;
    }

    /**
     * @param bool|null $allowBotChats
     * @return void
     */
    public function setAllowBotChats(?bool $allowBotChats): void
    {
        $this->allowBotChats = $allowBotChats;
    }

    /**
     * @return bool|null
     */
    public function getAllowGroupChats(): ?bool
    {
        return $this->allowGroupChats;
    }

    /**
     * @param bool|null $allowGroupChats
     * @return void
     */
    public function setAllowGroupChats(?bool $allowGroupChats): void
    {
        $this->allowGroupChats = $allowGroupChats;
    }

    /**
     * @return bool|null
     */
    public function getAllowChannelChats(): ?bool
    {
        return $this->allowChannelChats;
    }

    /**
     * @param bool|null $allowChannelChats
     * @return void
     */
    public function setAllowChannelChats(?bool $allowChannelChats): void
    {
        $this->allowChannelChats = $allowChannelChats;
    }
}
