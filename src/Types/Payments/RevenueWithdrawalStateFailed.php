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
     * {@inheritdoc}
     *
     * @var RevenueWithdrawalStateType
     */
    protected RevenueWithdrawalStateType $type = RevenueWithdrawalStateType::Failed;
}
