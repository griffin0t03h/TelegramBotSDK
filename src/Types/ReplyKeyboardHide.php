<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;

/**
 * @deprecated Use ReplyKeyboardRemove
 *
 * Class ReplyKeyboardHide
 * Upon receiving a message with this object, Telegram clients will hide the current custom keyboard
 * and display the default letter-keyboard. By default, custom keyboards are displayed
 * until a new keyboard is sent by a bot. An exception is made for one-time keyboards
 * that are hidden immediately after the user presses a button (see \TelegramBotSDK\Types\ReplyKeyboardMarkup).
 *
 * @package TelegramBotSDK\Types
 */
class ReplyKeyboardHide extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['hide_keyboard'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'hide_keyboard' => true,
        'selective' => true,
    ];

    /**
     * Requests clients to hide the custom keyboard
     *
     * @var bool
     */
    protected bool $hideKeyboard;

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
     * @param bool $hideKeyboard
     * @param bool|null $selective
     */
    public function __construct(bool $hideKeyboard = true, bool $selective = null)
    {
        $this->hideKeyboard = $hideKeyboard;
        $this->selective = $selective;
    }

    /**
     * @return bool
     */
    public function isHideKeyboard(): bool
    {
        return $this->hideKeyboard;
    }

    /**
     * @param bool $hideKeyboard
     * @return void
     */
    public function setHideKeyboard(bool $hideKeyboard): void
    {
        $this->hideKeyboard = $hideKeyboard;
    }

    /**
     * @return bool|null
     */
    public function isSelective(): ?bool
    {
        return $this->selective;
    }

    /**
     * @param bool $selective
     * @return void
     */
    public function setSelective(bool $selective): void
    {
        $this->selective = $selective;
    }
}
