<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;

/**
 * Class ShippingOption
 * This object represents one shipping option.
 *
 * @see https://core.telegram.org/bots/api#shippingoption
 *
 * @package TelegramBotSDK\Types\Payments
 */
class ShippingOption extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['id', 'title', 'prices'];

    /**
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'title' => true,
        'prices' => ArrayOfLabeledPrice::class,
    ];

    /**
     * Shipping option identifier
     *
     * @var string
     */
    protected string $id;

    /**
     * Option title
     *
     * @var string
     */
    protected string $title;

    /**
     * List of price portions
     *
     * @var LabeledPrice[]
     */
    protected array $prices;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return void
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return LabeledPrice[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param LabeledPrice[] $prices
     * @return void
     */
    public function setPrices(array $prices): void
    {
        $this->prices = $prices;
    }
}
