<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatBackground
 * This object represents a chat background.
 *
 * @package TelegramBotSDK\Types
 */
class ChatBackground extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => BackgroundType::class,
    ];

    /**
     * Type of the background
     *
     * @var BackgroundType
     */
    protected BackgroundType $type;

    /**
     * @return BackgroundType
     */
    public function getType(): BackgroundType
    {
        return $this->type;
    }

    /**
     * @param BackgroundType $type
     * @return void
     */
    public function setType(BackgroundType $type): void
    {
        $this->type = $type;
    }
}
