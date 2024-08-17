<?php

namespace TelegramBotSDK\Types;

/**
 * Class BackgroundTypeFill
 * The background is automatically filled based on the selected colors.
 *
 * @package TelegramBotSDK\Types
 */
class BackgroundTypeFill extends BackgroundType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'fill', 'dark_theme_dimming'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'fill' => BackgroundFill::class,
        'dark_theme_dimming' => true,
    ];

    /**
     * The background fill
     *
     * @var BackgroundFill
     */
    protected BackgroundFill $fill;

    /**
     * Dimming of the background in dark themes, as a percentage; 0-100
     *
     * @var int
     */
    protected int $darkThemeDimming;

    /**
     * @return BackgroundFill
     */
    public function getFill(): BackgroundFill
    {
        return $this->fill;
    }

    /**
     * @param BackgroundFill $fill
     * @return void
     */
    public function setFill(BackgroundFill $fill): void
    {
        $this->fill = $fill;
    }

    /**
     * @return int
     */
    public function getDarkThemeDimming(): int
    {
        return $this->darkThemeDimming;
    }

    /**
     * @param int $darkThemeDimming
     * @return void
     */
    public function setDarkThemeDimming(int $darkThemeDimming): void
    {
        $this->darkThemeDimming = $darkThemeDimming;
    }
}
