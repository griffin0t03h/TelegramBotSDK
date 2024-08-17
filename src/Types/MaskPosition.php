<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class MaskPosition
 * This object describes the position on faces where a mask should be placed by default.
 *
 * @see https://core.telegram.org/bots/api#maskposition
 *
 * @package TelegramBotSDK\Types
 */
class MaskPosition extends BaseType implements TypeInterface
{
    protected static array $requiredParams = ['point', 'x_shift', 'y_shift', 'scale'];

    protected static array $map = [
        'point' => true,
        'x_shift' => true,
        'y_shift' => true,
        'scale' => true,
    ];

    /**
     * The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”, “mouth”, or “chin”.
     *
     * @var string
     */
    protected string $point;

    /**
     * Shift by X-axis measured in widths of the mask scaled to the face size, from left to right.
     * For example, choosing -1.0 will place mask just to the left of the default mask position.
     *
     * @var float
     */
    protected float $xShift;

    /**
     * Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom.
     * For example, 1.0 will place the mask just below the default mask position.
     *
     * @var float
     */
    protected float $yShift;

    /**
     * Mask scaling coefficient. For example, 2.0 means double size.
     *
     * @var float
     */
    protected float $scale;

    /**
     * @return string
     */
    public function getPoint(): string
    {
        return $this->point;
    }

    /**
     * @param string $point
     * @return void
     */
    public function setPoint(string $point): void
    {
        $this->point = $point;
    }

    /**
     * @return float
     */
    public function getXShift(): float
    {
        return $this->xShift;
    }

    /**
     * @param float $xShift
     * @return void
     */
    public function setXShift(float $xShift): void
    {
        $this->xShift = $xShift;
    }

    /**
     * @return float
     */
    public function getYShift(): float
    {
        return $this->yShift;
    }

    /**
     * @param float $yShift
     * @return void
     */
    public function setYShift(float $yShift): void
    {
        $this->yShift = $yShift;
    }

    /**
     * @return float
     */
    public function getScale(): float
    {
        return $this->scale;
    }

    /**
     * @param float $scale
     * @return void
     */
    public function setScale(float $scale): void
    {
        $this->scale = $scale;
    }
}
