<?php

namespace TelegramBotSDK\Types\Inline;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Types\Location;
use TelegramBotSDK\Types\User;

/**
 * Class ChosenInlineResult
 * This object represents a result of an inline query that was chosen by the user and sent to their chat partner.
 *
 * @package TelegramBotSDK\Types
 */
class ChosenInlineResult extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['result_id', 'from', 'query'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'result_id' => true,
        'from' => User::class,
        'location' => Location::class,
        'inline_message_id' => true,
        'query' => true,
    ];

    /**
     * The unique identifier for the result that was chosen.
     *
     * @var string
     */
    protected string $resultId;

    /**
     * The user that chose the result.
     *
     * @var User
     */
    protected User $from;

    /**
     * Optional. Sender location, only for bots that require user location
     *
     * @var Location|null
     */
    protected ?Location $location = null;

    /**
     * Optional. Identifier of the sent inline message.
     * Available only if there is an inline keyboard attached to the message.
     * Will be also received in callback queries and can be used to edit the message.
     *
     * @var string|null
     */
    protected ?string $inlineMessageId = null;

    /**
     * The query that was used to obtain the result.
     *
     * @var string
     */
    protected string $query;

    /**
     * @return string
     */
    public function getResultId(): string
    {
        return $this->resultId;
    }

    /**
     * @param string $resultId
     *
     * @return void
     */
    public function setResultId(string $resultId): void
    {
        $this->resultId = $resultId;
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
     * @return null|string
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string $inlineMessageId
     *
     * @return void
     */
    public function setInlineMessageId(string $inlineMessageId): void
    {
        $this->inlineMessageId = $inlineMessageId;
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
}
