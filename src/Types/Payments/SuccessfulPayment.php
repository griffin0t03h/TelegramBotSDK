<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;

/**
 * Class SuccessfulPayment
 * This object contains basic information about a successful payment.
 *
 * @see https://core.telegram.org/bots/api#successfulpayment
 *
 * @package TelegramBotSDK\Types\Payments
 */
class SuccessfulPayment extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = [
        'currency',
        'total_amount',
        'invoice_payload',
        'telegram_payment_charge_id',
        'provider_payment_charge_id',
    ];

    /**
     * @var array
     */
    protected static array $map = [
        'currency' => true,
        'total_amount' => true,
        'invoice_payload' => true,
        'shipping_option_id' => true,
        'order_info' => OrderInfo::class,
        'telegram_payment_charge_id' => true,
        'provider_payment_charge_id' => true,
    ];

    /**
     * Three-letter ISO 4217 [currency](https://core.telegram.org/bots/payments#supported-currencies) code, or “XTR”
     * for payments in Telegram Stars
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
     * Telegram payment identifier
     *
     * @var string
     */
    protected string $telegramPaymentChargeId;

    /**
     * Provider payment identifier
     *
     * @var string
     */
    protected string $providerPaymentChargeId;

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
     * @return string|null
     */
    public function getShippingOptionId(): ?string
    {
        return $this->shippingOptionId;
    }

    /**
     * @param string|null $shippingOptionId
     * @return void
     */
    public function setShippingOptionId(?string $shippingOptionId): void
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

    /**
     * @return string
     */
    public function getTelegramPaymentChargeId(): string
    {
        return $this->telegramPaymentChargeId;
    }

    /**
     * @param string $telegramPaymentChargeId
     * @return void
     */
    public function setTelegramPaymentChargeId(string $telegramPaymentChargeId): void
    {
        $this->telegramPaymentChargeId = $telegramPaymentChargeId;
    }

    /**
     * @return string
     */
    public function getProviderPaymentChargeId(): string
    {
        return $this->providerPaymentChargeId;
    }

    /**
     * @param string $providerPaymentChargeId
     * @return void
     */
    public function setProviderPaymentChargeId(string $providerPaymentChargeId): void
    {
        $this->providerPaymentChargeId = $providerPaymentChargeId;
    }
}
