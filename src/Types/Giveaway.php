<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class Giveaway
 * This object represents a message about a scheduled giveaway.
 *
 * @package TelegramBotSDK\Types
 */
class Giveaway extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['chats', 'winners_selection_date', 'winner_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'chats' => ArrayOfChat::class,
        'winners_selection_date' => true,
        'winner_count' => true,
        'only_new_members' => true,
        'has_public_winners' => true,
        'prize_description' => true,
        'country_codes' => true,
        'premium_subscription_month_count' => true,
    ];

    /**
     * The list of chats which the user must join to participate in the giveaway
     *
     * @var Chat[]
     */
    protected array $chats;

    /**
     * Point in time (Unix timestamp) when winners of the giveaway will be selected
     *
     * @var int
     */
    protected int $winnersSelectionDate;

    /**
     * The number of users which are supposed to be selected as winners of the giveaway
     *
     * @var int
     */
    protected int $winnerCount;

    /**
     * Optional. True, if only users who join the chats after the giveaway started should be eligible to win
     *
     * @var bool|null
     */
    protected ?bool $onlyNewMembers = null;

    /**
     * Optional. True, if the list of giveaway winners will be visible to everyone
     *
     * @var bool|null
     */
    protected ?bool $hasPublicWinners = null;

    /**
     * Optional. Description of additional giveaway prize
     *
     * @var string|null
     */
    protected ?string $prizeDescription = null;

    /**
     * Optional. A list of two-letter [ISO 3166-1 alpha-2(https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country
     * codes indicating the countries from which eligible users for the giveaway must come. If empty, then all users
     * can participate in the giveaway. Users with a phone number that was bought on Fragment can always participate in
     * giveaways.
     *
     * @var array|null
     */
    protected ?array $countryCodes = null;

    /**
     * Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for
     *
     * @var int|null
     */
    protected ?int $premiumSubscriptionMonthCount = null;

    /**
     * @return Chat[]
     */
    public function getChats(): array
    {
        return $this->chats;
    }

    /**
     * @param Chat[] $chats
     * @return void
     */
    public function setChats(array $chats): void
    {
        $this->chats = $chats;
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
    public function getHasPublicWinners(): ?bool
    {
        return $this->hasPublicWinners;
    }

    /**
     * @param bool|null $hasPublicWinners
     * @return void
     */
    public function setHasPublicWinners(?bool $hasPublicWinners): void
    {
        $this->hasPublicWinners = $hasPublicWinners;
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

    /**
     * @return array|null
     */
    public function getCountryCodes(): ?array
    {
        return $this->countryCodes;
    }

    /**
     * @param array|null $countryCodes
     * @return void
     */
    public function setCountryCodes(?array $countryCodes): void
    {
        $this->countryCodes = $countryCodes;
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
}
