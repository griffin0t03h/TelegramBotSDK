<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;

/**
 * Class StarTransactions
 * Contains a list of Telegram Star transactions.
 *
 * @see https://core.telegram.org/bots/api#startransactions
 *
 * @package TelegramBotSDK\Types\Payments
 */
class StarTransactions extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['transactions'];

    /**
     * @var array
     */
    protected static array $map = [
        'transactions' => ArrayOfStarTransaction::class,
    ];

    /**
     * The list of transactions
     *
     * @var StarTransaction[]
     */
    protected array $transactions;

    /**
     * @return StarTransaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @param StarTransaction[] $transactions
     * @return void
     */
    public function setTransactions(array $transactions): void
    {
        $this->transactions = $transactions;
    }
}
