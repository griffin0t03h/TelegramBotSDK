<?php

namespace TelegramBotSDK\Types\Payments\Query;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Types\Payments\OrderInfo;
use TelegramBotSDK\Types\User;

/**
 * Class PreCheckoutQuery
 * This object contains information about an incoming pre-checkout query.
 *
 * @package TelegramBotSDK\Types\Payments\Query
 */
class PreCheckoutQuery extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['id', 'from', 'currency', 'total_amount', 'invoice_payload'];

    /**
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'from' => User::class,
        'currency' => true,
        'total_amount' => true,
        'invoice_payload' => true,
        'shipping_option_id' => true,
        'order_info' => OrderInfo::class,
    ];

    /**
     * Unique query identifier
     *
     * @var string
     */
    protected string $id;

    /**
     * User who sent the query
     *
     * @var User
     */
    protected User $from;

    /**
     * Three-letter ISO 4217 [currency](https://core.telegram.org/bots/payments#supported-currencies) code, or “XTR”
     * for payments in Telegram Stars
     *
     * @var string
     */
    protected string $currency;

    /**
     * Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$
     * 1.45 pass amount = 145. See the exp parameter in
     * [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past
     * the decimal point for each currency (2 for the majority of currencies).
     *
     * @var integer
     */
    protected int $totalAmount;

    /**
     * Bot specified invoice payload
     *
     * @var string
     */
    protected string $invoicePayload;

    /**
     * Optional. Identifier of the shipping option chosen by the user
     *
     * @var string|null
     */
    protected ?string $shippingOptionId = null;

    /**
     * Optional. Order info provided by the user
     *
     * @var OrderInfo|null
     */
    protected ?OrderInfo $orderInfo = null;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return void
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     * @return void
     */
    public function setFrom(User $from): void
    {
        $this->from = $from;
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

    /**
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoicePayload;
    }

    /**
     * @param string $invoicePayload
     * @return void
     */
    public function setInvoicePayload(string $invoicePayload): void
    {
        $this->invoicePayload = $invoicePayload;
    }

    /**
     * @return null|string
     */
    public function getShippingOptionId(): ?string
    {
        return $this->shippingOptionId;
    }

    /**
     * @param string $shippingOptionId
     * @return void
     */
    public function setShippingOptionId(string $shippingOptionId): void
    {
        $this->shippingOptionId = $shippingOptionId;
    }

    /**
     * @return OrderInfo|null
     */
    public function getOrderInfo(): ?OrderInfo
    {
        return $this->orderInfo;
    }

    /**
     * @param OrderInfo $orderInfo
     * @return void
     */
    public function setOrderInfo(OrderInfo $orderInfo): void
    {
        $this->orderInfo = $orderInfo;
    }
}
