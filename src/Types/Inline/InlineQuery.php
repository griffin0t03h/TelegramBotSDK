<?php

namespace TelegramBotSDK\Types\Inline;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Types\Location;
use TelegramBotSDK\Types\User;

/**
 * Class InlineQuery
 * This object represents an incoming inline query.
 * When the user sends an empty query, your bot could return some default or trending results.
 *
 * @package TelegramBotSDK\Types
 */
class InlineQuery extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['id', 'from', 'query', 'offset'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'from' => User::class,
        'location' => Location::class,
        'query' => true,
        'offset' => true,
    ];

    /**
     * Unique identifier for this query
     *
     * @var string
     */
    protected string $id;

    /**
     * Sender
     *
     * @var User
     */
    protected User $from;

    /**
     * Optional. Sender location, only for bots that request user location
     *
     * @var Location|null
     */
    protected ?Location $location = null;

    /**
     * Text of the query
     *
     * @var string
     */
    protected string $query;

    /**
     * Offset of the results to be returned, can be controlled by the bot
     *
     * @var string
     */
    protected string $offset;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return void
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     *
     * @return void
     */
    public function setFrom(User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     *
     * @return void
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     *
     * @return void
     */
    public function setQuery(string $query): void
    {
        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getOffset(): string
    {
        return $this->offset;
    }

    /**
     * @param string $offset
     *
     * @return void
     */
    public function setOffset(string $offset): void
    {
        $this->offset = $offset;
    }
}
