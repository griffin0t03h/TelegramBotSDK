<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\TransactionPartnerType;
use TelegramBotSDK\InvalidArgumentException;

/**
 * Class TransactionPartner
 * This object describes the source of a transaction, or its recipient for outgoing transactions.
 *
 * @see https://core.telegram.org/bots/api#transactionpartner
 *
 * @package TelegramBotSDK\Types\Payments
 */
class TransactionPartner extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['type'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
    ];

    /**
     * Type of the transaction partner, can be either “user”, “fragment”, “telegram_ads” or “other”
     *
     * @var TransactionPartnerType
     */
    protected TransactionPartnerType $type;

    /**
     * @psalm-suppress MoreSpecificReturnType,LessSpecificReturnStatement
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): TransactionPartner|TransactionPartnerUser|TransactionPartnerFragment|TransactionPartnerTelegramAds|TransactionPartnerOther|static
    {
        self::validate($data);

        $class = match ($data['type']) {
            TransactionPartnerType::User->value => TransactionPartnerUser::class,
            TransactionPartnerType::Fragment->value => TransactionPartnerFragment::class,
            TransactionPartnerType::TelegramAds->value => TransactionPartnerTelegramAds::class,
            TransactionPartnerType::Other->value => TransactionPartnerOther::class,
            default => TransactionPartner::class,
        };

        $instance = new $class();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return TransactionPartnerType
     */
    public function getType(): TransactionPartnerType
    {
        return $this->type;
    }

    /**
     * @param TransactionPartnerType|string $type
     * @return void
     */
    public function setType(TransactionPartnerType|string $type): void
    {
        if ($type instanceof TransactionPartnerType) {
            $this->type = $type;
        } else {
            $this->type = TransactionPartnerType::tryFrom($type) ?? TransactionPartnerType::Unknown;
        }
    }
}
