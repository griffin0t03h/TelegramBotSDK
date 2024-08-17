<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class WebAppInfo
 * Describes a [Web App](https://core.telegram.org/bots/webapps).
 *
 * @package TelegramBotSDK\Types
 */
class WebAppInfo extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
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
    ];

    /**
     * An HTTPS URL of a Web App to be opened with additional data as specified in [Initializing Web
     * Apps](https://core.telegram.org/bots/webapps#initializing-mini-apps)
     *
     * @var string
     */
    protected string $url;

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
}
