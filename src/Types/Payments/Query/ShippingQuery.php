<?php

namespace TelegramBotSDK\Types\Payments\Query;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Types\Payments\ShippingAddress;
use TelegramBotSDK\Types\User;

/**
 * Class ShippingQuery
 * This object contains information about an incoming shipping query.
 *
 * @see https://core.telegram.org/bots/api#shippingquery
 *
 * @package TelegramBotSDK\Types\Payments\Query
 */
class ShippingQuery extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['id', 'from', 'invoice_payload', 'shipping_address'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'from' => User::class,
        'invoice_payload' => true,
        'shipping_address' => ShippingAddress::class,
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
     * Bot specified invoice payload
     *
     * @var string
     */
    protected string $invoicePayload;

    /**
     * User specified shipping address
     *
     * @var ShippingAddress
     */
    protected ShippingAddress $shippingAddress;

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
     * @return ShippingAddress
     */
    public function getShippingAddress(): ShippingAddress
    {
        return $this->shippingAddress;
    }

    /**
     * @param ShippingAddress $shippingAddress
     * @return void
     */
    public function setShippingAddress(ShippingAddress $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }
}
