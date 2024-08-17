<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class GiveawayCompleted
 * This object represents a service message about the completion of a giveaway without public winners.
 *
 * @package TelegramBotSDK\Types
 */
class GiveawayCompleted extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['winner_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'winner_count' => true,
        'unclaimed_prize_count' => true,
        'giveaway_message' => Message::class,
    ];

    /**
     * Number of winners in the giveaway
     *
     * @var int
     */
    protected int $winnerCount;

    /**
     * Optional. Number of undistributed prizes
     *
     * @var int|null
     */
    protected ?int $unclaimedPrizeCount = null;

    /**
     * Optional. Message with the giveaway that was completed, if it wasn't deleted
     *
     * @var Message|null
     */
    protected ?Message $giveawayMessage = null;

    /**
     * @return int
     */
    public function getWinnerCount(): int
    {
        return $this->winnerCount;
    }

    /**
     * @param int $winnerCount
     * @return void
     */
    public function setWinnerCount(int $winnerCount): void
    {
        $this->winnerCount = $winnerCount;
    }

    /**
     * @return int|null
     */
    public function getUnclaimedPrizeCount(): ?int
    {
        return $this->unclaimedPrizeCount;
    }

    /**
     * @param int|null $unclaimedPrizeCount
     * @return void
     */
    public function setUnclaimedPrizeCount(?int $unclaimedPrizeCount): void
    {
        $this->unclaimedPrizeCount = $unclaimedPrizeCount;
    }

    /**
     * @return Message|null
     */
    public function getGiveawayMessage(): ?Message
    {
        return $this->giveawayMessage;
    }

    /**
     * @param Message|null $giveawayMessage
     * @return void
     */
    public function setGiveawayMessage(?Message $giveawayMessage): void
    {
        $this->giveawayMessage = $giveawayMessage;
    }
}
