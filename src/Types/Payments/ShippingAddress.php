<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;

/**
 * Class ShippingAddress
 * This object represents a shipping address.
 *
 * @see https://core.telegram.org/bots/api#shippingaddress
 *
 * @package TelegramBotSDK\Types\Payments
 */
class ShippingAddress extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['country_code', 'state', 'city', 'street_line1', 'street_line2', 'post_code'];

    /**
     * @var array
     */
    protected static array $map = [
        'country_code' => true,
        'state' => true,
        'city' => true,
        'street_line1' => true,
        'street_line2' => true,
        'post_code' => true,
    ];

    /**
     * Two-letter [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country code
     *
     * @var string
     */
    protected string $countryCode;

    /**
     * State, if applicable
     *
     * @var string
     */
    protected string $state;

    /**
     * City
     *
     * @var string
     */
    protected string $city;

    /**
     * First line for the address
     *
     * @var string
     */
    protected string $streetLine1;

    /**
     * Second line for the address
     *
     * @var string
     */
    protected string $streetLine2;

    /**
     * Address post code
     *
     * @var string
     */
    protected string $postCode;

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return void
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return void
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return void
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getStreetLine1(): string
    {
        return $this->streetLine1;
    }

    /**
     * @param string $streetLine1
     * @return void
     */
    public function setStreetLine1(string $streetLine1): void
    {
        $this->streetLine1 = $streetLine1;
    }

    /**
     * @return string
     */
    public function getStreetLine2(): string
    {
        return $this->streetLine2;
    }

    /**
     * @param string $streetLine2
     * @return void
     */
    public function setStreetLine2(string $streetLine2): void
    {
        $this->streetLine2 = $streetLine2;
    }

    /**
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     * @return void
     */
    public function setPostCode(string $postCode): void
    {
        $this->postCode = $postCode;
    }
}
