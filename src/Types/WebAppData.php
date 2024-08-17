<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

class WebAppData extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['data', 'button_text'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'data' => true,
        'button_text' => true,
    ];

    /**
     * The data. Be aware that a bad client can send arbitrary data in this field.
     *
     * @var string
     */
    protected string $data;

    /**
     * Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client can send
     * arbitrary data in this field.
     *
     * @var string
     */
    protected string $buttonText;

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return void
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getButtonText(): string
    {
        return $this->buttonText;
    }

    /**
     * @param string $buttonText
     * @return void
     */
    public function setButtonText(string $buttonText): void
    {
        $this->buttonText = $buttonText;
    }
}
