<?php

namespace TelegramBotSDK\Types\Inline;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\Game\CallbackGame;
use TelegramBotSDK\Types\LoginUrl;
use TelegramBotSDK\Types\WebAppInfo;

/**
 * Class InlineKeyboardButton
 * This object represents one button of an inline keyboard. Exactly one of the optional fields must be used to specify
 * type of the button.
 *
 * @package TelegramBotSDK\Types
 */
class InlineKeyboardButton extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['text'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'text' => true,
        'url' => true,
        'callback_data' => true,
        'web_app' => WebAppInfo::class,
        'login_url' => LoginUrl::class,
        'switch_inline_query' => true,
        'switch_inline_query_current_chat' => true,
        'switch_inline_query_chosen_chat' => SwitchInlineQueryChosenChat::class,
        'callback_game' => CallbackGame::class,
        'pay' => true,
    ];

    /**
     * Label text on the button
     *
     * @var string
     */
    protected string $text;

    /**
     * Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be used to
     * mention a user by their identifier without using a username, if this is allowed by their privacy settings.
     *
     * @var string|null
     */
    protected ?string $url = null;

    /**
     * Optional. Data to be sent in a callback query to the bot when the button is pressed, 1-64 bytes
     *
     * @var string|null
     */
    protected ?string $callbackData = null;

    /**
     * Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be
     * able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only in
     * private chats between a user and the bot. Not supported for messages sent on behalf of a Telegram Business
     * account.
     *
     * @var WebAppInfo|null
     */
    protected ?WebAppInfo $webApp = null;

    /**
     * Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the Telegram
     * Login Widget.
     *
     * @var LoginUrl|null
     */
    protected ?LoginUrl $loginUrl = null;

    /**
     * Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and
     * insert the bot's username and the specified inline query in the input field. May be empty, in which case just
     * the bot's username will be inserted. Not supported for messages sent on behalf of a Telegram Business account.
     *
     * @var string|null
     */
    protected ?string $switchInlineQuery = null;

    /**
     * Optional. If set, pressing the button will insert the bot's username and the specified inline query in the
     * current chat's input field. May be empty, in which case only the bot's username will be inserted.
     *
     * @var string|null
     */
    protected ?string $switchInlineQueryCurrentChat = null;

    /**
     * Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type,
     * open that chat and insert the bot's username and the specified inline query in the input field. Not supported
     * for messages sent on behalf of a Telegram Business account.
     *
     * @var SwitchInlineQueryChosenChat|null
     */
    protected ?SwitchInlineQueryChosenChat $switchInlineQueryChosenChat = null;

    /**
     * Optional. Description of the game that will be launched when the user presses the button.
     * NOTE: This type of button must always be the first button in the first row.
     *
     * @var CallbackGame|null
     */
    protected ?CallbackGame $callbackGame = null;

    /**
     * Optional. Specify True, to send a Pay button. Substrings “⭐” and “XTR” in the buttons's text will be replaced
     * with a Telegram Star icon.
     * NOTE: This type of button must always be the first button in the first row and can only be used in invoice
     * messages.
     *
     * @var bool|null
     */
    protected ?bool $pay = null;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return void
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return void
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string|null
     */
    public function getCallbackData(): ?string
    {
        return $this->callbackData;
    }

    /**
     * @param string|null $callbackData
     * @return void
     */
    public function setCallbackData(?string $callbackData): void
    {
        $this->callbackData = $callbackData;
    }

    /**
     * @return WebAppInfo|null
     */
    public function getWebApp(): ?WebAppInfo
    {
        return $this->webApp;
    }

    /**
     * @param WebAppInfo|null $webApp
     * @return void
     */
    public function setWebApp(?WebAppInfo $webApp): void
    {
        $this->webApp = $webApp;
    }

    /**
     * @return LoginUrl|null
     */
    public function getLoginUrl(): ?LoginUrl
    {
        return $this->loginUrl;
    }

    /**
     * @param LoginUrl|null $loginUrl
     * @return void
     */
    public function setLoginUrl(?LoginUrl $loginUrl): void
    {
        $this->loginUrl = $loginUrl;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQuery(): ?string
    {
        return $this->switchInlineQuery;
    }

    /**
     * @param string|null $switchInlineQuery
     * @return void
     */
    public function setSwitchInlineQuery(?string $switchInlineQuery): void
    {
        $this->switchInlineQuery = $switchInlineQuery;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQueryCurrentChat(): ?string
    {
        return $this->switchInlineQueryCurrentChat;
    }

    /**
     * @param string|null $switchInlineQueryCurrentChat
     * @return void
     */
    public function setSwitchInlineQueryCurrentChat(?string $switchInlineQueryCurrentChat): void
    {
        $this->switchInlineQueryCurrentChat = $switchInlineQueryCurrentChat;
    }

    /**
     * @return SwitchInlineQueryChosenChat|null
     */
    public function getSwitchInlineQueryChosenChat(): ?SwitchInlineQueryChosenChat
    {
        return $this->switchInlineQueryChosenChat;
    }

    /**
     * @param SwitchInlineQueryChosenChat|null $switchInlineQueryChosenChat
     * @return void
     */
    public function setSwitchInlineQueryChosenChat(?SwitchInlineQueryChosenChat $switchInlineQueryChosenChat): void
    {
        $this->switchInlineQueryChosenChat = $switchInlineQueryChosenChat;
    }

    /**
     * @return CallbackGame|null
     */
    public function getCallbackGame(): ?CallbackGame
    {
        return $this->callbackGame;
    }

    /**
     * @param CallbackGame|null $callbackGame
     * @return void
     */
    public function setCallbackGame(?CallbackGame $callbackGame): void
    {
        $this->callbackGame = $callbackGame;
    }

    /**
     * @return bool|null
     */
    public function isPay(): ?bool
    {
        return $this->pay;
    }

    /**
     * @param bool|null $pay
     * @return void
     */
    public function setPay(?bool $pay): void
    {
        $this->pay = $pay;
    }
}
