<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class Contact
 * This object represents a phone contact.
 *
 * @package TelegramBotSDK\Types
 */
class Contact extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['phone_number', 'first_name'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'phone_number' => true,
        'first_name' => true,
        'last_name' => true,
        'user_id' => true,
        'vcard' => true,
    ];

    /**
     * Contact's phone number
     *
     * @var string
     */
    protected string $phoneNumber;

    /**
     * Contact's first name
     *
     * @var string
     */
    protected string $firstName;

    /**
     * Optional. Contact's last name
     *
     * @var string|null
     */
    protected ?string $lastName = null;

    /**
     * Optional. Contact's user identifier in Telegram. This number may have more than 32 significant bits and some
     * programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant
     * bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     */
    protected ?int $userId = null;

    /**
     * Optional. Additional data about the contact in the form of a [vCard](https://en.wikipedia.org/wiki/VCard)
     *
     * @var string|null
     */
    protected ?string $vcard = null;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return void
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return null|string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return void
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return void
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return int|null
     *
     * @see $userId
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return void
     *
     * @see $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string|null
     *
     * @see $vcard
     */
    public function getVCard(): ?string
    {
        return $this->vcard;
    }

    /**
     * @param string|null $vcard
     * @return void
     *
     * @see $vcard
     */
    public function setVCard(?string $vcard): void
    {
        $this->vcard = $vcard;
    }
}
