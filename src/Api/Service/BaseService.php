<?php

namespace TelegramBotSDK\Api\Service;

use TelegramBotSDK\Api\BotApi;
use TelegramBotSDK\Exception;
use TelegramBotSDK\Http\CurlHttpClient;
use TelegramBotSDK\Http\HttpClientInterface;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidJsonException;

class BaseService
{
    //private static ?BaseService $instance = null;

    /**
     * @var HttpClientInterface|CurlHttpClient
     */
    protected HttpClientInterface|CurlHttpClient $httpClient;
    /**
     * @var string|null
     */
    protected ?string $fileEndpoint;
    /**
     * @var string
     */
    private string $endpoint;

    /**
     * @param string $token Telegram Bot API token
     * @param HttpClientInterface|null $httpClient
     * @param string|null $endpoint
     */
    public function __construct(
        string $token,
        ?HttpClientInterface $httpClient = null,
        string $endpoint = null,
    ) {
        $this->endpoint = ($endpoint ?: BotApi::URL_PREFIX) . $token;
        $this->fileEndpoint = ($endpoint ?: BotApi::FILE_URL_PREFIX) . $token;
        $this->httpClient = $httpClient ?: new CurlHttpClient();
    }

    /*public static function getInstance($httpClient, string $endpoint, ?string $fileEndpoint = null): BaseService
    {
        if (self::$instance === null) {
            self::$instance = new self($httpClient, $endpoint, $fileEndpoint);
        }

        return self::$instance;
    }*/

    /**
     * JSON validation
     *
     * @param string $jsonString
     * @param bool $asArray
     *
     * @return object|array
     * @throws InvalidJsonException
     */
    public static function jsonValidate(string $jsonString, bool $asArray): object|array
    {
        $json = json_decode($jsonString, $asArray);

        if (json_last_error() != JSON_ERROR_NONE) {
            throw new InvalidJsonException(json_last_error_msg(), json_last_error());
        }

        return $json;
    }

    /**
     * @param string $method
     * @param array|null $data
     *
     * @return mixed
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function call(string $method, ?array $data = null): mixed
    {
        $endpoint = $this->endpoint . '/' . $method;

        return $this->httpClient->request($endpoint, $data);
    }
}
