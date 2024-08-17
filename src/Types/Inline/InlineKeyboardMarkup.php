<?php

namespace TelegramBotSDK\Types\Inline;

use TelegramBotSDK\BaseType;

/**
 * Class InlineKeyboardMarkup
 * This object represents one button of an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards)
 * that appears right next to the message it belongs to.
 *
 * @package TelegramBotSDK\Types
 */
class InlineKeyboardMarkup extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['inline_keyboard'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'inline_keyboard' => true,
    ];

    /**
     * Array of button rows, each represented by an Array of InlineKeyboardButton objects
     * Array of Array of InlineKeyboardButton
     *
     * @var InlineKeyboardButton[]
     */
    protected array $inlineKeyboard;

    /**
     * @param array $inlineKeyboard
     */
    public function __construct(array $inlineKeyboard = [])
    {
        $this->inlineKeyboard = $inlineKeyboard;
    }

    /**
     * @return InlineKeyboardButton[]
     */
    public function getInlineKeyboard(): array
    {
        return $this->inlineKeyboard;
    }

    /**
     * @param InlineKeyboardButton[] $inlineKeyboard
     *
     * @return void
     */
    public function setInlineKeyboard(array $inlineKeyboard): void
    {
        $this->inlineKeyboard = $inlineKeyboard;
    }
}
