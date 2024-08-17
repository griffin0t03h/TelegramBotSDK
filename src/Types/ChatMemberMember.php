<?php

namespace TelegramBotSDK\Types;

/**
 * Class ChatMemberMember
 * Represents a chat member that has no additional privileges or restrictions.
 *
 * @package TelegramBotSDK\Types
 */
class ChatMemberMember extends ChatMember
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['status', 'user'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'status' => true,
        'user' => User::class,
        'until_date' => true,
    ];

    /**
     * Optional. Date when the user's subscription will expire; Unix time
     *
     * @var int
     */
    protected int $untilDate;

    public static function fromResponse($data): ChatMemberMember|static
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return int
     */
    public function getUntilDate(): int
    {
        return $this->untilDate;
    }

    /**
     * @param int $untilDate
     * @return void
     */
    public function setUntilDate(int $untilDate): void
    {
        $this->untilDate = $untilDate;
    }
}
