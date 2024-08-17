<?php
/**
 * User: boshurik
 * Date: 10.06.2020
 * Time: 19:43
 */

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Contains information about the current status of a webhook.
 *
 * @package TelegramBotSDK\Types
 */
class WebhookInfo extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['url', 'has_custom_certificate', 'pending_update_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'url' => true,
        'has_custom_certificate' => true,
        'pending_update_count' => true,
        'ip_address' => true,
        'last_error_date' => true,
        'last_error_message' => true,
        'last_synchronization_error_date' => true,
        'max_connections' => true,
        'allowed_updates' => true,
    ];

    /**
     * Webhook URL, may be empty if webhook is not set up
     *
     * @var string
     */
    protected string $url;

    /**
     * True, if a custom certificate was provided for webhook certificate checks
     *
     * @var bool
     */
    protected bool $hasCustomCertificate;

    /**
     * Number of updates awaiting delivery
     *
     * @var int
     */
    protected int $pendingUpdateCount;

    /**
     * Optional. Currently used webhook IP address
     *
     * @var string|null
     */
    protected ?string $ipAddress = null;

    /**
     * Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
     *
     * @var int|null
     */
    protected ?int $lastErrorDate = null;

    /**
     * Optional. Error message in human-readable format for the most recent error that happened when trying to deliver
     * an update via webhook
     *
     * @var string|null
     */
    protected ?string $lastErrorMessage = null;

    /**
     * Optional. Unix time of the most recent error that happened when trying to synchronize available updates
     * with Telegram datacenters
     *
     * @var int|null
     */
    protected ?int $lastSynchronizationErrorDate = null;

    /**
     * Optional. Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     *
     * @var int|null
     */
    protected ?int $maxConnections = null;

    /**
     * Optional. A list of update types the bot is subscribed to. Defaults to all update types
     *
     * @var array|null
     */
    protected ?array $allowedUpdates = null;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return void
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return bool
     */
    public function hasCustomCertificate(): bool
    {
        return $this->hasCustomCertificate;
    }

    /**
     * @param bool $hasCustomCertificate
     *
     * @return void
     */
    public function setHasCustomCertificate(bool $hasCustomCertificate): void
    {
        $this->hasCustomCertificate = $hasCustomCertificate;
    }

    /**
     * @return null|string
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     *
     * @return void
     */
    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return int
     */
    public function getPendingUpdateCount(): int
    {
        return $this->pendingUpdateCount;
    }

    /**
     * @param int $pendingUpdateCount
     *
     * @return void
     */
    public function setPendingUpdateCount(int $pendingUpdateCount): void
    {
        $this->pendingUpdateCount = $pendingUpdateCount;
    }

    /**
     * @return int|null
     */
    public function getLastErrorDate(): ?int
    {
        return $this->lastErrorDate;
    }

    /**
     * @param int $lastErrorDate
     *
     * @return void
     */
    public function setLastErrorDate(int $lastErrorDate): void
    {
        $this->lastErrorDate = $lastErrorDate;
    }

    /**
     * @return null|string
     */
    public function getLastErrorMessage(): ?string
    {
        return $this->lastErrorMessage;
    }

    /**
     * @param string $lastErrorMessage
     *
     * @return void
     */
    public function setLastErrorMessage(string $lastErrorMessage): void
    {
        $this->lastErrorMessage = $lastErrorMessage;
    }

    /**
     * @return int|null
     */
    public function getLastSynchronizationErrorDate(): ?int
    {
        return $this->lastSynchronizationErrorDate;
    }

    /**
     * @param int $lastSynchronizationErrorDate
     *
     * @return void
     */
    public function setLastSynchronizationErrorDate(int $lastSynchronizationErrorDate): void
    {
        $this->lastSynchronizationErrorDate = $lastSynchronizationErrorDate;
    }

    /**
     * @return int|null
     */
    public function getMaxConnections(): ?int
    {
        return $this->maxConnections;
    }

    /**
     * @param int $maxConnections
     *
     * @return void
     */
    public function setMaxConnections(int $maxConnections): void
    {
        $this->maxConnections = $maxConnections;
    }

    /**
     * @return array|null
     */
    public function getAllowedUpdates(): ?array
    {
        return $this->allowedUpdates;
    }

    /**
     * @param array $allowedUpdates
     *
     * @return void
     */
    public function setAllowedUpdates(array $allowedUpdates): void
    {
        $this->allowedUpdates = $allowedUpdates;
    }
}
