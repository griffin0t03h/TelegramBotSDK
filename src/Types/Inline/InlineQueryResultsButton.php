<?php

namespace TelegramBotSDK\Types\Inline;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\WebAppInfo;

/**
 * Class InlineQueryResultsButton
 * This object represents a button to be shown above inline query results. You must use exactly one of the optional
 * fields.
 *
 * @package TelegramBotSDK\Types
 */
class InlineQueryResultsButton extends BaseType implements TypeInterface
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
        'web_app' => WebAppInfo::class,
        'start_parameter' => true,
    ];

    /**
     * Label text on the button
     *
     * @var string
     */
    protected string $text;

    /**
     * Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be
     * able to switch back to the inline mode using the method switchInlineQuery inside the Web App.
     *
     * @var WebAppInfo|null
     */
    protected ?WebAppInfo $webApp = null;

    /**
     * Optional. Deep-linking parameter for the /start message sent to the bot when a user presses the button. 1-64
     * characters, only A-Z, a-z, 0-9, _ and - are allowed.
     *
     * @var string|null
     */
    protected ?string $startParameter = null;

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
     * @return string|null
     */
    public function getStartParameter(): ?string
    {
        return $this->startParameter;
    }

    /**
     * @param string|null $startParameter
     * @return void
     */
    public function setStartParameter(?string $startParameter): void
    {
        $this->startParameter = $startParameter;
    }
}
