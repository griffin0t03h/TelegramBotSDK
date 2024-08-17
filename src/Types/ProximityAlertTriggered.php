<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ProximityAlertTriggered
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert
 * set by another user.
 *
 * @package TelegramBotSDK\Types
 */
class ProximityAlertTriggered extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['traveler', 'watcher', 'distance'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'traveler' => User::class,
        'watcher' => User::class,
        'distance' => true,
    ];

    /**
     * User that triggered the alert
     *
     * @var User
     */
    protected User $traveler;

    /**
     * User that set the alert
     *
     * @var User
     */
    protected User $watcher;

    /**
     * The distance between the users
     *
     * @var int
     */
    protected int $distance;

    /**
     * @return User
     */
    public function getTraveler(): User
    {
        return $this->traveler;
    }

    /**
     * @param User $traveler
     * @return void
     */
    public function setTraveler(User $traveler): void
    {
        $this->traveler = $traveler;
    }

    /**
     * @return User
     */
    public function getWatcher(): User
    {
        return $this->watcher;
    }

    /**
     * @param User $watcher
     * @return void
     */
    public function setWatcher(User $watcher): void
    {
        $this->watcher = $watcher;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     * @return void
     */
    public function setDistance(int $distance): void
    {
        $this->distance = $distance;
    }
}
