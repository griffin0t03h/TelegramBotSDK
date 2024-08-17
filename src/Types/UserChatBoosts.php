<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class UserChatBoosts
 * This object represents a list of boosts added to a chat by a user.
 *
 * @package TelegramBotSDK\Types
 */
class UserChatBoosts extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['boosts'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'boosts' => ArrayOfChatBoost::class,
    ];

    /**
     * The list of boosts added to the chat by the user
     *
     * @var ChatBoost[]
     */
    protected array $boosts;

    /**
     * @return ChatBoost[]
     */
    public function getBoosts(): array
    {
        return $this->boosts;
    }

    /**
     * @param ChatBoost[] $boosts
     */
    public function setBoosts(array $boosts): void
    {
        $this->boosts = $boosts;
    }
}
