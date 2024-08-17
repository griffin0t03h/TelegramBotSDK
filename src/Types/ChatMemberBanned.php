<?php

namespace TelegramBotSDK\Types;

/**
 * Class ChatMemberBanned
 * Represents a chat member that was banned in the chat and can't return to the chat or view chat messages.
 *
 * @package TelegramBotSDK\Types
 */
class ChatMemberBanned extends ChatMember
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['status', 'user', 'until_date'];

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
     * Date when restrictions will be lifted for this user; Unix time.
     * If 0, then the user is banned forever
     *
     * @var int
     */
    protected int $untilDate;

    public static function fromResponse($data): ChatMemberBanned|static
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
