<?php

namespace TelegramBotSDK\Types;

/**
 * Class MenuButtonWebApp
 * Represents a menu button, which launches a Web App.
 *
 * @see https://core.telegram.org/bots/api#menubuttonwebapp
 *
 * @package TelegramBotSDK\Types
 */
class MenuButtonWebApp extends MenuButton
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'text', 'web_app'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'text' => true,
        'web_app' => true,
    ];

    /**
     * Text on the button
     *
     * @var string
     */
    protected string $text;

    /**
     * Description of the Web App that will be launched when the user presses the button. The Web App will be able to
     * send an arbitrary message on behalf of the user using the method answerWebAppQuery. Alternatively, a t.me link
     * to a Web App of the bot can be specified in the object instead of the Web App's URL, in which case the Web App
     * will be opened as if the user pressed the link.
     *
     * @var WebAppInfo
     */
    protected WebAppInfo $webApp;

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
     * @return WebAppInfo
     */
    public function getWebApp(): WebAppInfo
    {
        return $this->webApp;
    }

    /**
     * @param WebAppInfo $webApp
     * @return void
     */
    public function setWebApp(WebAppInfo $webApp): void
    {
        $this->webApp = $webApp;
    }
}
