<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\RevenueWithdrawalStateType;
use TelegramBotSDK\InvalidArgumentException;

/**
 * Class RevenueWithdrawalState
 * This object describes the state of a revenue withdrawal operation.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstate
 *
 * @package TelegramBotSDK\Types\Payments
 */
class RevenueWithdrawalState extends BaseType
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
     * Type of the state, can be either “pending”, “succeeded” or “failed”
     *
     * @var RevenueWithdrawalStateType
     */
    protected RevenueWithdrawalStateType $type;

    /**
     * @psalm-suppress MoreSpecificReturnType,LessSpecificReturnStatement
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): RevenueWithdrawalState|RevenueWithdrawalStatePending|RevenueWithdrawalStateSucceeded|RevenueWithdrawalStateFailed|static
    {
        self::validate($data);

        $class = match ($data['source']) {
            RevenueWithdrawalStateType::Pending->value => RevenueWithdrawalStatePending::class,
            RevenueWithdrawalStateType::Succeeded->value => RevenueWithdrawalStateSucceeded::class,
            RevenueWithdrawalStateType::Failed->value => RevenueWithdrawalStateFailed::class,
            default => RevenueWithdrawalState::class,
        };

        $instance = new $class();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return RevenueWithdrawalStateType
     */
    public function getType(): RevenueWithdrawalStateType
    {
        return $this->type;
    }

    /**
     * @param RevenueWithdrawalStateType|string $type
     * @return void
     */
    public function setType(RevenueWithdrawalStateType|string $type): void
    {
        if ($type instanceof RevenueWithdrawalStateType) {
            $this->type = $type;
        } else {
            $this->type = RevenueWithdrawalStateType::tryFrom($type) ?? RevenueWithdrawalStateType::Unknown;
        }
    }
}
