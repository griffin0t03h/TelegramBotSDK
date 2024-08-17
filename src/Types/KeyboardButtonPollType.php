<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class KeyboardButtonPollType
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is
 * pressed.
 *
 * @package TelegramBotSDK\Types
 */
class KeyboardButtonPollType extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
    ];

    /**
     * Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode.
     * If regular is passed, only regular polls will be allowed.
     * Otherwise, the user will be allowed to create a poll of any type.
     *
     * @var string|null
     */
    protected ?string $type = null;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return void
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }
}
