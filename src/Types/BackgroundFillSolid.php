<?php

namespace TelegramBotSDK\Types;

/**
 * Class BackgroundFillSolid
 * The background is filled using the selected color.
 *
 * @package TelegramBotSDK\Types
 */
class BackgroundFillSolid extends BackgroundFill
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'color'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'color' => true,
    ];

    /**
     * The color of the background fill in the RGB24 format
     *
     * @var int
     */
    protected int $color;

    /**
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

    /**
     * @param int $color
     * @return void
     */
    public function setColor(int $color): void
    {
        $this->color = $color;
    }
}
