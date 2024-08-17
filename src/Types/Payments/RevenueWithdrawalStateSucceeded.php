<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Enum\RevenueWithdrawalStateType;

/**
 * Class RevenueWithdrawalStateSucceeded
 * The withdrawal succeeded.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatesucceeded
 *
 * @package TelegramBotSDK\Types\Payments
 */
class RevenueWithdrawalStateSucceeded extends RevenueWithdrawalState
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['type', 'date', 'url'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'date' => true,
        'url' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var RevenueWithdrawalStateType
     */
    protected RevenueWithdrawalStateType $type = RevenueWithdrawalStateType::Succeeded;

    /**
     * Date the withdrawal was completed in Unix time
     *
     * @var int
     */
    protected int $date;

    /**
     * An HTTPS URL that can be used to see transaction details
     *
     * @var string
     */
    protected string $url;

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return void
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return void
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}
