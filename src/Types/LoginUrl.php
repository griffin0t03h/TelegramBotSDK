<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * This object represents a parameter of the inline keyboard button used to automatically authorize a user.
 * Serves as a great replacement for the Telegram Login Widget when the user is coming from Telegram.
 * Telegram apps support these buttons as of version 5.7
 */
class LoginUrl extends BaseType implements TypeInterface
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['url'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'url' => true,
        'forward_text' => true,
        'bot_username' => true,
        'request_write_access' => true,
    ];

    /**
     * An HTTPS URL to be opened with user authorization data added to the query string when the button is pressed. If
     * the user refuses to provide authorization data, the original URL without information about the user will be
     * opened. The data added is the same as described in Receiving authorization data.
     * NOTE: You must always check the hash of the received data to verify the authentication and the integrity of the
     * data as described in [Checking authorization](https://core.telegram.org/widgets/login#checking-authorization).
     *
     * @var string
     */
    protected string $url;

    /**
     * Optional. New text of the button in forwarded messages.
     *
     * @var string|null
     */
    protected ?string $forwardText = null;

    /**
     * Optional. Username of a bot, which will be used for user authorization. See [Setting up a
     * bot](https://core.telegram.org/widgets/login#setting-up-a-bot) for more details. If not specified, the current
     * bot's username will be assumed. The url's domain must be the same as the domain linked with the bot. See
     * [Linking your domain to the bot](https://core.telegram.org/widgets/login#linking-your-domain-to-the-bot) for
     * more details.
     *
     * @var string|null
     */
    protected ?string $botUsername = null;

    /**
     * Optional. Pass True to request the permission for your bot to send messages to the user.
     *
     * @var bool|null
     */
    protected ?bool $requestWriteAccess = null;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return void
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return null|string
     */
    public function getForwardText(): ?string
    {
        return $this->forwardText;
    }

    /**
     * @param string|null $forwardText
     * @return void
     */
    public function setForwardText(?string $forwardText): void
    {
        $this->forwardText = $forwardText;
    }

    /**
     * @return string|null
     */
    public function getBotUsername(): ?string
    {
        return $this->botUsername;
    }

    /**
     * @param string|null $botUsername
     * @return void
     */
    public function setBotUsername(?string $botUsername): void
    {
        $this->botUsername = $botUsername;
    }

    /**
     * @return bool|null
     */
    public function isRequestWriteAccess(): ?bool
    {
        return $this->requestWriteAccess;
    }

    /**
     * @param bool|null $requestWriteAccess
     * @return void
     */
    public function setRequestWriteAccess(?bool $requestWriteAccess): void
    {
        $this->requestWriteAccess = $requestWriteAccess;
    }
}
