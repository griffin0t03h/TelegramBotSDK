<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;

/**
 * Class ForceReply
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if
 * the user has selected the bot's message and tapped 'Reply'). This can be extremely useful if you want to create
 * user-friendly step-by-step interfaces without having to sacrifice [privacy
 * mode](https://core.telegram.org/bots/features#privacy-mode). Not supported in channels and for messages sent on
 * behalf of a Telegram Business account.
 *
 * @package TelegramBotSDK\Types
 */
class ForceReply extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['force_reply'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'force_reply' => true,
        'input_field_placeholder' => true,
        'selective' => true,
    ];

    /**
     * Shows reply interface to the user, as if they manually selected the bot‘s message and tapped ’Reply'
     *
     * @var bool
     */
    protected bool $forceReply;

    /**
     * The placeholder to be shown in the input field when the reply is active; 1-64 characters
     *
     * @var string|null
     */
    protected ?string $inputFieldPlaceholder = null;

    /**
     * Optional. Use this parameter if you want to show the keyboard to specific users only.
     * Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     *
     * @var bool|null
     */
    protected ?bool $selective = null;

    /**
     * @param bool $forceReply
     * @param bool|null $selective
     * @param string|null $inputFieldPlaceholder
     */
    public function __construct(bool $forceReply = true, bool $selective = null, string $inputFieldPlaceholder = null)
    {
        $this->forceReply = $forceReply;
        $this->selective = $selective;
        $this->inputFieldPlaceholder = $inputFieldPlaceholder;
    }

    /**
     * @return bool
     */
    public function isForceReply(): bool
    {
        return $this->forceReply;
    }

    /**
     * @param bool $forceReply
     * @return void
     */
    public function setForceReply(bool $forceReply): void
    {
        $this->forceReply = $forceReply;
    }

    /**
     * @return bool|null
     */
    public function isSelective(): ?bool
    {
        return $this->selective;
    }

    /**
     * @param bool|null $selective
     * @return void
     */
    public function setSelective(?bool $selective): void
    {
        $this->selective = $selective;
    }

    /**
     * @return string|null
     */
    public function getInputFieldPlaceholder(): ?string
    {
        return $this->inputFieldPlaceholder;
    }

    /**
     * @param string|null $inputFieldPlaceholder
     * @return void
     */
    public function setInputFieldPlaceholder(?string $inputFieldPlaceholder): void
    {
        $this->inputFieldPlaceholder = $inputFieldPlaceholder;
    }
}
