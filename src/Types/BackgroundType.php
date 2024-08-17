<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class BackgroundType
 * This object describes the type of a background.
 *
 * @package TelegramBotSDK\Types
 */
abstract class BackgroundType extends BaseType implements TypeInterface
{
    /**
     * Type of the background
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
