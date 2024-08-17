<?php

namespace TelegramBotSDK;

use Throwable;

/**
 * Class HttpException
 *
 * @codeCoverageIgnore
 * @package TelegramBotSDK
 */
class HttpException extends Exception
{
    /**
     * @var array
     */
    protected array $parameters = [];

    /**
     * HttpException constructor.
     *
     * @param string $message [optional] The Exception message to throw.
     * @param int $code [optional] The Exception code.
     * @param Throwable|\Exception $previous [optional] The previous throwable used for the exception chaining.
     * @param array $parameters [optional] Array of parameters returned from API.
     */
    public function __construct(string $message = '', int $code = 0, $previous = null, array $parameters = [])
    {
        $this->parameters = $parameters;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
