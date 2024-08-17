<?php

namespace TelegramBotSDK\Types;

/**
 * Class ChatMemberOwner
 * Represents a chat member that owns the chat and has all administrator privileges.
 *
 * @package TelegramBotSDK\Types
 */
class ChatMemberOwner extends ChatMember
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['status', 'user', 'is_anonymous'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'status' => true,
        'user' => User::class,
        'is_anonymous' => true,
        'custom_title' => true,
    ];

    /**
     * True, if the user's presence in the chat is hidden
     *
     * @var bool
     */
    protected bool $isAnonymous;

    /**
     * Optional. Custom title for this user
     *
     * @var string|null
     */
    protected ?string $customTitle = null;

    public static function fromResponse($data): ChatMemberOwner|static
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return bool
     */
    public function isAnonymous(): bool
    {
        return $this->isAnonymous;
    }

    /**
     * @param bool $isAnonymous
     * @return void
     */
    public function setIsAnonymous(bool $isAnonymous): void
    {
        $this->isAnonymous = $isAnonymous;
    }

    /**
     * @return string|null
     */
    public function getCustomTitle(): ?string
    {
        return $this->customTitle;
    }

    /**
     * @param string|null $customTitle
     * @return void
     */
    public function setCustomTitle(?string $customTitle): void
    {
        $this->customTitle = $customTitle;
    }
}
