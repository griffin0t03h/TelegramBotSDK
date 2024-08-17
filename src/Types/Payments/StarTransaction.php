<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Collection\CollectionItemInterface;

/**
 * Class StarTransaction
 * Describes a Telegram Star transaction.
 *
 * @see https://core.telegram.org/bots/api#startransaction
 *
 * @package TelegramBotSDK\Types\Payments
 */
class StarTransaction extends BaseType implements CollectionItemInterface
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['id', 'amount', 'date'];

    /**
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'amount' => true,
        'date' => true,
        'source' => true,
        'receiver' => true,
    ];

    /**
     * Unique identifier of the transaction. Coincides with the identifer of the original transaction for refund
     * transactions. Coincides with SuccessfulPayment.telegram_payment_charge_id for successful incoming payments from
     * users.
     *
     * @var string
     */
    protected string $id;

    /**
     * Number of Telegram Stars transferred by the transaction
     *
     * @var int
     */
    protected int $amount;

    /**
     * Date the transaction was created in Unix time
     *
     * @var int
     */
    protected int $date;

    /**
     * Optional. Source of an incoming transaction (e.g., a user purchasing goods or services, Fragment refunding a
     * failed withdrawal). Only for incoming transactions
     *
     * @var TransactionPartner|null
     */
    protected ?TransactionPartner $source = null;

    /**
     * Optional. Receiver of an outgoing transaction (e.g., a user for a purchase refund, Fragment for a withdrawal).
     * Only for outgoing transactions
     *
     * @var TransactionPartner|null
     */
    protected ?TransactionPartner $receiver = null;

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
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return void
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return void
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return TransactionPartner|null
     */
    public function getSource(): ?TransactionPartner
    {
        return $this->source;
    }

    /**
     * @param TransactionPartner|null $source
     * @return void
     */
    public function setSource(?TransactionPartner $source): void
    {
        $this->source = $source;
    }

    /**
     * @return TransactionPartner|null
     */
    public function getReceiver(): ?TransactionPartner
    {
        return $this->receiver;
    }

    /**
     * @param TransactionPartner|null $receiver
     * @return void
     */
    public function setReceiver(?TransactionPartner $receiver): void
    {
        $this->receiver = $receiver;
    }
}
