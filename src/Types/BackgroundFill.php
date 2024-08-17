<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class BackgroundFill
 * This object describes the way a background is filled based on the selected colors.
 *
 * @package TelegramBotSDK\Types
 */
abstract class BackgroundFill extends BaseType implements TypeInterface
{
    /**
     * Type of the background fill
     *
     * @var string
     */
    protected string $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
