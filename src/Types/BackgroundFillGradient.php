<?php

namespace TelegramBotSDK\Types;

class BackgroundFillGradient extends BackgroundFill
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'top_color', 'bottom_color', 'rotation_angle'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'top_color' => true,
        'bottom_color' => true,
        'rotation_angle' => true,
    ];

    /**
     * Top color of the gradient in the RGB24 format
     *
     * @var int
     */
    protected int $topColor;

    /**
     * Bottom color of the gradient in the RGB24 format
     *
     * @var int
     */
    protected int $bottomColor;

    /**
     * Clockwise rotation angle of the background fill in degrees; 0-359
     *
     * @var int
     */
    protected int $rotationAngle;

    /**
     * @return int
     */
    public function getTopColor(): int
    {
        return $this->topColor;
    }

    /**
     * @param int $topColor
     * @return void
     */
    public function setTopColor(int $topColor): void
    {
        $this->topColor = $topColor;
    }

    /**
     * @return int
     */
    public function getBottomColor(): int
    {
        return $this->bottomColor;
    }

    /**
     * @param int $bottomColor
     * @return void
     */
    public function setBottomColor(int $bottomColor): void
    {
        $this->bottomColor = $bottomColor;
    }

    /**
     * @return int
     */
    public function getRotationAngle(): int
    {
        return $this->rotationAngle;
    }

    /**
     * @param int $rotationAngle
     * @return void
     */
    public function setRotationAngle(int $rotationAngle): void
    {
        $this->rotationAngle = $rotationAngle;
    }
}
