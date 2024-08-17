<?php

namespace TelegramBotSDK\Types\Game;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\User;

/**
 *
 *  Class CallbackGame
 *  A placeholder, currently holds no information. Use BotFather to set up your game.
 *
 * @see https://core.telegram.org/bots/api#callbackgame
 *
 * @package TelegramBotSDK\Types
 */
class CallbackGame extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['position', 'user', 'score'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'position' => true,
        'user' => User::class,
        'score' => true,
    ];

    /**
     * Position in high score table for the game
     *
     * @var int
     */
    protected int $position;

    /**
     * @var User
     */
    protected User $user;

    /**
     * @var int
     */
    protected int $score;

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }
}
