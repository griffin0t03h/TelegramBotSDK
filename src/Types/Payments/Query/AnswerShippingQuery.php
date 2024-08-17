<?php

namespace TelegramBotSDK\Types\Payments\Query;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Types\Payments\ArrayOfLabeledPrice;

/**
 * Class AnswerShippingQuery
 * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified,
 * the Bot API will send an Update with a shipping_query field to the bot
 *
 * @package TelegramBotSDK\Types\Payments\Query
 */
class AnswerShippingQuery extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['shipping_query_id', 'ok'];

    /**
     * @var array
     */
    protected static array $map = [
        'shipping_query_id' => true,
        'ok' => true,
        'shipping_options' => ArrayOfLabeledPrice::class,
        'error_message' => true,
    ];

    /**
     * Unique identifier for the query to be answered
     *
     * @var string
     */
    protected string $shippingQueryId;

    /**
     * Specify True if delivery to the specified address is possible and False if there are any problems
     *
     * @var true
     */
    protected bool $ok;

    /**
     * Required if ok is True. A JSON-serialized array of available shipping options.
     *
     * @var array
     */
    protected array $shippingOptions;

    /**
     * Required if ok is False. Error message in human readable form that explains why it is impossible to complete
     * the order
     *
     * @var string
     */
    protected string $errorMessage;

    /**
     * @return string
     */
    public function getShippingQueryId(): string
    {
        return $this->shippingQueryId;
    }

    /**
     * @param string $shippingQueryId
     * @return void
     */
    public function setShippingQueryId(string $shippingQueryId): void
    {
        $this->shippingQueryId = $shippingQueryId;
    }

    /**
     * @return bool
     */
    public function getOk(): bool
    {
        return $this->ok;
    }

    /**
     * @psalm-suppress InvalidPropertyAssignmentValue
     * @param bool $ok
     * @return void
     */
    public function setOk(bool $ok): void
    {
        $this->ok = $ok;
    }

    /**
     * @return array
     */
    public function getShippingOptions(): array
    {
        return $this->shippingOptions;
    }

    /**
     * @param array $shippingOptions
     * @return void
     */
    public function setShippingOptions(array $shippingOptions): void
    {
        $this->shippingOptions = $shippingOptions;
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
}
