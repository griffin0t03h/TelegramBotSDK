<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Enum\TransactionPartnerType;

/**
 * Class TransactionPartnerFragment
 * Describes a withdrawal transaction with Fragment.
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerfragment
 *
 * @package TelegramBotSDK\Types\Payments
 */
class TransactionPartnerFragment extends TransactionPartner
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['type', 'withdrawal_state'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'withdrawal_state' => RevenueWithdrawalState::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @var TransactionPartnerType
     */
    protected TransactionPartnerType $type = TransactionPartnerType::Fragment;

    /**
     * Optional. State of the transaction if the transaction is outgoing
     *
     * @var RevenueWithdrawalState|null
     */
    protected ?RevenueWithdrawalState $withdrawalState;

    /**
     * @return RevenueWithdrawalState|null
     */
    public function getWithdrawalState(): ?RevenueWithdrawalState
    {
        return $this->withdrawalState;
    }

    /**
     * @param RevenueWithdrawalState|null $withdrawalState
     * @return void
     */
    public function setWithdrawalState(?RevenueWithdrawalState $withdrawalState): void
    {
        $this->withdrawalState = $withdrawalState;
    }
}
