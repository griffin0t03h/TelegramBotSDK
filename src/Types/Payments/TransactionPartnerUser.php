<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Enum\TransactionPartnerType;
use TelegramBotSDK\Types\User;

/**
 * Class TransactionPartnerUser
 * Describes a transaction with a user.
 *
 * @see https://core.telegram.org/bots/api#transactionpartneruser
 *
 * @package TelegramBotSDK\Types\Payments
 */
class TransactionPartnerUser extends TransactionPartner
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['type', 'user'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'user' => true,
        'invoice_payload' => true,
        'paid_media' => ArrayOfPaidMedia::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @var TransactionPartnerType
     */
    protected TransactionPartnerType $type = TransactionPartnerType::User;

    /**
     * Information about the user
     *
     * @var User
     */
    protected User $user;

    /**
     * Optional. Bot-specified invoice payload
     *
     * @var string|null
     */
    protected ?string $invoicePayload = null;

    /**
     * Optional. Information about the paid media bought by the user
     *
     * @var PaidMedia[]|null
     */
    protected ?array $paidMedia = null;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return void
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string|null
     */
    public function getInvoicePayload(): ?string
    {
        return $this->invoicePayload;
    }

    /**
     * @param string|null $invoicePayload
     * @return void
     */
    public function setInvoicePayload(?string $invoicePayload): void
    {
        $this->invoicePayload = $invoicePayload;
    }

    /**
     * @return PaidMedia[]|null
     */
    public function getPaidMedia(): ?array
    {
        return $this->paidMedia;
    }

    /**
     * @param PaidMedia[]|null $paidMedia
     */
    public function setPaidMedia(?array $paidMedia): void
    {
        $this->paidMedia = $paidMedia;
    }
}
