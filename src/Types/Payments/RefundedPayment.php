<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;

/**
 * Class RefundedPayment
 * This object contains basic information about a refunded payment.
 *
 * @see https://core.telegram.org/bots/api#refundedpayment
 *
 * @package TelegramBotSDK\Types\Payments
 */
class RefundedPayment extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = [
        'currency',
        'total_amount',
        'invoice_payload',
        'telegram_payment_charge_id',
    ];

    /**
     * @var array
     */
    protected static array $map = [
        'currency' => true,
        'total_amount' => true,
        'invoice_payload' => true,
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
     * @var array
     */
    protected array $invoicePayload;

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
     * @return array
     */
    public function getInvoicePayload(): array
    {
        return $this->invoicePayload;
    }

    /**
     * @param array $invoicePayload
     * @return void
     */
    public function setInvoicePayload(array $invoicePayload): void
    {
        $this->invoicePayload = $invoicePayload;
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
