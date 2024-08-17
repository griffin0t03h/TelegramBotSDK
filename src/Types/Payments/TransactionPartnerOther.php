<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Enum\TransactionPartnerType;

/**
 * Class TransactionPartner
 * Describes a transaction with an unknown source or recipient.
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerother
 *
 * @package TelegramBotSDK\Types\Payments
 */
class TransactionPartnerOther extends TransactionPartner
{
    /**
     * Type of the transaction partner
     *
     * @var TransactionPartnerType
     */
    protected TransactionPartnerType $type = TransactionPartnerType::Other;
}
