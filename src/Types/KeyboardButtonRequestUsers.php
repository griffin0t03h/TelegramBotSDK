<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class KeyboardButtonRequestUsers
 * This object defines the criteria used to request suitable users.
 * Information about the selected users will be shared with the bot when the corresponding button is pressed. [More
 * about requesting users](https://core.telegram.org/bots/features#chat-and-user-selection)
 *
 * @package TelegramBotSDK\Types
 */
class KeyboardButtonRequestUsers extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['request_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'request_id' => true,
        'user_is_bot' => true,
        'user_is_premium' => true,
        'max_quantity' => true,
        'request_name' => true,
        'request_username' => true,
        'request_photo' => true,
    ];

    /**
     * Signed 32-bit identifier of the request that will be received back in the UsersShared object. Must be unique
     * within the message
     *
     * @var int
     */
    protected int $requestId;

    /**
     * Optional. Pass True to request bots, pass False to request regular users. If not specified, no additional
     * restrictions are applied.
     *
     * @var bool|null
     */
    protected ?bool $userIsBot = null;

    /**
     * Optional. Pass True to request premium users, pass False to request non-premium users. If not specified, no
     * additional restrictions are applied.
     *
     * @var bool|null
     */
    protected ?bool $userIsPremium = null;

    /**
     * Optional. The maximum number of users to be selected; 1-10. Defaults to 1.
     *
     * @var int|null
     */
    protected ?int $maxQuantity = null;

    /**
     * Optional. Pass True to request the users' first and last names.
     *
     * @var bool|null
     */
    protected ?bool $requestName = null;

    /**
     * Optional. Pass True to request the users' usernames.
     *
     * @var bool|null
     */
    protected ?bool $requestUsername = null;

    /**
     * Optional. Pass True to request the users' photos.
     *
     * @var bool|null
     */
    protected ?bool $requestPhoto = null;

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->requestId;
    }

    /**
     * @param int $requestId
     * @return void
     */
    public function setRequestId(int $requestId): void
    {
        $this->requestId = $requestId;
    }

    /**
     * @return bool|null
     */
    public function getUserIsBot(): ?bool
    {
        return $this->userIsBot;
    }

    /**
     * @param bool|null $userIsBot
     * @return void
     */
    public function setUserIsBot(?bool $userIsBot): void
    {
        $this->userIsBot = $userIsBot;
    }

    /**
     * @return bool|null
     */
    public function getUserIsPremium(): ?bool
    {
        return $this->userIsPremium;
    }

    /**
     * @param bool|null $userIsPremium
     * @return void
     */
    public function setUserIsPremium(?bool $userIsPremium): void
    {
        $this->userIsPremium = $userIsPremium;
    }

    /**
     * @return int|null
     */
    public function getMaxQuantity(): ?int
    {
        return $this->maxQuantity;
    }

    /**
     * @param int|null $maxQuantity
     * @return void
     */
    public function setMaxQuantity(?int $maxQuantity): void
    {
        $this->maxQuantity = $maxQuantity;
    }

    /**
     * @return bool|null
     */
    public function getRequestName(): ?bool
    {
        return $this->requestName;
    }

    /**
     * @param bool|null $requestName
     * @return void
     */
    public function setRequestName(?bool $requestName): void
    {
        $this->requestName = $requestName;
    }

    /**
     * @return bool|null
     */
    public function getRequestUsername(): ?bool
    {
        return $this->requestUsername;
    }

    /**
     * @param bool|null $requestUsername
     * @return void
     */
    public function setRequestUsername(?bool $requestUsername): void
    {
        $this->requestUsername = $requestUsername;
    }

    /**
     * @return bool|null
     */
    public function getRequestPhoto(): ?bool
    {
        return $this->requestPhoto;
    }

    /**
     * @param bool|null $requestPhoto
     * @return void
     */
    public function setRequestPhoto(?bool $requestPhoto): void
    {
        $this->requestPhoto = $requestPhoto;
    }
}
