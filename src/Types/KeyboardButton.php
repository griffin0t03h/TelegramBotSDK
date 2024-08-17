<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class KeyboardButton
 * This object represents one button of the reply keyboard. At most one of the optional fields must be used to specify
 * type of the button. For simple text buttons, String can be used instead of this object to specify the button text.
 *
 * @package TelegramBotSDK\Types
 */
class KeyboardButton extends BaseType implements TypeInterface
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
        'request_users' => KeyboardButtonRequestUsers::class,
        'request_chat' => KeyboardButtonRequestChat::class,
        'request_contact' => true,
        'request_location' => true,
        'request_poll' => KeyboardButtonPollType::class,
        'web_app' => WebAppInfo::class,
    ];

    /**
     * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is
     * pressed
     *
     * @var string
     */
    protected string $text;

    /**
     * Optional. If specified, pressing the button will open a list of suitable users.
     * Identifiers of selected users will be sent to the bot in a “users_shared” service message.
     * Available in private chats only.
     *
     * @var KeyboardButtonRequestUsers|null
     */
    protected ?KeyboardButtonRequestUsers $requestUsers = null;

    /**
     * Optional. If specified, pressing the button will open a list of suitable chats.
     * Tapping on a chat will send its identifier to the bot in a “chat_shared” service message.
     * Available in private chats only.
     *
     * @var KeyboardButtonRequestChat|null
     */
    protected ?KeyboardButtonRequestChat $requestChat = null;

    /**
     * Optional. If True, the user's phone number will be sent as a contact when the button is pressed.
     * Available in private chats only.
     *
     * @var bool|null
     */
    protected ?bool $requestContact = null;

    /**
     * Optional. If True, the user's current location will be sent when the button is pressed.
     * Available in private chats only.
     *
     * @var bool|null
     */
    protected ?bool $requestLocation = null;

    /**
     * Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is
     * pressed. Available in private chats only.
     *
     * @var KeyboardButtonPollType|null
     */
    protected ?KeyboardButtonPollType $requestPoll = null;

    /**
     * Optional. If specified, the described Web App will be launched when the button is pressed.
     * The Web App will be able to send a “web_app_data” service message. Available in private chats only.
     *
     * @var WebAppInfo|null
     */
    protected ?WebAppInfo $webApp = null;

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
     * @return KeyboardButtonRequestUsers|null
     */
    public function getRequestUsers(): ?KeyboardButtonRequestUsers
    {
        return $this->requestUsers;
    }

    /**
     * @param KeyboardButtonRequestUsers|null $requestUsers
     * @return void
     */
    public function setRequestUsers(?KeyboardButtonRequestUsers $requestUsers): void
    {
        $this->requestUsers = $requestUsers;
    }

    /**
     * @return KeyboardButtonRequestChat|null
     */
    public function getRequestChat(): ?KeyboardButtonRequestChat
    {
        return $this->requestChat;
    }

    /**
     * @param KeyboardButtonRequestChat|null $requestChat
     * @return void
     */
    public function setRequestChat(?KeyboardButtonRequestChat $requestChat): void
    {
        $this->requestChat = $requestChat;
    }

    /**
     * @return bool|null
     */
    public function getRequestContact(): ?bool
    {
        return $this->requestContact;
    }

    /**
     * @param bool|null $requestContact
     * @return void
     */
    public function setRequestContact(?bool $requestContact): void
    {
        $this->requestContact = $requestContact;
    }

    /**
     * @return bool|null
     */
    public function getRequestLocation(): ?bool
    {
        return $this->requestLocation;
    }

    /**
     * @param bool|null $requestLocation
     * @return void
     */
    public function setRequestLocation(?bool $requestLocation): void
    {
        $this->requestLocation = $requestLocation;
    }

    /**
     * @return KeyboardButtonPollType|null
     */
    public function getRequestPoll(): ?KeyboardButtonPollType
    {
        return $this->requestPoll;
    }

    /**
     * @param KeyboardButtonPollType|null $requestPoll
     * @return void
     */
    public function setRequestPoll(?KeyboardButtonPollType $requestPoll): void
    {
        $this->requestPoll = $requestPoll;
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
}
