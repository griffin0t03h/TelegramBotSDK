<?php

namespace TelegramBotSDK\Types\Inline\QueryResult;

use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\Inline\InputMessageContent;

class Contact extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'id', 'phone_number', 'first_name'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'id' => true,
        'phone_number' => true,
        'first_name' => true,
        'last_name' => true,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
        'thumbnail_url' => true,
        'thumbnail_width' => true,
        'thumbnail_height' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected string $type = 'contact';

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
     * Optional. Url of the thumbnail for the result
     *
     * @var string|null
     */
    protected ?string $thumbnailUrl = null;

    /**
     * Optional. Thumbnail width
     *
     * @var int|null
     */
    protected ?int $thumbnailWidth = null;

    /**
     * Optional. Thumbnail height
     *
     * @var int|null
     */
    protected ?int $thumbnailHeight = null;

    /**
     * Contact constructor.
     *
     * @param string $id
     * @param string $phoneNumber
     * @param string $firstName
     * @param string|null $lastName
     * @param string|null $thumbnailUrl
     * @param int|null $thumbnailWidth
     * @param int|null $thumbnailHeight
     * @param InputMessageContent|null $inputMessageContent
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     */
    public function __construct(
        string $id,
        string $phoneNumber,
        string $firstName,
        ?string $lastName = null,
        ?string $thumbnailUrl = null,
        ?int $thumbnailWidth = null,
        ?int $thumbnailHeight = null,
        ?InputMessageContent $inputMessageContent = null,
        ?InlineKeyboardMarkup $inlineKeyboardMarkup = null,
    ) {
        parent::__construct($id, null, $inputMessageContent, $inlineKeyboardMarkup);

        $this->phoneNumber = $phoneNumber;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->thumbnailUrl = $thumbnailUrl;
        $this->thumbnailWidth = $thumbnailWidth;
        $this->thumbnailHeight = $thumbnailHeight;
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

    /**
     * @return string|null
     */
    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    /**
     * @param string|null $thumbnailUrl
     *
     * @return void
     */
    public function setThumbnailUrl(?string $thumbnailUrl): void
    {
        $this->thumbnailUrl = $thumbnailUrl;
    }

    /**
     * @return int|null
     */
    public function getThumbnailWidth(): ?int
    {
        return $this->thumbnailWidth;
    }

    /**
     * @param int|null $thumbnailWidth
     *
     * @return void
     */
    public function setThumbnailWidth(?int $thumbnailWidth): void
    {
        $this->thumbnailWidth = $thumbnailWidth;
    }

    /**
     * @return int|null
     */
    public function getThumbnailHeight(): ?int
    {
        return $this->thumbnailHeight;
    }

    /**
     * @param int|null $thumbnailHeight
     *
     * @return void
     */
    public function setThumbnailHeight(?int $thumbnailHeight): void
    {
        $this->thumbnailHeight = $thumbnailHeight;
    }
}
