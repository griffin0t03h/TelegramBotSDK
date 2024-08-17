<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\ChatMemberStatus;

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
     * {@inheritdoc}
     *
     * @var ChatMemberStatus
     */
    protected ChatMemberStatus $status = ChatMemberStatus::Member;

    /**
     * Optional. Date when the user's subscription will expire; Unix time
     *
     * @var int
     */
    protected int $untilDate;

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
