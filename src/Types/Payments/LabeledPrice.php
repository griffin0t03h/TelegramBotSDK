<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Collection\CollectionItemInterface;

/**
 * Class LabeledPrice
 * This object represents a portion of the price for goods or services.
 *
 * @see https://core.telegram.org/bots/api#labeledprice
 *
 * @package TelegramBotSDK\Types\Payments
 */
class LabeledPrice extends BaseType implements CollectionItemInterface
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['label', 'amount'];

    /**
     * @var array
     */
    protected static array $map = [
        'label' => true,
        'amount' => true,
    ];

    /**
     * Portion label
     *
     * @var string
     */
    protected string $label;

    /**
     * Price of the product in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in
     * [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past
     * the decimal point for each currency (2 for the majority of currencies).
     *
     * @var int
     */
    protected int $amount;

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return void
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return void
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }
}
