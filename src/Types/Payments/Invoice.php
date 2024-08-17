<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;

/**
 * Class Invoice
 * This object contains basic information about an invoice.
 *
 * @see https://core.telegram.org/bots/api#invoice
 *
 * @package TelegramBotSDK\Types\Payments
 */
class Invoice extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['title', 'description', 'start_parameter', 'currency', 'total_amount'];

    /**
     * @var array
     */
    protected static array $map = [
        'title' => true,
        'description' => true,
        'start_parameter' => true,
        'currency' => true,
        'total_amount' => true,
    ];

    /**
     * Product name
     *
     * @var string
     */
    protected string $title;

    /**
     * Product description
     *
     * @var string
     */
    protected string $description;

    /**
     * Unique bot deep-linking parameter that can be used to generate this invoice
     *
     * @var string
     */
    protected string $startParameter;

    /**
     * Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
     *
     * @var string
     */
    protected string $currency;

    /**
     * Total price in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in
     * [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past
     * the decimal point for each currency (2 for the majority of currencies).
     *
     * @var integer
     */
    protected int $totalAmount;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getStartParameter(): string
    {
        return $this->startParameter;
    }

    /**
     * @param string $startParameter
     * @return void
     */
    public function setStartParameter(string $startParameter): void
    {
        $this->startParameter = $startParameter;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return void
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->totalAmount;
    }

    /**
     * @param int $totalAmount
     * @return void
     */
    public function setTotalAmount(int $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }
}
