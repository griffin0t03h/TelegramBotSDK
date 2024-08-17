<?php

namespace TelegramBotSDK\Types\Game;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Collection\CollectionItemInterface;
use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\User;

/**
 *  Class CallbackGame
 *  This object represents one row of the high scores table for a game.
 *
 * @see https://core.telegram.org/bots/api#gamehighscore
 *
 * @package TelegramBotSDK\Types
 */
class GameHighScore extends BaseType implements TypeInterface, CollectionItemInterface
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
     * User
     *
     * @var User
     */
    protected User $user;

    /**
     * Score
     *
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
     * @return void
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
     * @return void
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
     * @return void
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }
}
