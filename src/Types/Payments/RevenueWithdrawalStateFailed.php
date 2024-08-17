<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Enum\RevenueWithdrawalStateType;

/**
 * Class RevenueWithdrawalStateFailed
 * The withdrawal failed and the transaction was refunded.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatefailed
 *
 * @package TelegramBotSDK\Types\Payments
 */
class RevenueWithdrawalStateFailed extends RevenueWithdrawalState
{
    /**
     * Type of the state
     *
     * @var RevenueWithdrawalStateType
     */
    protected RevenueWithdrawalStateType $type = RevenueWithdrawalStateType::Failed;
}
