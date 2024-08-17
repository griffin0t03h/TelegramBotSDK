<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Enum\RevenueWithdrawalStateType;

/**
 * Class RevenueWithdrawalStatePending
 * The withdrawal is in progress.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatepending
 *
 * @package TelegramBotSDK\Types\Payments
 */
class RevenueWithdrawalStatePending extends RevenueWithdrawalState
{
    /**
     * {@inheritdoc}
     *
     * @var RevenueWithdrawalStateType
     */
    protected RevenueWithdrawalStateType $type = RevenueWithdrawalStateType::Pending;
}
