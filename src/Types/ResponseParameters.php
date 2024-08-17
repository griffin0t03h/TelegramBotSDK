<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ResponseParameters
 * Describes why a request was unsuccessful.
 *
 * @package TelegramBotSDK\Types
 */
class ResponseParameters extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = [];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'migrate_to_chat_id' => true,
        'retry_after' => true,
    ];

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more
     * than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for
     * storing this identifier.
     *
     * @var int|null
     */
    protected ?int $migrateToChatId = null;

    /**
     * Optional. In case of exceeding flood control, the number of seconds left to wait before the request can be
     * repeated
     *
     * @var int|null
     */
    protected ?int $retryAfter = null;

    /**
     * @return int|null
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int|null $migrateToChatId
     */
    public function setMigrateToChatId(?int $migrateToChatId): void
    {
        $this->migrateToChatId = $migrateToChatId;
    }

    /**
     * @return int|null
     */
    public function getRetryAfter(): ?int
    {
        return $this->retryAfter;
    }

    /**
     * @param int|null $retryAfter
     */
    public function setRetryAfter(?int $retryAfter): void
    {
        $this->retryAfter = $retryAfter;
    }
}
