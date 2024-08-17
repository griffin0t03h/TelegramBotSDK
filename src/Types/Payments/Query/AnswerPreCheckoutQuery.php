<?php

namespace TelegramBotSDK\Types\Payments\Query;

use TelegramBotSDK\BaseType;

/**
 * Class AnswerPreCheckoutQuery
 * Use this method to respond to such pre-checkout queries.
 *
 * @package TelegramBotSDK\Types\Payments\Query
 */
class AnswerPreCheckoutQuery extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['pre_checkout_query_id', 'ok'];

    /**
     * @var array
     */
    protected static array $map = [
        'pre_checkout_query_id' => true,
        'ok' => true,
        'error_message' => true,
    ];

    /**
     * Unique identifier for the query to be answered
     *
     * @var string
     */
    protected string $preCheckoutQueryId;

    /**
     * Specify True if everything is alright
     *
     * @var bool
     */
    protected bool $ok;

    /**
     * Error message in human readable form that explains the reason for failure to proceed with the checkout
     *
     * @var string
     */
    protected string $errorMessage;

    /**
     * @return bool
     */
    public function getOk(): bool
    {
        return $this->ok;
    }

    /**
     * @param bool $ok
     * @return void
     */
    public function setOk(bool $ok): void
    {
        $this->ok = $ok;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     * @return void
     */
    public function setErrorMessage(string $errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return string
     */
    public function getPreCheckoutQueryId(): string
    {
        return $this->preCheckoutQueryId;
    }

    /**
     * @param string $preCheckoutQueryId
     * @return void
     */
    public function setPreCheckoutQueryId(string $preCheckoutQueryId): void
    {
        $this->preCheckoutQueryId = $preCheckoutQueryId;
    }
}
