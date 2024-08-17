<?php

namespace TelegramBotSDK\Types;

/**
 * Class BackgroundFillFreeformGradient
 * The background is a freeform gradient that rotates after every message in the chat.
 *
 * @package TelegramBotSDK\Types
 */
class BackgroundFillFreeformGradient extends BackgroundFill
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'colors'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'colors' => true,
    ];

    /**
     * A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
     *
     * @var int[]
     */
    protected array $colors;

    /**
     * @return array
     */
    public function getColors(): array
    {
        return $this->colors;
    }

    /**
     * @param array $colors
     * @return void
     */
    public function setColors(array $colors): void
    {
        $this->colors = $colors;
    }
}
