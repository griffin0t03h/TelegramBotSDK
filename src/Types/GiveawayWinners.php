<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class GiveawayWinners
 * This object represents a message about the completion of a giveaway with public winners.
 *
 * @package TelegramBotSDK\Types
 */
class GiveawayWinners extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = [
        'chat',
        'giveaway_message_id',
        'winners_selection_date',
        'winner_count',
        'winners',
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'chat' => Chat::class,
        'giveaway_message_id' => true,
        'winners_selection_date' => true,
        'winner_count' => true,
        'winners' => ArrayOfUser::class,
        'additional_chat_count' => true,
        'premium_subscription_month_count' => true,
        'unclaimed_prize_count' => true,
        'only_new_members' => true,
        'was_refunded' => true,
        'prize_description' => true,
    ];

    /**
     * The chat that created the giveaway
     *
     * @var Chat
     */
    protected Chat $chat;

    /**
     * Identifier of the message with the giveaway in the chat
     *
     * @var int
     */
    protected int $giveawayMessageId;

    /**
     * Point in time (Unix timestamp) when winners of the giveaway were selected
     *
     * @var int
     */
    protected int $winnersSelectionDate;

    /**
     * Total number of winners in the giveaway
     *
     * @var int
     */
    protected int $winnerCount;

    /**
     * List of up to 100 winners of the giveaway
     *
     * @var User[]
     */
    protected array $winners;

    /**
     * Optional. The number of other chats the user had to join in order to be eligible for the giveaway
     *
     * @var int|null
     */
    protected ?int $additionalChatCount = null;

    /**
     * Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for
     *
     * @var int|null
     */
    protected ?int $premiumSubscriptionMonthCount = null;

    /**
     * Optional. Number of undistributed prizes
     *
     * @var int|null
     */
    protected ?int $unclaimedPrizeCount = null;

    /**
     * Optional. True, if only users who had joined the chats after the giveaway started were eligible to win
     *
     * @var bool|null
     */
    protected ?bool $onlyNewMembers = null;

    /**
     * Optional. True, if the giveaway was canceled because the payment for it was refunded
     *
     * @var bool|null
     */
    protected ?bool $wasRefunded = null;

    /**
     * Optional. Description of additional giveaway prize
     *
     * @var string|null
     */
    protected ?string $prizeDescription = null;

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     * @return void
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return int
     */
    public function getGiveawayMessageId(): int
    {
        return $this->giveawayMessageId;
    }

    /**
     * @param int $giveawayMessageId
     * @return void
     */
    public function setGiveawayMessageId(int $giveawayMessageId): void
    {
        $this->giveawayMessageId = $giveawayMessageId;
    }

    /**
     * @return int
     */
    public function getWinnersSelectionDate(): int
    {
        return $this->winnersSelectionDate;
    }

    /**
     * @param int $winnersSelectionDate
     * @return void
     */
    public function setWinnersSelectionDate(int $winnersSelectionDate): void
    {
        $this->winnersSelectionDate = $winnersSelectionDate;
    }

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
     * @return User[]
     */
    public function getWinners(): array
    {
        return $this->winners;
    }

    /**
     * @param User[] $winners
     * @return void
     */
    public function setWinners(array $winners): void
    {
        $this->winners = $winners;
    }

    /**
     * @return int|null
     */
    public function getAdditionalChatCount(): ?int
    {
        return $this->additionalChatCount;
    }

    /**
     * @param int|null $additionalChatCount
     * @return void
     */
    public function setAdditionalChatCount(?int $additionalChatCount): void
    {
        $this->additionalChatCount = $additionalChatCount;
    }

    /**
     * @return int|null
     */
    public function getPremiumSubscriptionMonthCount(): ?int
    {
        return $this->premiumSubscriptionMonthCount;
    }

    /**
     * @param int|null $premiumSubscriptionMonthCount
     * @return void
     */
    public function setPremiumSubscriptionMonthCount(?int $premiumSubscriptionMonthCount): void
    {
        $this->premiumSubscriptionMonthCount = $premiumSubscriptionMonthCount;
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
     * @return bool|null
     */
    public function getOnlyNewMembers(): ?bool
    {
        return $this->onlyNewMembers;
    }

    /**
     * @param bool|null $onlyNewMembers
     * @return void
     */
    public function setOnlyNewMembers(?bool $onlyNewMembers): void
    {
        $this->onlyNewMembers = $onlyNewMembers;
    }

    /**
     * @return bool|null
     */
    public function getWasRefunded(): ?bool
    {
        return $this->wasRefunded;
    }

    /**
     * @param bool|null $wasRefunded
     * @return void
     */
    public function setWasRefunded(?bool $wasRefunded): void
    {
        $this->wasRefunded = $wasRefunded;
    }

    /**
     * @return string|null
     */
    public function getPrizeDescription(): ?string
    {
        return $this->prizeDescription;
    }

    /**
     * @param string|null $prizeDescription
     * @return void
     */
    public function setPrizeDescription(?string $prizeDescription): void
    {
        $this->prizeDescription = $prizeDescription;
    }
}
