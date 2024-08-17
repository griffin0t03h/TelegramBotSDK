<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;

/**
 * Class OrderInfo
 * This object represents information about an order.
 *
 * @see https://core.telegram.org/bots/api#orderinfo
 *
 * @package TelegramBotSDK\Types\Payments
 */
class OrderInfo extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = [];

    /**
     * @var array
     */
    protected static array $map = [
        'name' => true,
        'phone_number' => true,
        'email' => true,
        'shipping_address' => ShippingAddress::class,
    ];

    /**
     * Optional. User name
     *
     * @var string|null
     */
    protected ?string $name = null;

    /**
     * Optional. User's phone number
     *
     * @var string|null
     */
    protected ?string $phoneNumber = null;

    /**
     * Optional. User email
     *
     * @var string|null
     */
    protected ?string $email = null;

    /**
     * Optional. User shipping address
     *
     * @var ShippingAddress|null
     */
    protected ?ShippingAddress $shippingAddress = null;

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return void
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $phoneNumber
     * @return void
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return void
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return ShippingAddress|null
     */
    public function getShippingAddress(): ?ShippingAddress
    {
        return $this->shippingAddress;
    }

    /**
     * @param ShippingAddress|null $shippingAddress
     * @return void
     */
    public function setShippingAddress(?ShippingAddress $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }
}
