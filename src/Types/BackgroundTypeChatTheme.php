<?php

namespace TelegramBotSDK\Types;

/**
 * Class BackgroundTypeChatTheme
 * The background is taken directly from a built-in chat theme.
 *
 * @package TelegramBotSDK\Types
 */
class BackgroundTypeChatTheme extends BackgroundType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'theme_name'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'theme_name' => true,
    ];

    /**
     * Name of the chat theme, which is usually an emoji
     *
     * @var string
     */
    protected string $themeName;

    /**
     * @return string
     */
    public function getThemeName(): string
    {
        return $this->themeName;
    }

    /**
     * @param string $themeName
     * @return void
     */
    public function setThemeName(string $themeName): void
    {
        $this->themeName = $themeName;
    }
}
