<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;

/**
 * Class ReplyKeyboardMarkup
 * This object represents a [custom keyboard](https://core.telegram.org/bots/features#keyboards) with reply options
 * (see [Introduction to bots](https://core.telegram.org/bots/features#keyboards) for details and examples).
 *
 * @package TelegramBotSDK\Types
 */
class ReplyKeyboardMarkup extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['keyboard'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'keyboard' => true,
        'is_persistent' => true,
        'one_time_keyboard' => true,
        'resize_keyboard' => true,
        'selective' => true,
        'input_field_placeholder' => true,
    ];

    /**
     * Array of button rows, each represented by an Array of KeyboardButton objects
     *
     * @var KeyboardButton[]
     */
    protected array $keyboard;

    /**
     * Optional. Requests clients to always show the keyboard when the regular keyboard is hidden.
     * Defaults to false, in which case the custom keyboard can be hidden and opened with a keyboard icon.
     *
     * @var bool|null
     */
    protected ?bool $isPersistent = null;

    /**
     * Optional. Requests clients to resize the keyboard vertically for optimal fit
     * (e.g., make the keyboard smaller if there are just two rows of buttons).
     * Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.
     *
     * @var bool|null
     */
    protected ?bool $resizeKeyboard = null;

    /**
     * Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available,
     * but clients will automatically display the usual letter-keyboard in the chat - the user can press a special
     * button in the input field to see the custom keyboard again. Defaults to false.
     *
     * @var bool|null
     */
    protected ?bool $oneTimeKeyboard = null;

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
     * Optional. The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
     *
     * @var string|null
     */
    protected ?string $inputFieldPlaceholder = null;

    /**
     * @param KeyboardButton[] $keyboard
     * @param bool|null $oneTimeKeyboard
     * @param bool|null $resizeKeyboard
     * @param bool|null $selective
     * @param bool|null $isPersistent
     * @param string|null $inputFieldPlaceholder
     */
    public function __construct(array $keyboard = [], bool $oneTimeKeyboard = null, bool $resizeKeyboard = null, bool $selective = null, bool $isPersistent = null, string $inputFieldPlaceholder = null)
    {
        $this->keyboard = $keyboard;
        $this->oneTimeKeyboard = $oneTimeKeyboard;
        $this->resizeKeyboard = $resizeKeyboard;
        $this->selective = $selective;
        $this->isPersistent = $isPersistent;
        $this->inputFieldPlaceholder = $inputFieldPlaceholder;
    }

    /**
     * @return KeyboardButton[]
     */
    public function getKeyboard(): array
    {
        return $this->keyboard;
    }

    /**
     * @param KeyboardButton[] $keyboard
     * @return void
     */
    public function setKeyboard(array $keyboard): void
    {
        $this->keyboard = $keyboard;
    }

    /**
     * @return bool|null
     */
    public function getIsPersistent(): ?bool
    {
        return $this->isPersistent;
    }

    /**
     * @param bool|null $isPersistent
     * @return void
     */
    public function setIsPersistent(?bool $isPersistent): void
    {
        $this->isPersistent = $isPersistent;
    }

    /**
     * @return bool|null
     */
    public function isResizeKeyboard(): ?bool
    {
        return $this->resizeKeyboard;
    }

    /**
     * @param bool|null $resizeKeyboard
     * @return void
     */
    public function setResizeKeyboard(?bool $resizeKeyboard): void
    {
        $this->resizeKeyboard = $resizeKeyboard;
    }

    /**
     * @return bool|null
     */
    public function isOneTimeKeyboard(): ?bool
    {
        return $this->oneTimeKeyboard;
    }

    /**
     * @param bool|null $oneTimeKeyboard
     * @return void
     */
    public function setOneTimeKeyboard(?bool $oneTimeKeyboard): void
    {
        $this->oneTimeKeyboard = $oneTimeKeyboard;
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
}
