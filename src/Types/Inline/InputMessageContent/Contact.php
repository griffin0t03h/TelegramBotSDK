<?php

namespace TelegramBotSDK\Types\Inline\InputMessageContent;

use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\Inline\InputMessageContent;

/**
 * Class Contact
 *
 * @see https://core.telegram.org/bots/api#inputcontactmessagecontent
 * Represents the content of a contact message to be sent as the result of an inline query.
 *
 * @package TelegramBotSDK\Types\Inline
 */
class Contact extends InputMessageContent implements TypeInterface
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
     * Contact constructor.
     *
     * @param string $phoneNumber
     * @param string $firstName
     * @param string|null $lastName
     */
    public function __construct(string $phoneNumber, string $firstName, ?string $lastName = null)
    {
        $this->phoneNumber = $phoneNumber;
        $this->firstName = $firstName;
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
     *
     * @return void
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return void
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @return void
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }
}
