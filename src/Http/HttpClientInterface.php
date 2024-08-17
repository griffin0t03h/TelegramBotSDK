<?php

namespace TelegramBotSDK\Http;

use TelegramBotSDK\Exception;
use TelegramBotSDK\HttpException;

interface HttpClientInterface
{
    /**
     * Request url
     *
     * @param string $url
     * @param array|null $data
     * @return mixed
     * @throws Exception
     */
    public function request(string $url, array $data = null): mixed;

    /**
     * Get file contents
     *
     * @param string $url
     * @return string
     * @throws HttpException|Exception
     */
    public function download(string $url): string;
}
