<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Enum\TransactionPartnerType;

/**
 * Class TransactionPartnerTelegramAds
 * Describes a withdrawal transaction to the Telegram Ads platform.
 *
 * @see https://core.telegram.org/bots/api#transactionpartnertelegramads
 *
 * @package TelegramBotSDK\Types\Payments
 */
class TransactionPartnerTelegramAds extends TransactionPartner
{
    /**
     * {@inheritdoc}
     *
     * @var TransactionPartnerType
     */
    protected TransactionPartnerType $type = TransactionPartnerType::TelegramAds;
}
